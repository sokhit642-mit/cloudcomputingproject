@extends('layouts.admin')
@section('title')
    Category | Create
@endsection
@section('content')
    
{{-- <livewire:admin.category.create /> --}}
<div>
    <div class="">
       
        {{-- <h4>Category Create</h4> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
                <li class="breadcrumb-item">@lang('admin_dash.category')</li>
                <li class="breadcrumb-item">@lang('admin_dash.create')</li>
            
                
            </ol>
        
        </nav>
        <form id="myForm" action="{{ url('admin/category') }}" class="needs-validated" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            
                <div class="row">
                <div class="col-lg-4">
        
                    <div class="card">
                        <h5 class="card-header title">@lang('admin_dash.category_image')</h5>
                    <div class="card-body">
                        
                        
                        
                        <div class="card-body profile-card  d-flex flex-column align-items-center">

                            {{-- <img src="{{ asset('admin-assets1\dist\img\insert-image.svg') }}"  alt="..." class="rounded-sm" style="width: 50%"> --}}
                            
                            <center><label for="image" id="image-preview">
                                <img src="https://bit.ly/3ubuq5o" class="img-thumbnail" alt="" width="60%">
                                <div>
                                <span hidden>+</span>
                                </div>
                            </label>
                            </center>
                            <br>
                            
                            <div class="form-group" style="padding: 2px;">
                                {{-- <label for="exampleInputFile">File input</label> --}}
                                <div class="input-group">
                                    <div class="custom-file  @error('image') is-invalid" @enderror">
                                        <input  type="file" id="image" name="image" accept="image/*" class="form-control @error('image') is-invalid" @enderror">
                                        <p class="invalid-feedback">
                                            please uploade an image.
                                        </p>
                                        {{-- <input type="file" id="image" name="image" multiple class="form-control @error('image') is-invalid" @enderror"> --}}
                                    </div>
                                    
                                    @error('image')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                    
                                
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    </div>
        
                
        
                </div>
        
                <div class="col-lg-8">
        
                    <div class="card">
                        <h5 class="card-header">@lang('admin_dash.category_detail')</h5>
                    <div class="card-body">
                        
                        <br>
                        <div class="row g-3">
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input required type="text" wire:model="name"  value="{{ old('name') }}" name="name" id="name" class="form-control @error('name') is-invalid" @enderror"  placeholder="">
                                <label for="floatingName">@lang('admin_dash.name')</label>
                                <p class="invalid-feedback">
                                    @lang('admin_dash.please input category name') 
                                </p>
                                
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input required type="slug" value="{{ old('slug') }}" name="slug" id="slug" class="form-control @error('slug') is-invalid" @enderror"  placeholder="">
                                <label for="floatingEmail">@lang('admin_dash.slug')</label>
                                <p class="invalid-feedback">
                                    @lang('admin_dash.please input category slug') 
                                </p>
                               
                            </div>
                            </div>
                            
                            <div class="col-12">
                            <div class="form-floating">
                                <textarea required class="form-control @error('description') is-invalid" @enderror" id="description" name="description" placeholder="" style="height: 100px;"></textarea>
                                <label for="floatingTextarea">@lang('admin_dash.description')</label>
                                <p class="invalid-feedback">
                                    @lang('admin_dash.please input category description') 

                                </p>
                                {{-- @error('description')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror  --}}
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="checkbox-wrapper-35">
                                    <input class="switch3"  wire:model.defer='status' type="checkbox" id="switch3" name="status" value="1">
                                    <label for="switch3">
                                      <span class="switch3-x-text">@lang('admin_dash.status_is') </span>
                                      <span class="switch3-x-toggletext">
                                        <span class="switch3-x-unchecked"><span class="switch3-x-hiddenlabel">Unchecked: </span>Visible</span>
                                        <span class="switch3-x-checked"><span class="switch3-x-hiddenlabel">Checked: </span>Hildden</span>
                                      </span>
                                    </label>
                                </div>
                            </div>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                    
                    </div>
                    <div style="float: right;" class=" mt-3">
                        <a href="{{ url('admin/category') }}" type="button" data-bs-original-title=" @lang('admin_dash.all_category')" data-bs-toggle="tooltip" class="btn btn-warning"><i class="bi bi-box-arrow-in-left"></i></a>
                        <button type="submit" class="btn btn-primary" data-bs-original-title="@lang('admin_dash.save')" data-bs-toggle="tooltip"><i class="bi bi-floppy me-2"></i> @lang('admin_dash.save')</button>
                        
                    </div>
                </div>
                
            </div>
               
            
        </form>
    </div>
</div>

   
@endsection
