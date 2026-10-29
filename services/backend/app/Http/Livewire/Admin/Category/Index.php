<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;


class Index extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use WithFileUploads;
    public $category_id;
    public $category;
    public  $name, $slug, $image, $description, $status;
    public $search = '';
    protected function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'image' => [
                'nullable',
                'mimes:jpg,bmp,png,heic,jpeg,webp'
            ],
            'description' => 'required|string',
            // 'description' => [
            //     'required',
            //     'string'
            // ],
            
            'status' => 'nullable'
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        
        $categories = Category::where('name', 'like', '%'.$this->search.'%')
                                 ->orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.category.index',['categories' => $categories]);
    }
   
    public function deleteCategory($category_id)
    {
        
        $this->category_id = $category_id;
    }
    public function viewCategory($category_id)
    {
        
        $this->category_id = $category_id;
    }
    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('message',__('alert.Category Deleted Successfully'));
        $this->emit('message', __('alert.Category Deleted Successfully'), 'success');
        
           
    }
    
    public function saveCategory()
    {
        $validatedData = $this->validate();
        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'image' => $this->image->store('category/photos'),
            'description' => $this->description,
            'status' => $this->status == true ? '1':'0',
        ]);
        Session()->flash('message','Category Add Succsesfully');
        
    }
    public function resetInput()
    {
        $this->name = '';
        $this->slug = '';
        
        $this->description = '';
    }

}
