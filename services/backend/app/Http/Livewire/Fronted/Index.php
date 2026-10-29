<?php

namespace App\Http\Livewire\Fronted;

use Livewire\Component;

class Index extends Component
{
    public $brand;
    public function mount($brand)
    {
        $this->brand = $brand;
    }
    public function render()
    {
        return view('livewire.fronted.index',[
            'brand' => $this->brand
        ]);
    }
}
