@extends('layouts.admin')
@section('title')
    Coupons | Create
@endsection
@section('content')


<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
          <li class="breadcrumb-item">Coupons</li>
          <li class="breadcrumb-item">Create</li>
        </ol>
        
    </nav>
    <form action="{{ route('coupons.store') }}" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Coupon</h4>
                        <p class="card-subtitle text-muted">Create a new coupon for your customers.</p>
                    </div>
                    <div class="card-body">
                        
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="code">Coupon Code:</label>
                                    <input class="form-control" placeholder="Coupon code" type="text" id="code" name="code" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="discount_type">Discount Type:</label>
                                    <select class="form-select" id="discount_type" name="discount_type" required>
                                        <option hidden>--Choose Discount Type--</option>
                                        <option value="fixed">Fixed Amount</option>
                                        <option value="percent">Percentage</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="discount_value">Discount Value:</label>
                                    <input class="form-control" placeholder="Discount value" type="number" id="discount_value" name="discount_value" min="1" required>
                        
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="expiry_date">Expiry Date:</label>
                                    <input class="form-control" type="date" id="expiry_date" name="expiry_date" required>
                                
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="usage_limit">Usage Limit:</label>
                                    <input class="form-control" placeholder="Usage limit" type="number" id="usage_limit" name="usage_limit" min="1" required>
                                    
                                </div>
                            </div>
                            
                        
                           
                        
                            
                        
                            
                        
                        
                        @if(session('message'))
                            <div>{{ session('message') }}</div>
                        @endif
                    </div>
                </div>
                <div class=" float-end">
                    <a href="/admin/coupons" class="btn btn-warning mt-3">Back</a>
                    <button class="btn btn-primary mt-3" type="submit">Create Coupon</button>
                </div>
            </div>
        </div>
        
    </form>
    
</div>

   

  
@endsection