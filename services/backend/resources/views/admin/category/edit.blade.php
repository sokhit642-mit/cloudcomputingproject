@extends('layouts.admin')

@section('content')
   <div class="pagetitle">
        <div class="row" style="float: right;margin-top: 2px;">
            {{-- <nav>
                <a href="{{ url('admin/category') }}" type="button" data-bs-original-title="All Category" data-bs-toggle="tooltip" class="btn btn-warning"><i class="bi bi-box-arrow-in-left"></i></a>
            </nav> --}}
        </div>
        
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
                <li class="breadcrumb-item">@lang('admin_dash.category')</li>
                <li class="breadcrumb-item">@lang('admin_dash.edit')</li>
            
                
            </ol>
        
        </nav>
        <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
                <div class="row">
                <div class="col-lg-4">
        
                    <div class="card">
                        <h5 class="card-header title">@lang('admin_dash.category_image')</h5>
                    <div class="card-body">
                        
                        
                        
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            {{-- <img src="{{ asset('admin-assets1\dist\img\insert-image.svg') }}"  alt="..." class="rounded-sm" style="width: 50%"> --}}
                            
                            <center><label for="image" id="image-preview">
                                <img src="{{ asset('uploads/category/'.$category->image) }}" alt="" width="60%">
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
                                        <input type="file" id="image" name="image" accept="image/*" class="form-control @error('image') is-invalid" @enderror">
                                        
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
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid" @enderror"  placeholder="" value="{{$category->name}}">
                                <label for="floatingName">@lang('admin_dash.name')</label>
                                <p class="invalid-feedback">
                                    @lang('admin_dash.please input category name') 
                                </p>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="slug" value="{{$category->slug}}" name="slug" id="slug" class="form-control @error('slug') is-invalid" @enderror"  placeholder="">
                                <label for="floatingEmail">@lang('admin_dash.slug')</label>
                                <p class="invalid-feedback">
                                    @lang('admin_dash.please input category slug') 
                                </p>
                            </div>
                            </div>
                            
                            <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control @error('description') is-invalid" @enderror" id="description" name="description" placeholder="" style="height: 100px;">{{$category->description}}</textarea>
                                <label for="floatingTextarea">@lang('admin_dash.description')</label>
                                <p class="invalid-feedback">
                                    @lang('admin_dash.please input category description') 
                                </p>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="checkbox-wrapper-35">
                                    <input class="switch3"  wire:model.defer='status' type="checkbox" id="switch3" {{ $category->status == '1' ? 'checked':'' }} name="status" value="1">
                                    <label for="switch3">
                                      <span class="switch3-x-text">@lang('admin_dash.status_is') </span>
                                      <span class="switch3-x-toggletext">
                                        <span class="switch3-x-unchecked"><span class="switch3-x-hiddenlabel">Unchecked: </span>Visible</span>
                                        <span class="switch3-x-checked"><span class="switch3-x-hiddenlabel">Checked: </span>Hildden</span>
                                      </span>
                                    </label>
                                </div>
                                {{-- <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                <div class="row mb-3">
                                    
                                    <div class="col-sm-10">
                  
                                      <div class="form-check">
                                        <input data-bs-original-title="Uncheck = Visible and Check = Hidden" data-bs-toggle="tooltip" class="form-check-input @error('name') is-invalid" @enderror" type="checkbox"  value="1" {{ $category->status == '1' ? 'checked':'' }} id="status" name="status">
                                        <label class="form-check-label" for="gridCheck1">
                                          
                                        </label>
                                        @error('status')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror 
                                      </div>
                
                                      </div>
                  
                                    </div>
                                  </div> --}}
                            </div>
                            </div>
                            
                            
                        </div>
        
                    </div>
                    
                    </div>
                    
                    <div style="float: right;" class=" mt-2">
                        <a href="{{ url('admin/category') }}" type="button" data-bs-original-title="@lang('admin_dash.all_category')" data-bs-toggle="tooltip" class="btn btn-warning"><i class="bi bi-box-arrow-in-left"></i></a>
                        <button type="submit" class="btn btn-primary" data-bs-original-title="@lang('admin_dash.save')" data-bs-toggle="tooltip"><i class="bi bi-floppy me-2"></i> @lang('admin_dash.save')</button>
                        
                    </div>
        
                
        
                </div>
                </div>
            
        </form>
    </div>
   
   
@endsection
