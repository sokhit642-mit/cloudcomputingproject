@extends('layouts.admin')
@section('title')
    Product | Edit
@endsection
@section('content')

<section class="section dashboard">
    <div class="pagetitle">
        <div class="row" style="float: right;margin-top: 2px;">
            {{-- <nav>
                <a href="{{ url('admin/category/create') }}" type="button" data-bs-original-title="Add New Category" data-bs-toggle="tooltip" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
            </nav> --}}
        </div>
        {{-- <h1>Add Products</h1> --}}
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
            <li class="breadcrumb-item">@lang('admin_dash.product')</li>
            <li class="breadcrumb-item">@lang('admin_dash.edit_product')</li>
           
            
          </ol>
          
        </nav>
        <form id="myForm" action="{{ url('admin/products/'.$products->id) }}"  method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row mb-6">
                @if (session('message'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3500",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };

                        toastr.success(@json(session('message')));
                    });
                </script>
            @endif
                <div class="col-md">
                    <div class="card">
                        {{-- <h5 class="card-header border-bottom">1 . Product detail</h5> --}}
                        <h5 class="card-header border-bottom">@lang('admin_dash.1.product_detail')</h5>
                        
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-md-6 position-relative">
                                    <label class="form-label">@lang('admin_dash.product_name')</label>
                                    <input type="text"  id="validationTooltipUsername" value="{{ $products->name }}"  value="{{ old('name') }}" name="name" placeholder="@lang('admin_dash.product_name')" class="form-control @error('name') is-invalid" @enderror">
                                    <div class="invalid-tooltip">
                                        @lang('admin_dash.validate_p_name')
                                    </div>
                                    {{-- @error('name')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror  --}}
                                    
                                </div>
                                <div class="col-md-6 position-relative">
                                <label for="inputName5" class="form-label">@lang('admin_dash.product_slug')</label>
                                <input type="text" value="{{ $products->slug }}"   value="{{ old('slug') }}" name="slug" placeholder="@lang('admin_dash.product_slug')" class="form-control @error('slug') is-invalid" @enderror">
                                <div class="invalid-tooltip" >
                                    @lang('admin_dash.validate_p_slug')
                                </div>
                                {{-- @error('slug')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror  --}}
                                </div>
                            
                            
                                <div class="col-md-12 position-relative">
        
                                <label for="inputName5" class="form-label">@lang('admin_dash.product_desc')</label>
                                <textarea name="description"  placeholder="@lang('admin_dash.product_desc')" class="form-control @error('description') is-invalid" @enderror" id="" cols="30" rows="4">{{old('description')}} {{ $products->description }}</textarea>
                                <div class="invalid-tooltip">
                                    @lang('admin_dash.validate_p_desc')
                                </div>
                                
                                {{-- @error('description')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror  --}}
                                </div>
                                <div class=" d-flex">
                                    <div class="col-md-4">
                                        
                                        <div class="checkbox-wrapper-35">
                                            <input class="switch2"  type="checkbox" id="switch2" {{ $products->trending == '1' ? 'checked':'' }} name="trending" value="1">
                                            <label for="switch2">
                                            <span class="switch2-x-text">@lang('admin_dash.trending_is') </span>
                                            <span class="switch2-x-toggletext">
                                                <span class="switch2-x-unchecked"><span class="switch2-x-hiddenlabel">Unchecked: </span><span class="badge rounded-pill bg-success"><i class="bi bi-check-circle "></i> @lang('admin_dash.trending')</span></span>
                                                <span class="switch2-x-checked"><span class="switch2-x-hiddenlabel">Checked: </span><span class="badge rounded-pill bg-warning"><i class="bi bi-exclamation-circle"></i> @lang('admin_dash.not_trending')</span></span>
                                            </span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <div class="checkbox-wrapper-35">
                                            
                                            <input class="switch"  type="checkbox" id="switch" {{ $products->status == '1' ? 'checked':'' }} name="status" value="1">
                                            <label for="switch">
                                            <span class="switch-x-text">@lang('admin_dash.status_is') </span>
                                            <span class="switch-x-toggletext">
                                                <span class="switch-x-unchecked"><span class="switch-x-hiddenlabel">Unchecked: </span><span class="badge rounded-pill bg-success"><i class="bi bi-check-circle "></i> Visible</span>
                                            </span>
                                                <span class="switch-x-checked"><span class="switch-x-hiddenlabel">Checked: </span><span class="switch-x-hiddenlabel">Unchecked: </span><span class="badge rounded-pill bg-danger"><i class="bi bi-x-circle"></i> Hidden</span></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <h5 class="card-header border-bottom">@lang('admin_dash.2.product_pategory | brand')</h5>
                        <div class="card-body">
                            <div class="row gy-4 mt-1">
                                {{-- <div class="col-md-4 position-relative" >
                                    <label for="inputName5" class="form-label">@lang('admin_dash.category')</label>
                                    <select name="category_id"  class="form-select @error('category_id') is-invalid" @enderror">
                                                
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected':''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @lang('admin_dash.validate_p_choose_cat')
                                    </div>
                                </div>
                                
                                <div class="col-md-4 position-relative">
                                    <label for="inputName5" class="form-label">@lang('admin_dash.sub_category')</label>
                                    <select name="subcategory"  class="form-select @error('subcategory') is-invalid" @enderror">
                                                        
                                        @foreach ($subcategory as $subcategory)
                                        <option hidden value="">@lang('admin_dash.product_choose_sub_cat')</option>   
                                        <option value="{{ $subcategory->name }}" {{ $subcategory->name == $products->subcategory ? 'selected':''}}>{{ $subcategory->name }}</option>   
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @lang('admin_dash.validate_p_choose_sub_cat')

                                    </div>
                                </div> --}}
                                <div class="col-md-4 position-relative">
                                    <label for="inputName5" class="form-label">@lang('admin_dash.category')</label>
                                    <select id="categorySelect" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                        <option hidden value="">@lang('admin_dash.choose_category')</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @lang('admin_dash.validate_p_choose_cat')
                                    </div>
                                </div>
                                
                                <div class="col-md-4 position-relative">
                                    <label for="inputName5" class="form-label">@lang('admin_dash.sub_category')</label>
                                    <select id="subcategorySelect" name="subcategory" class="form-select @error('subcategory') is-invalid @enderror">
                                        @foreach ($subcategories as $subcategory)
                                            {{-- <option hidden value="">@lang('admin_dash.product_choose_sub_cat')</option> --}}

                                            <option value="{{ $subcategory->name }}" {{ $subcategory->name == $products->subcategory ? 'selected' : '' }}>
                                                {{ $subcategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @lang('admin_dash.validate_p_choose_sub_cat')
                                    </div>
                                </div>
                                
                                {{-- <script>
                                    document.getElementById('categorySelect').addEventListener('change', function() {
                                        var categoryId = this.value;
                                        var subcategorySelect = document.getElementById('subcategorySelect');
                                        subcategorySelect.disabled = true;
                                        subcategorySelect.innerHTML = '<option hidden value="">@lang('admin_dash.product_choose_sub_cat')</option>';
                                
                                        if (categoryId) {
                                            fetch(`/subcategories/${categoryId}`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    data.forEach(function(subcategory) {
                                                        var option = document.createElement('option');
                                                        option.value = subcategory.name;
                                                        option.text = subcategory.name;
                                                        option.selected = subcategory.name === "{{ $product->subcategory }}"; // Pre-select if it matches
                                                        subcategorySelect.appendChild(option);
                                                    });
                                                    subcategorySelect.disabled = false;
                                                })
                                                .catch(error => console.error('Error:', error));
                                        }
                                    });
                                </script> --}}
                                
                                <div class="col-md-4 position-relative">
                                    <label for="inputName5" class="form-label">@lang('admin_dash.brand')</label>

                                    <select name="brand_id"  class="form-select @error('brand_id') is-invalid" @enderror">
                                        @foreach ($brands as $brand)
                                        <option hidden value="">@lang('admin_dash.product_choose_brand')</option>   
                                        <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected':''}}>{{ $brand->name }}</option>   
                                        @endforeach
                                        @error('brand')
                                            <p class="invalid-feedback">
                                                @lang('admin_dash.validate_p_choose_brand')

                                            </p>
                                        @enderror 
                                    </select>
                                </div>
                                
                                
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <h5 class="card-header border-bottom">@lang('admin_dash.3.product_image')</h5>
                       
                        <div class="card-body">
                            <div class="row">
                                <div class="d-grid gap-2 mt-2">
                                    <label for="file-input" class="btn btn-primary mb-3">@lang('admin_dash.upload_image')</label>
                                    <div class="invalid-feedback">
                                        @lang('admin_dash.validate_p_image')
                                    </div>
                                </div>
                                {{-- <input type="file" name="image[]" class="drop-zone__input" data-max_length="5" id="file-input" multiple> --}}
                                <div>
                                    <label for="inputName5" class="form-label">@lang('admin_dash.old_pre_image')</label>
                                    <div  class="dropzone">
                                
                                       
                                        @if ($products->productImages)
                                        <div class="row">
                                            @foreach ($products->productImages as $image)
                                            <div class="col-md-2 text-center flex-column file-preview">
    
                                                <img src="{{ asset($image->image)}}" alt="Img" class="border" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;border-radius: 6px;" width="170px" height="170px" >
                                                <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class=" btn btn-label-primary btn-xs">@lang('admin_dash.remove')</a>
                                            </div>
                                                
                                            @endforeach
                                        </div>
                                        
                                
                                        @else
                                            <h5>@lang('admin_dash.no_image')</h5>
                                        @endif
                                        
                                       
        
                                        
                                    </div>
                                    
                                 <br>
                                </div>
                                <label for="inputName5" class="form-label">@lang('admin_dash.new_pre_image')</label>
                                
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                      {{-- <label class="btn btn-primary mb-3">
                                        <p>Upload images</p> --}}
                                        
                                        <input type="file" id="file-input" multiple name="image[]" data-max_length="5" class="upload__inputfile">
                                      </label>
                                    </div>
                                    
                                    <div class="drop-zone">
                                        <div class="upload__img-wrap img-thumbnail gap-2" style="border-radius: 10px;"></div>

                                    </div>
                                  
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <h5 class="card-header border-bottom">@lang('admin_dash.4.pricing_qty')</h5>
                        <div class="card-body">
                            <div class="row gy-4 mt-1">
                                <div class="col-md-6">
                                    <label for="inputName5" class="form-label">@lang('admin_dash.product_o_price')</label>
                                    <input type="text" value="{{ $products->original_price }}" value="{{old('original_price')}}" placeholder="@lang('admin_dash.product_o_price')"  name="original_price" class="form-control @error('original_price') is-invalid" @enderror">
                                    {{-- <div class="invalid-feedback">
                                        Please enter Product Original price.
                                    </div> --}}
                                    @error('original_price')
                                        <p class="invalid-feedback">
                                            @lang('admin_dash.validate_p_o_price')
                                        </p>
                                    @enderror 
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <label for="inputName5" class="form-label">@lang('admin_dash.product_s_price')</label>
                                    <input type="text" value="{{ $products->selling_price }}" value="{{old('selling_price')}}" placeholder="@lang('admin_dash.product_s_price')" name="selling_price" class="form-control @error('selling_price') is-invalid" @enderror">
                                    {{-- <div class="invalid-feedback">
                                        Please enter Product Selling price.
                                    </div> --}}
                                    @error('selling_price')
                                        <p class="invalid-feedback">
                                            @lang('admin_dash.validate_p_s_price')
                                        </p>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label for="discount_value">Discount Value</label>
                                    <input type="number" name="discount_value" id="discount_value" class="form-control" value="{{ old('discount_value', $products->discount_value ?? '') }}" step="0.01" placeholder="Enter discount value (e.g., 20)">
                                </div>
                                
                                <div class="form-group">
                                    <label for="discount_type">Discount Type</label>
                                    <select name="discount_type" id="discount_type" class="form-select">
                                        <option value="" disabled selected>Select discount type</option>
                                        <option value="percentage" {{ $products->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                        <option value="fixed" {{ $products->discount_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">@lang('admin_dash.product_qty')</label>
                                    <input type="number" value="{{ $products->quantity }}" placeholder="@lang('admin_dash.product_qty')"  value="{{old('quantity')}}"  name="quantity" class="form-control  @error('quantity') is-invalid" @enderror">
                                    {{-- <div class="invalid-feedback">
                                        Please enter Product quantity.
                                    </div> --}}
                                    @error('quantity')
                                        <p class="invalid-feedback">
                                            @lang('admin_dash.validate_p_q')
                                        </p>
                                    @enderror 
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-12">
                        {{-- <h6 class="text-muted">Basic</h6> --}}
                        <div class="nav-align-top nav-tabs-shadow mb-6">
                          <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">Sizes</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false" tabindex="-1">Color</button>
                            </li>
                            
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                                <h6 class="text-body" style="margin-left: 40px;">Select sizes</h6>
                                <div id="sizeOptions" class="d-flex flex-wrap mb-2 gap-3" style="margin-left: 40px; margin-right: -50px;">
                                    @forelse ($sizes as $sizeItem)
                                        <div class="border p-2 rounded-3 col-md-2">
                                            <div class="form-check custom-option custom-option-basic flex-grow-1 mb-1">
                                                <label class="form-check-label custom-option-content" for="customCheckTemp3_{{ $sizeItem->id }}">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="checkbox" 
                                                        name="sizes[{{ $sizeItem->id }}]" 
                                                        value="{{ $sizeItem->id }}" 
                                                        id="customCheckTemp3_{{ $sizeItem->id }}"
                                                        {{ isset($product_sizes[$sizeItem->id]) ? 'checked' : '' }}
                                                    >
                                                    <span class="custom-option-header">
                                                        <span class="h6 mb-0 mt-1">{{ $sizeItem->name }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <input 
                                                type="number" 
                                                name="sizequantity[{{ $sizeItem->id }}]" 
                                                placeholder="Quantity" 
                                                class="form-control"
                                                value="{{ $product_sizes[$sizeItem->id] ?? '' }}" 
                                            >
                                        </div>
                                    @empty
                                        <h4>@lang('admin_dash.no_size_add')</h4>
                                    @endforelse
                                </div>
                                @if(!empty($sizes))
                                    {{-- <div class="d-flex flex-wrap mb-2 gap-3" style="margin-left: 40px;margin-right:-50px;">
                                        @forelse ($sizes as $sizeItem)
                                            <div class="border p-2  rounded-3  col-md-2">
                                                <div class="form-check custom-option custom-option-basic flex-grow-1 mb-1">
                                                    <label class="form-check-label custom-option-content" for="customCheckTemp3_{{ $sizeItem->id }}">
                                                        <input class="form-check-input" type="checkbox" name="sizes[{{ $sizeItem->id }}]" value="{{ $sizeItem->id }}" id="customCheckTemp3_{{ $sizeItem->id }}">
                                                        <span class="custom-option-header">
                                                            <span class="h6 mb-0 mt-1">{{ $sizeItem->name }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <input type="number" name="sizequantity[{{ $sizeItem->id }}]" placeholder="Quantity" class="form-control">
                                            </div>
                                        @empty
                                            <h4>@lang('admin_dash.no_size_add')</h4>
                                        @endforelse
                                        
                                    </div> --}}
                                   
                                    <div class="table-responsive p-2" style="margin-left: 35px;margin-right:70px;">
                                        <table class="table table-hover table-bordered table-sm table-striped border" style="border-radius: 25px;" >
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">@lang('admin_dash.size')</th>
                                                    <th class="text-center">@lang('admin_dash.action')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($products->productSizes as $prodSize)
                                                    
                                                    <tr class="prod-size-tr">
                                                        <td style="vertical-align: middle;" class="text-center">{{ $prodSize->size_id }}</td>
                                                        <td style="vertical-align: middle;" class="text-center">
                                                            <div class=" input-group">
                                                                <label class="btn btn-primary">{{ $prodSize->size->name }}</label>
                                                                <input type="checkbox" disabled class="btn-check" autocomplete="off">
                                                                <input type="text" class="productSizeQuantity form-control form-control-sm" value="{{$prodSize->quantity}}">
                                                                <button type="button" value="{{$prodSize->id}}" class="updateProductSize btn btn-info">Update</button>
                                                            </div>
                                                        </td>
                                                        <td style="vertical-align: middle;" class="text-center"><a href="{{ url('admin/product-size/'.$prodSize->id.'/delete') }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> @lang('admin_dash.delete1')</a></td>
                                                    </tr>
                                                @empty
                                                    <tr class="text-center" >
                                                        <td colspan="5">@lang('admin_dash.no_color_select')</td>
                                                    </tr>
                                                   
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                
                            </div>
                            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                <h6 class="mb-3 text-body" style="margin-left: 40px;">Select colors</h6>
                                <div class="row gap-3" style="margin-left: 40px;margin-right:-50px;">
                                  
                                    @forelse ($colors as $colorItem)
                                        <div class="col-md-2 border p-2 rounded-3">
                                            <input class="form-check-input" name="colors[{{ $colorItem->id }}]" value="{{ $colorItem->id }}" type="checkbox">
                                            <label class="form-check-label">
                                                {{-- {{ $colorItem->name }}  --}}
                                                <input type="color"  disabled value="{{ $colorItem->code }}"> 
                                            </label>

                                            <input type="number"  name="colorquantity[{{ $colorItem->id }}]"  placeholder="Quantity" class="form-control">
                                        </div>  
                                        
                                        {{-- <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off">
                                        <label class="btn btn-{{ $colorItem->code }}" for="btn-check">{{ $colorItem->name }} </label> --}}

                                    @empty
                                        <h4>@lang('admin_dash.no_color_add')</h4>
                                    @endforelse
                                    
                                </div>
                                <div class="table-responsive p-2" style="margin-left: 35px;margin-right:70px;">
                                    <table class="table table-hover  table-sm table-striped border" style="border-radius: 25px;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">@lang('admin_dash.color')</th>
                                                <th class="text-center">@lang('admin_dash.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products->productColors as $prodColor)
                                                <tr class="prod-color-tr">
                                                    <td style="vertical-align: middle;" class="text-center">{{ $prodColor->id }}</td>
                                                    <td style="vertical-align: middle;" class="text-center">
                                                        <div class=" input-group">
                                                            @if ($prodColor->color)
                                                                <input type="color" class="form-color" style="width:100px;height:40px" disabled value="{{ $prodColor->color->code }}">
                                                            @else
                                                                <span>@lang('admin_dash.no_color')</span>
                                                            @endif
                                                            <input type="text" class="productColorQuantity form-control form-control-sm" value="{{$prodColor->quantity}}">
                                                            <button type="button" value="{{$prodColor->id}}"class="updateProductColor btn btn-info">Update</button>

                                                        </div>
                                                        
                                                    </td>
                                                    <td style="vertical-align: middle;" class="text-center">
                                                        <a href="{{ url('admin/product-color/'.$prodColor->id.'/delete') }}" class="btn btn-sm btn-danger">
                                                            <i class="bi bi-trash"></i> @lang('admin_dash.delete1')
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="5">@lang('admin_dash.no_color_select')</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                          </div>
                        </div>
                    </div>
                    <br>

                </div>
                
                
                <br>

                <div class="text-center">
                    <a type="button"  class="btn btn-warning mt-4" href="{{ url('admin/products') }}">
                        <i class="bi bi-box-arrow-in-left me-2"></i> @lang('admin_dash.all_product')
                    </a>
                    <button type="submit" class="btn btn-primary mt-4"><i class="bi bi-floppy2-fill me-2"></i> @lang('admin_dash.save')</button>
                </div>
            
            </div>
            
        </form>
        <br>
        <br>
        
       
      </div>
</section>


@endsection
@section('script')
<script>
    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.updateProductSize', function () {
            var products_id = "{{ $products->id }}";
            var prod_size_id = $(this).val();
            var qty =  $(this).closest('.prod-size-tr').find('.productSizeQuantity').val();

            if(qty < 0){
                toastr.warning('Quantity should be greater than zero.');

                return false;
            }

            var data = {
                'products_id' : products_id,
                'qty' : qty
            };
            $.ajax({
                type: "POST",
                url: "/admin/product-size/"+prod_size_id,
                data: data,
                success: function (response) {
                    toastr.success(response.message);
                },
                error: function (xhr, status, error) {
                  toastr.error('Something went wrong!');
                  
                }
            });
        });
    });
  </script>
<script>
    $(document).addEventListener(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.updateProductColor', function () {
            var products_id = "{{ $products->id }}";
            var prod_color_id = $(this).val();
            var qty =  $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            // alert(prod_color_id);
            if(qty <= 0){
                toastr.warning('Quantity should be greater than zero.');

               
                return false;
            }

            var data = {
                'products_id' : products_id,
                'qty' : qty
            };
            $.ajax({
                type: "POST",
                url: "/admin/product-color/"+prod_color_id,
                data: data,
                success: function (response) {
                    toastr.success(response.message,);

                   
                },
                error: function (xhr, status, error) {
                    toastr.error('Something went wrong!');

                }
            });
        });
    });
</script>
@endsection