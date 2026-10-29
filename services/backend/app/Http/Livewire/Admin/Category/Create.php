<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryFormRequest;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.category.create');
    }
    public function save(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);

            $category->image = $filename;
        }
        
        $category->status = $request->status == true ? '1':'0';
        $category->save();

        return redirect('admin/category')->with('message','Category Added Successfully');

    }
    public  $name, $slug,$image, $description, $status;
    public function resetInput()
    {
        $this->name = '';
        $this->slug = '';
        
        $this->description = '';
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
}
