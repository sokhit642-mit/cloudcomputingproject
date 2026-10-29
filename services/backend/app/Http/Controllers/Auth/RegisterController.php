<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Add image validation
        ]);
    }

    protected function create(array $data)
    {
        // Handle image upload
        $imageName = time() . '.' . $data['image']->getClientOriginalExtension();

        // Move the image to the public/uploads/profile directory
        $data['image']->move(public_path('uploads/profile'), $imageName);

        // Create the new user instance with the uploaded image
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $imageName, // Save the image file name
        ]);
    }

    // If you want to handle the request separately, you might need this method:
    protected function registered(Request $request, $user)
    {
        $request->merge(['image' => $request->file('image')]);
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
