<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        
        return view('admin.sliders.index',compact('sliders'));
    }
    public function create()
    {
        return view('admin.sliders.create');
    }
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();
        $slider = new Slider;
        $slider->title = $validatedData['title'];
        
        $slider->description = $validatedData['description'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/slider/',$filename);

            $slider->image = $filename;
        }
        $slider->status = $request->status == true ? '1':'0';
        $slider->save();
        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$ext;

        //     $file->move('uploads/category/',$filename);

        //     $category->image = $filename;
        // }
        
        // $category->status = $request->status == true ? '1':'0';
        // $category->save();

        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$ext;

        //     $file->move('uploads/slider/',$filename);

        //     $validatedData['image'] = "uploads/slider/$filename";
        //     // $category->image = $filename;
        // }
        
        // $validatedData['status'] = $request->status == true ? '1':'0';

        // Slider::create([
        //     'title' => $validatedData['title'],
        //     'description' => $validatedData['description'],
        //     'image' => $validatedData['image'],
        //     'status' => $validatedData['status'],
        // ]);

        return redirect('admin/sliders')->with('message',__('alert.Slider_added_success'));

    }
    public function edit(Slider $slider)
    { 
        // $category = Category::findOrFail($id);
        // $sliders = Slider::all();

        return view('admin.sliders.edit', compact('slider'));
       
    }
    public function update(SliderFormRequest $request, $slider)
    {
        $validatedData = $request->validated();

        $slider = Slider::findOrfail($slider);

        $slider->title = $validatedData['title'];
        
        $slider->description = $validatedData['description'];

        if($request->hasFile('image')){
            $path = 'uploads/slider/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/slider/',$filename);

            $slider->image = $filename;
        }

        $slider->status = $request->status == true ? '1':'0';

        $slider->update();
        // if($request->hasFile('image')){

        //     $path ='uploads/slider/'.$slider->image;
        //     if(File::exists($path)){
        //         File::delete($path);
        //     }
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$ext;

        //     $file->move('uploads/slider/',$filename);
        //     $validatedData['image'] = "uploads/slider/$filename";
        // }
        
        // $validatedData['status'] = $request->status == true ? '1':'0';

        // Slider::where('id',$slider->id)->update([
        //     'title' => $validatedData['title'],
        //     'description' => $validatedData['description'],
        //     'image' => $validatedData['image'],
        //     'status' => $validatedData['status'],
        // ]);

        return redirect('admin/sliders')->with('message',__('alert.Slider Updated Successfully'));
    }
}
