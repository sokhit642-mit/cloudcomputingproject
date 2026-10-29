<?php

namespace App\Http\Livewire\Admin\Colors;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $color_id;
    public $search = '';
    public $name, $code, $status;
    public function render()
    {
        $color = Color::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.colors.index', ['colors' => $color])->extends('layouts.admin')->section('content');
    }
    public function resetInput()
    {
        $this->name = NULL;
        $this->code = NULL;
        $this->status = NULL;
    }
    public function storeColor()
    {
        //$validatedData = $this->validate();
        $this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'status' => 'nullable'
        ]);
        Color::create([
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status == true ? '1':'0',
        ]);
       
        // Session()->flash('message',__('alert.color_added_success'));
        // $this->emit('colorAdded', __('alert.color_added_success'), 'success');
        $this->emit('message', 'Color added successfully!', 'success');


        $this->dispatchBrowserEvent('closeModal'); 
        $this->resetInput();
    }
    public function editColor(int $color_id)
    {
        $this->color_id = $color_id;
        $color = Color::findOrfail($color_id);
        $this -> name = $color->name;
        $this -> code = $color->code;
        $this -> status = $color->status;
    }
    public function updateColor()
    {
        $this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'status' => 'nullable'
        ]);
        //$validatedData = $this->validate();
        Color::findOrfail($this->color_id)->update([
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status == true ? '1':'0',
        ]);
        // Session()->flash('message',__('alert.Color Updated Successfully'));
        $this->emit('message', __('alert.Color Updated Successfully'), 'success');
    
        // $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('closeModal'); 
        $this->resetInput();
    }
    public function deleteColor($color_id)
    {
        
        $this->color_id = $color_id;
    }
    public function destroyColor()
    {
        $color = Color::find($this->color_id);
        $color->delete();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('message',__('alert.Color Deleted Successfully'));
        $this->emit('message', __('alert.Color Deleted Successfully'), 'success');
        
           
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
    public function updated($fields)
    {
        $this->validateOnly($fields, [
          'name' => 'required|string',
          'code' => 'required|string',
        ]);
    }
}
