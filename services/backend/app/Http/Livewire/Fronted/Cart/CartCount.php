<?php

namespace App\Http\Livewire\Fronted\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $CartCount;

    protected $listeners = ['cartUpdated' => 'checkCartCount'];

    public function checkCartCount()
    {
        if (Auth::check()) {
            $this->CartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            $this->CartCount = 0;
        }
    }
    public function mount()
    {
        $this->checkCartCount();
    }

    public function render()
    {
        $this->checkCartCount();
        return view('livewire.fronted.cart.cart-count',[
            'CartCount' => $this->CartCount,
        ]);
    }
}
