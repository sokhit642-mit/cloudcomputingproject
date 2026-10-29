<?php

namespace App\Http\Livewire\Admin\Sizes;

use App\Models\Size;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    public $size_id;
    public $search = '';
    public function render()
    {
        $categories = Category::where('status','0')->get();
        $size = Size::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.sizes.index', compact('categories'),['sizes' => $size])->extends('layouts.admin')->section('content');
    }
    public $name, $slug, $status;
    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->category_id = NULL;
        $this->status = NULL;
    }
    public function closeModal()
    {
        $this->resetInput();
        $this->resetValidation();
        
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
          'name' => 'required|string',
          'category_id' => 'required|integer',
          'slug' => 'required|string',
          'status' => 'nullable'
        ]);
    }
    public function storeSizes()
    {
        //$validatedData = $this->validate();
        $this->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'slug' => 'required|string',
            'status' => 'nullable'
        ]);
        Size::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        
        // Session()->flash('message',__('alert.Size_added_success'));
        $this->emit('message', __('alert.Size_added_success'), 'success');

        $this->dispatchBrowserEvent('closeModal'); 
        $this->resetInput();
    }
    public function Editsize(int $size_id)
    {
        $this->size_id = $size_id;
        $size = Size::findOrfail($size_id);
        $this -> name = $size->name;
        $this -> category_id = $size->category_id;
        $this -> slug = $size->slug;
        $this -> status = $size->status;
    }
    public function updateSize()
    {
        $this->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'slug' => 'required|string',
            'status' => 'nullable'
        ]);
        //$validatedData = $this->validate();
        Size::findOrfail($this->size_id)->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        // Session()->flash('message',__('alert.Size Updated Successfully'));
        $this->emit('message', __('alert.Size Updated Successfully'), 'success');

        // $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('closeModal'); 
        $this->resetInput();
    }
    public function deletesize($size_id)
    {
        
        $this->size_id = $size_id;
    }
    public function destroySize()
    {
        $size = Size::find($this->size_id);
        $size->delete();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('message',__('alert.Size Deleted Successfully'));
        $this->emit('message', __('alert.Size Deleted Successfully'), 'success');
        
           
    }

}
