@extends('layouts.admin')
@section('title')
    Silder | Edit
@endsection
@section('content')
    

<div>
    <div class="pagetitle">
        <div class="row" style="float: right;margin-top: 2px;">
            {{-- <nav>
                <a href="{{ url('admin/category') }}" type="button" data-bs-original-title="All Category" data-bs-toggle="tooltip" class="btn btn-warning"><i class="bi bi-box-arrow-in-left"></i></a>
            </nav> --}}
        </div>
        {{-- <h1>Slider</h1> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
                <li class="breadcrumb-item">@lang('admin_dash.slider')</li>
                <li class="breadcrumb-item">@lang('admin_dash.edit_slider')</li>
            
                
            </ol>
        
        </nav>
        <form id="myForm" action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section class="section">
                <div class="card">
                    <div class="card-header border-bottom">
                        @lang('admin_dash.edit_slider')
                    </div>
                    <div class="card-body">
                        <div class="row g-3 mt-2">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text"  value="{{ $slider->title }}" name="title" id="title" class="form-control @error('title') is-invalid" @enderror"  placeholder="title">
                                    <label for="floatingName">@lang('admin_dash.slider_title')</label>
            
                                    @error('title')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image" id="image">
                                <div class="text-center mt-2">
                                    <center>
                                        <label for="image" id="image-preview">
                                            <img src="{{ asset('uploads/slider/'.$slider->image) }}" class="img-thumbnail  rounded-2" alt="" width="80%">
                                            <div>
                                            <span hidden>+</span>
                                            </div>
                                        </label>
                                    </center>
                                   
                                </div>

                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea  class="form-control @error('description') is-invalid" @enderror" id="description" name="description" placeholder="Address" style="height: 100px;">{{ $slider->description }}</textarea>
                                    <label for="floatingTextarea">@lang('admin_dash.slider_desc')</label>
                                    
                                    @error('description')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror 
                                </div>  
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="checkbox-wrapper-35">
                                    <input class="switch3" type="checkbox" id="switch3" {{ $slider->status == '1' ? 'checked':'' }} name="status" value="1">
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
                
                <div class="row">
                
        
                
                
                </div>
               
            </section>
            <div class=" float-end mt-2">
                <button type="submit" class="btn btn-primary float-end m-1" data-bs-original-title="Save slider" data-bs-toggle="tooltip">Update</button>

                <a href="{{ url('admin/sliders') }}" type="button" data-bs-original-title="@lang('admin_dash.all_slider')" data-bs-toggle="tooltip" class="btn btn-warning float-end m-1"><i class="bi bi-box-arrow-in-left"></i></a>
            </div>
        </form>
    </div>
</div>

   
@endsection
