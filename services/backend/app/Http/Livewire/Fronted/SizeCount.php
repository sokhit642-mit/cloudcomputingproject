<?php

namespace App\Http\Livewire\Fronted;

use App\Models\Size;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SizeCount extends Component
{
    public $SizeCount;


    protected $listeners = ['wishlistUpdated' => 'checkSizeCount'];

    public function mount($product)
    {
        $this->product = $product;
        $this->product = Product::all();
        $this->checkSizeCount();
    }

    public function checkSizeCount()
    {
        if (Auth::check()) {
            // $this->SizeCount = Size::where('product_id', $this->productId)->count();    
            $this->SizeCount = Size::where('product_id',$this->product->id)->count();            
        } else {
            $this->SizeCount = 0;
        }
    }

    public function render()
    {
        return view('livewire.fronted.size-count', [
            'SizeCount' => $this->SizeCount,
            'product' => $this->product,

        ]);
    }
}
