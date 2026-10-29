<?php

namespace App\Http\Livewire\Fronted;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishlistCount;

    protected $listeners = ['wishlistUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if (Auth::check()) {
            $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $this->wishlistCount = 0;
        }
    }
    public function mount()
    {
        $this->checkWishlistCount();
    }

    public function render()
    {
        $this->checkWishlistCount();
        return view('livewire.fronted.wishlist-count', [
            'wishlistCount' => $this->wishlistCount,
        ]);
    }
}
