<?php

namespace App\Http\Livewire\Admin\Brand;

use Exception;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
// use Jantinnerezo\Jantinnerezo\LivewireAlert;
class Index extends Component
{
    // use LivewireAlert;
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $brand_id;
    public $search = '';
    public $currentImage;

    protected $listeners = ['editBrand'];
    public function render()
    {
        $category = Category::where('status', '0')->get();
        $brand = Brand::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brand ,'categories' => $category])
                    ->extends('layouts.admin')
                    ->section('content')
        ;
    }
    public $name, $slug, $status , $image;
    // public function rules()
    // {
    //     return [
    //         'name' => 'required|string',
    //         'slug' => 'required|string',
    //         'status' => 'nullable'
    //     ];
    // }
    public function resetInput()
    {
        $this->name = NULL;
        $this->image = null;
        $this->currentImage = null;
        $this->slug = NULL;
        $this->status = NULL;
    }
    // public function updated($fields)
    // {
    //     $this->validateOnly($fields);
    // }
    public function storeBrand()
    {
        //$validatedData = $this->validate();
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'image' => 'required',
            'status' => 'nullable'
        ]);
        if ($this->image) {
            $imagePath = $this->image->store('brand-image', 'public'); // Use 'public' disk
        } else {
            $imagePath = null;
        }
     
        Brand::create([
            'name' => $this->name,
            'image'=> $imagePath,
            // 'category_id' => $this->category_id,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        
        // Session()->flash('message',__('alert.Brand_added_success'));
        $this->emit('message', __('alert.Brand_added_success'), 'success');
        
        $this->dispatchBrowserEvent('closeModal'); 
        $this->resetInput();
    }
    public function deleteBrand($brand_id)
    {
        
        $this->brand_id = $brand_id;
    }
    public function destroyBrand()
    {
        $brand = Brand::find($this->brand_id);
        $brand->delete();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('message',__('alert.Brand Deleted Successfully'));
        $this->emit('message', __('alert.Brand Deleted Successfully'), 'success');
        
           
    }
    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrfail($brand_id);
        $this -> name = $brand->name;
        $this->currentImage = $brand->image;
        // $this -> category_id = $brand->category_id;
        $this -> slug = $brand->slug;
        $this -> status = $brand->status;
    }
    // public function updated($fields)
    // {
    //     $this->validateOnly($fields);
    // }
    public function updateBrand()
    {
        $this->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|max:1024',
            'slug' => 'required|string',
            'status' => 'nullable'
        ]);
    
        // Find the brand
        $brand = Brand::findOrFail($this->brand_id);
    
        // Store the new image if uploaded
        if ($this->image) {
            $imagePath = $this->image->store('brand-image', 'public'); // Use 'public' disk
            
            // Delete the old image from the storage if it exists
            if ($brand->image && Storage::disk('public')->exists($brand->image)) {
                Storage::disk('public')->delete($brand->image);
            }
        } else {
            $imagePath = $this->currentImage;
        }
    
        // Update the brand
        $brand->update([
            'name' => $this->name,
            'image' => $imagePath,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
    
        // Flash message
        // session()->flash('message', __('alert.Brand Updated Successfully'));
        $this->emit('message', __('alert.Brand Updated Successfully'), 'success');
    
        // Close modal and reset input
        $this->dispatchBrowserEvent('closeModal'); 
        $this->resetInput();
    }    
    public function closeModal()
    {
        $this->resetInput();
        $this->resetValidation();
        
    }
    public function openModal()
    {
        $this->resetInput();
        
    }
    // public function viewBrand(int $brand_id)
    // {
    //     $this->brand_id = $brand_id;
    //     $brand = Brand::findOrfail($brand_id);
    //     $this -> name = $brand->name;
    //     $this -> slug = $brand->slug;
    //     $this -> status = $brand->status;
    // }
//     public function updated($field)
// {
//     $this->resetValidation();
// }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
          'name' => 'required|string',
        //   'category_id' => 'required|integer',
          'slug' => 'required|string',
        ]);
    }
    // public function updated($field)
    // {
    //     $this->resetValidation();
    // }
}
