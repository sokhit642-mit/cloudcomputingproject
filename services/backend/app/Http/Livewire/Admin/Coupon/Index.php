<?php

namespace App\Http\Livewire\Admin\Coupon;

use Carbon\Carbon;
use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $coupon_id;
    public $search = '';
    public $currentImage;
    public function render()
    {
        $coupons = Coupon::where('code', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        // $coupons = Coupon::where('expiry_date', '>=', Carbon::now())->get();

        return view('livewire.admin.coupon.index', compact('coupons'));
    }

    public function deleteCoupon($coupon_id)
    {
        
        $this->coupon_id = $coupon_id;
    }
    public function destroyCoupon()
    {
        $coupon = Coupon::find($this->coupon_id);
        $coupon->delete();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('message',__('alert.Brand Deleted Successfully'));
        $this->emit('message', __('alert.Coupon Deleted Successfully'), 'success');
        
           
    }
}
