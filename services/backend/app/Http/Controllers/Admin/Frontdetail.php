<?php

namespace App\Http\Controllers\Admin;

use App\Models\FrontDetial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class Frontdetail extends Controller
{
    public function index()
    {
        $frontdetail = FrontDetial::first();
        return view('admin.frontdetail.index', compact('frontdetail'));
    }
   
    public function store(Request $request)
    {
       
      
        // Find the first FrontDetail or create it if it doesn't exist
        $frontdetail = FrontDetial::first();
       
        // Update or create the record
        if ($frontdetail) {
            $frontdetail->update([
                'facebook' => $request->facebook,
                'telegram' => $request->telegram,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'tiktok' => $request->tiktok,
                'phonenumber1' => $request->phonenumber1,
                'phonenumber2' => $request->phonenumber2,
                'phonenumber3' => $request->phonenumber3,
                'abouthomesport' => $request->abouthomesport,
            ]);
            $message = __('Front Detail updated successfully');
        } else {
            FrontDetial::create([
                'facebook' => $request->facebook,
                'telegram' => $request->telegram,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'tiktok' => $request->tiktok,
                'phonenumber1' => $request->phonenumber1,
                'phonenumber2' => $request->phonenumber2,
                'phonenumber3' => $request->phonenumber3,
                'abouthomesport' => $request->abouthomesport,
            ]);
            $message = __('Front Detail created successfully');
        }

        // Redirect to the front detail page with a success message
        return redirect('admin/frontdetail')->with('message', $message);
    }

}
