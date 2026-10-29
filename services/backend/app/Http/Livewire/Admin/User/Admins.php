<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
class Admins extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title, $description, $image, $status;
    public $search = '';
    public $admin_id;
   
    public function render()
    {
        $admin = Admin::where('name', 'like', '%'.$this->search.'%')
        ->where('role', '1')
        ->orderBy('id', 'ASC')
        ->paginate(10);

        return view('livewire.admin.User.admins', compact('admin'));
    }
    public function deleteAdmin($admin_id)
    {
        
        $this->admin_id = $admin_id;
    }
    public function destroyAdmin()
    {
        $admin = Admin::find($this->admin_id);
        $path = 'uploads/adminprofile/' . $admin->image;
        if(File::exists($path)){
            File::delete($path);
        }
        
        $admin->delete();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('message',__('alert.SubCategory Deleted Successfully'));
        $this->emit('message', __('alert.SubCategory Deleted Successfully'), 'success');
        
           
    }
}
