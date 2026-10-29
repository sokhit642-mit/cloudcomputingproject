<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
class Users extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title, $description, $image, $status;
    public $search = '';
    public $slider_id;
    public $user_id;
    public function render()
    {
       
        $user = User::where('name', 'like', '%'.$this->search.'%')
        ->where('role_as', '0')
        ->orderBy('id', 'ASC')
        ->paginate(3);


        return view('livewire.admin.user.users',compact('user'));
    }
    public function deleteUser($user_id)
    {
        
        $this->user_id = $user_id;
    }
    public function destroyUser()
    {
        $user = User::find($this->user_id);
        $path = 'uploads/profile/' . $user->image;
        if(File::exists($path)){
            File::delete($path);
        }
        
        $user->delete();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('message',__('alert.SubCategory Deleted Successfully'));
        $this->emit('message', __('alert.SubCategory Deleted Successfully'), 'success');
        
           
    }
}
