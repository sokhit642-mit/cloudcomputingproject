<?php

namespace App\Http\Livewire\Fronted;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public $wishlist_id;
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.fronted.wishlist-show',[
            'wishlist' => $wishlist
        ]);
    }
    public function removeWishlistItem(int $wishlistId)
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('id',$wishlistId)->delete();
        $this->emit('wishlistUpdated');
        $this->emit('alertMessage', 'success',__('front_alert.Wishlist item removed'));
        
    }
    // public function deleteWishlist(int $wishlist_id)
    // {
        
    //     $this->wishlist_id = $wishlist_id;
    // }
    // public function destroywishlist()
    // {
    //     $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('id',$wishlist_id)->delete();
    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->emit('alertMessage', 'success', 'Wishlist item remove successfully!'); 
    // }
}
