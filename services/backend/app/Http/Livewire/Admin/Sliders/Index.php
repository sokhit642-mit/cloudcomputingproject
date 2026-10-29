<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title, $description, $image, $status;
    public $search = '';
    public $slider_id;
    public function render()
    {
        $slider = Slider::where('title', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(3);

        return view('livewire.admin.sliders.index', ['sliders' => $slider]);
    }
    public function resetInput()
    {
        $this->title = NULL;
        $this->description = NULL;
        $this->image = NULL;
        $this->status = NULL;
    }
    public function storeSlider()
    {
        $namefile = $this->image->getClientOriginalName();
        //$validatedData = $this->validate();
        $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            // 'image' => 'required',
            'image' => 'image|max:1024',
            'status' => 'nullable'
        ]);
        Slider::create([
            'title' => $this->title,
            'description' =>$this->description,
            'status' => $this->status == true ? '1':'0',
            'image' => 
            $this->image->storeAs(path: 'public/uploads/slider'. $namefile)

        ]);
       
        Session()->flash('message','Brand Added Successfully');
        // $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('closeModal'); 
        $this->resetInput();
    }
    public function editSlide(int $slider_id)
    {
        $this->slider_id = $slider_id;
        $slider = Slider::findOrfail($slider_id);
        $this -> title = $slider->title;
        $this -> description = $slider->description;
        $this -> image = $slider->image;
        $this -> status = $slider->status;
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
 
    public function updatedPhoto()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }
    public function deleteSlider($slider_id)
    {
        
        $this->slider_id = $slider_id;
    }
    public function destroySlider()
    {
        $slider = Slider::find($this->slider_id);
        $path = 'uploads/slider/'.$slider->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $slider->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message',__('alert.Slider Deleted Successfully'));
        
    }
}
