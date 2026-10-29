<?php

namespace App\Http\Livewire\Fronted;

use Livewire\Component;

class IndexBrandsImage extends Component
{
    public $brand, $productItem;
    public function mount($brand)
    {
        $this->brand = $brand;
    }
    public function render()
    {
        return view('livewire.fronted.index-brands-image',[
            'brand' => $this->brand
        ]);
    }
}
