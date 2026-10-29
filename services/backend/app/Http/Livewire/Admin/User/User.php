<?php

namespace App\Http\Livewire\Admin\User;

// use App\Models\User;
use Livewire\Component;

class User extends Component
{
    public function render()
    {
        $user = User::where('role_as','0')->get();
        return view('livewire.admin.user.user');
    }
}
