<?php

namespace App\Http\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    public $subcategory_id;
    public $search = '';
    public $category;
    public function render()
    {
        $categories = Category::where('status','0')->get();
        // return view('livewire.admin.sub-category.index');
        $subcategory = SubCategory::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.sub-category.index', compact('categories'),['subcategories' => $subcategory])
                    ->extends('layouts.admin')
                    ->section('content')
        ;
    }
    public $name, $slug, $status;
    public function resetInput()
    {
        $this->name = NULL;
        $this->category_id = NULL;
        $this->slug = NULL;
        $this->status = NULL;
    }
    public function closeModal()
    {
        $this->resetInput();
        $this->resetValidation();
        // $this->dispatchBrowserEvent('closeModal');
        
    }
    public function openModal()
    {
        $this->resetInput();
        
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
          'name' => 'required|string',
          'category_id' => 'required|integer',
          'slug' => 'required|string',
        ]);
    }
    public function storeSubCategory()
    {
        //$validatedData = $this->validate();
        $this->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'slug' => 'required|string',
            'status' => 'nullable'
        ]);
        SubCategory::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        
        // Session()->flash('message',__('alert.SubCategory_added_success'));
        $this->emit('message', __('alert.SubCategory_added_success'), 'success');

        // $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('closeModal'); 
        $this->resetInput();
    }
    public function editSubcategory(int $subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;
        $subcategory = SubCategory::findOrfail($subcategory_id);
        $this -> name = $subcategory->name;
        $this -> category_id = $subcategory->category_id;
        $this -> slug = $subcategory->slug;
        $this -> status = $subcategory->status;
    }
    public function updateSubcategory()
    {
        $this->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'slug' => 'required|string',
            'status' => 'nullable'
        ]);
        //$validatedData = $this->validate();
        SubCategory::findOrfail($this->subcategory_id)->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        // Session()->flash('message',__('alert.SubCategory Updated Successfully'));
        $this->emit('message', __('alert.SubCategory Updated Successfully'), 'success');

        // $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('closeModal'); 
        
        $this->resetInput();
    }
    public function deleteBrand($subcategory_id)
    {
        
        $this->subcategory_id = $subcategory_id;
    }
    public function destroySubcategory()
    {
        $subcategory = SubCategory::find($this->subcategory_id);
      
        
        $subcategory->delete();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('message',__('alert.SubCategory Deleted Successfully'));
        $this->emit('message', __('alert.SubCategory Deleted Successfully'), 'success');
        
           
    }
}
