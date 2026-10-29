@extends('layouts.admin')
@section('title')
    Discounts
@endsection
@section('content')


  
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
          <li class="breadcrumb-item">Discounts</li>
        </ol>
        
    </nav>
    <div class="card">
        <div class="card-header" style="display: flex;justify-content: space-between;">
            <div class="title">
              <div class="input-group input-group-merge">
                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                <input type="text" wire:model='search' class="form-control" placeholder="Search Coupon...">

                {{-- <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31"> --}}
              </div>
            </div>
            <div class=" d-flex gap-2">
              <div class="title">
                <select wire:model='status'  class="select2 form-select select2-hidden-accessible" >
                  <option value=""  hidden data-select2-id="2">Select</option>
                  
                  <option value="United Kingdom">visible</option>
                  <option value="United States">hilden</option>
                </select>
                
              </div>
              <a class="btn btn-label-primary" href="{{ url('admin/discounts/create') }}">
                <i class="bi bi-plus-square me-2"></i> Add New Discount
              </a>

            </div>
        </div>
        <div class="">
            <table class="dt-multilingual table border-top dataTable no-footer dtr-column collapsed border-bottom">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Coupon Code</th>
                        <th>Discount Type</th>
                        <th>Discount Value</th>
                        <th>Usage Limit</th>
                        <th>Usage Count</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            
        </div>
    </div>
</div>
   

  
@endsection