<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function create()
    {
        return view('admin.create');

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email'), // Unique in admins table
                Rule::unique('users', 'email'),  // Unique in users table
            ],
            'password' => 'required|min:6|confirmed',
        ], [
            'email.unique' => 'This email is already registered.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/adminprofile'), $imageName);
        }
    
        // Create the admin if validation passes
        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash password
            'image' => $imageName,
            'role' => 1, // Set admin role
        ]);
    
        if (auth()->guard('admin')->check()) {
            return redirect('admin/admins')->with('message', 'Admin registered successfully!');
        }

        return redirect('admin/login')->with('message', 'Admin account registered successfully! Please sign in.');
    }
    
    public function edit($id)
    {
        // Find the admin by ID
        $admin = Admin::findOrFail($id);

        // Pass the admin data to the view
        return view('admin.edit', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:6|confirmed', // Password is optional during update
            'image' => 'nullable|image|max:2048', // Image is optional
        ]);

        // Update the admin details
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        // Handle password update
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password')); // Hash password if provided
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Define the path for the old image
            $oldImagePath = public_path('uploads/adminprofile/' . $admin->image);
            
            // Delete old image if it exists
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('uploads/adminprofile/'), $filename);

            // Update the admin's image path
            $admin->image = $filename;
        }

        $admin->save();
        return redirect('admin/admins')->with('message', 'Admin updated successfully!');
    }
    public function updatesuperadmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:6|confirmed', // Password is optional during update
            'image' => 'nullable|image|max:2048', // Image is optional
        ]);

        // Update the admin details
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        // Handle password update
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password')); // Hash password if provided
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Define the path for the old image
            $oldImagePath = public_path('uploads/adminprofile/' . $admin->image);
            
            // Delete old image if it exists
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('uploads/adminprofile/'), $filename);

            // Update the admin's image path
            $admin->image = $filename;
        }

        $admin->save();
        return redirect('admin/profile')->with('message', 'Super Admin updated successfully!');
    }

    public function createsup()
    {
        return view('admin.superadmincreate');
    }
    public function superadminstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email'), // Unique in admins table
                Rule::unique('users', 'email'),  // Unique in users table
            ],
            'password' => 'required|min:6|confirmed',
        ], [
            'email.unique' => 'This email is already registered.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Handle image upload
       
        // Create the admin if validation passes
        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash password
            'image' => null,
            'role' => 1, // Set admin role
        ]);

        return redirect()->back()->with('message', 'Admin registered successfully!');
    }

    
}
