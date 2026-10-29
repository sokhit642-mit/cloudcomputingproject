<div>
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
                <li class="breadcrumb-item">@lang('admin_dash.add_product')</li>
               
                
              </ol>
              
            </nav>
            <form id="myForm" action="{{ url('admin/products') }}"  method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="mb-12">
                   
                    <div class="col-md">
                        <div class="card">
                            <h5 class="card-header border-bottom">@lang('admin_dash.1.product_detail')</h5>
                            <div class="card-body">
                                <div class="row gy-4 mt-1">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">@lang('admin_dash.product_name')</label>
                                        <input type="text"  id="validationTooltipUsername"  value="{{ old('name') }}" name="name" placeholder="@lang('admin_dash.product_name')" class="form-control @error('name') is-invalid @enderror">
                                        <div class="invalid-feedback">
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
                                    <input type="text"  value="{{ old('slug') }}" name="slug" placeholder="@lang('admin_dash.product_slug')" class="form-control @error('slug') is-invalid @enderror">
                                    <div class="invalid-feedback" >
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
                                    <textarea name="description"  placeholder="@lang('admin_dash.product_desc')" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="4">{{old('description')}}</textarea>
                                    <div class="invalid-feedback">
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
                                                <input class="switch2"  type="checkbox" id="switch2" name="trending" value="1">
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
                                                
                                                <input class="switch"  type="checkbox" id="switch" name="status" value="1">
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
                                    <div class="col-md-4 position-relative" >
                                        <label for="inputName5" class="form-label">@lang('admin_dash.category')</label>
                                        <select name="category_id" wire:model="selectedCategory" id="categorySelect"  class="form-select @error('category_id') is-invalid @enderror">
                                            
                                            @foreach ($categories as $category)
                                            <option hidden value="">@lang('admin_dash.choose_category')</option>   
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>   
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @lang('admin_dash.validate_p_choose_cat')
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 position-relative">
                                        {{-- <label for="inputName5" class="form-label">@lang('admin_dash.sub_category')</label>
                                        <select name="subcategory"  class="form-select @error('subcategory') is-invalid @enderror">
                                                        
                                            @foreach ($subcategories as $subcategory)
                                            <option hidden value="">@lang('admin_dash.product_choose_sub_cat')</option>   
                                            <option value="{{ $subcategory->name }}">{{ $subcategory->name }}</option>   
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @lang('admin_dash.validate_p_choose_sub_cat')
                                        </div> --}}

                                        <label for="inputName5" class="form-label">@lang('admin_dash.sub_category')</label>
                                        <select id="subcategorySelect" name="subcategory" class="form-select @error('subcategory') is-invalid @enderror" >
                                            <option hidden value="">@lang('admin_dash.product_choose_sub_cat')</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @lang('admin_dash.validate_p_choose_sub_cat')
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputName5" class="form-label">@lang('admin_dash.brand')</label>
                                        <select name="brand_id" class="form-select @error('brand_id') is-invalid @enderror">
                                            <option hidden value="" class=" fs-9" >@lang('admin_dash.product_choose_brand')</option>   
                                            @foreach ($brands as $brand)
                                            <option  value="{{ $brand->id }}">{{ $brand->name }}</option>   
                                            @endforeach
                                           
                                        </select>
                                        <div class="invalid-feedback">
                                            @lang('admin_dash.validate_p_choose_brand')
                                        </div>
                                    </div>
                                    {{-- <hr>
                                    <div class="col-md-4 position-relative">
                                        <label for="inputName5" class="form-label">@lang('admin_dash.category')</label>
                                        <select id="categorySelect" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                            <option hidden value="">@lang('admin_dash.choose_category')</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @lang('admin_dash.validate_p_choose_cat')
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 position-relative">
                                        <label for="inputName5" class="form-label">@lang('admin_dash.sub_category')</label>
                                        <select id="subcategorySelect" name="subcategory" class="form-select @error('subcategory') is-invalid @enderror" >
                                            <option hidden value="">@lang('admin_dash.product_choose_sub_cat')</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @lang('admin_dash.validate_p_choose_sub_cat')
                                        </div>
                                    </div> --}}
                                </div>
                                <br>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <h5 class="card-header border-bottom">@lang('admin_dash.3.product_image')</h5>
                            <div class="card-body">
                                
                                <div class="row gy-4 mt-2">
                                    <div class="d-grid gap-2">
                                        <label for="file-input" class="btn btn-primary  @error('image') is-invalid @enderror">@lang('admin_dash.upload_image')</label>
                                        <div class="invalid-feedback">
                                            @lang('admin_dash.validate_p_image')
                                        </div>
                                    </div>
                                    <div class="upload__box">
                                        <label for="inputName5" class="form-label">@lang('admin_dash.pre_image')</label>
                                        
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
                                    {{-- <div class="d-grid gap-2">
                                        <label for="file-input" class="btn btn-primary mb-3">Upload Images (Less then 5.)</label>
    
                                    </div>
                                    <input type="file" name="image[]" class="drop-zone__input" data-max_length="5" id="file-input" multiple>

                                    <div class="container1">
                                        <div class="drop-zone" id="drop-zone">
                                            
                                            <div class="file-preview" id="file-preview"></div>
                                        </div>
                                    </div> --}}
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
                                        <input type="text" value="{{old('original_price')}}" placeholder="@lang('admin_dash.product_o_price')"  name="original_price" class="form-control @error('original_price') is-invalid @enderror">
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
                                        <input type="text"  placeholder="@lang('admin_dash.product_s_price')" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror">
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
                                        <input type="number" name="discount_value" id="discount_value" class="form-control" value="{{ old('discount_value', $product->discount_value ?? '') }}" step="0.01" placeholder="Enter discount value (e.g., 20)">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="discount_type">Discount Type</label>
                                        <select name="discount_type" id="discount_type" class="form-select">
                                            <option value="" disabled selected>Select discount type</option>
                                            <option value="percentage" {{ (old('discount_type', $product->discount_type ?? '') === 'percentage') ? 'selected' : '' }}>Percentage</option>
                                            <option value="fixed" {{ (old('discount_type', $product->discount_type ?? '') === 'fixed') ? 'selected' : '' }}>Fixed Amount</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="inputName5" class="form-label">@lang('admin_dash.product_qty')</label>
                                        <input type="number" placeholder="@lang('admin_dash.product_qty')"  name="quantity" class="form-control  @error('quantity') is-invalid @enderror">
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
                                    <h6 class="text-body" style="margin-left: 40px;">Choose sizes</h6>
                                    @if(!empty($sizes))
                                        <div class="d-flex flex-wrap mb-2 gap-3" style="margin-left: 40px;margin-right:-50px;">
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
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                    <h6 class="mb-3 text-body" style="margin-left: 40px;">Choose colors</h6>
                                    <div class="row gap-3" style="margin-left: 40px;margin-right:-50px;">
                                      
                                        @forelse ($colors as $colorItem)
                                            <div class="col-md-2 border p-2 rounded-3">
                                                <input class="form-check-input" name="colors[{{ $colorItem->id }}]" value="{{ $colorItem->id }}" type="checkbox">
                                                <label class="form-check-label">
                                                    {{-- {{ $colorItem->name }}  --}}
                                                    <input type="color"  disabled value="{{ $colorItem->code }}"> 
                                                </label>

                                                <input type="number" name="colorquantity[{{ $colorItem->id }}]" placeholder="Quantity" class="form-control">
                                            </div>  
                                            
                                            {{-- <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off">
                                            <label class="btn btn-{{ $colorItem->code }}" for="btn-check">{{ $colorItem->name }} </label> --}}

                                        @empty
                                            <h4>@lang('admin_dash.no_color_add')</h4>
                                        @endforelse
                                    </div>
                                </div>
                               
                              </div>
                            </div>
                        </div>
                        <br>
                     
                    </div>
                    
                    <div class="col-12 col-sm-6 col-lg-4 mb-12">
                        
                        
                        {{-- <div class="card">
                            <h5 class="card-header border-bottom">@lang('admin_dash.7.product_size')</h5>
                            <div class="card-body">
                             
                              <div class="card-body">
                                <div class="row g-4">
                                    
                                    
                                    <div class="">
                    
                                        <div class="gap-2">
                                            @if(!empty($sizes))
                                                <div class="d-flex flex-wrap mb-2">
                                                    @forelse ($sizes as $sizeItem)
                                                        <div class="form-check custom-option custom-option-basic mt-1 mx-1 flex-grow-1">
                                                            <label class="form-check-label custom-option-content" for="customCheckTemp3_{{ $sizeItem->id }}">
                                                                <input class="form-check-input" type="checkbox" value="{{ $sizeItem->id }}" id="customCheckTemp3_{{ $sizeItem->id }}">
                                                                <span class="custom-option-header">
                                                                    <span class="h6 mb-0 mt-1">{{ $sizeItem->name }}</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @empty
                                                        <h4>@lang('admin_dash.no_size_add')</h4>
                                                    @endforelse
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                    
                                </div>
                              </div>
                              
                            </div>
                            
                        </div> --}}
                        
                        <br>
                       
                    <!-- /Bootstrap Validation -->
                  </div>
                    
                    <div class="text-center">
                        <a type="button"  class="btn btn-warning" href="{{ url('admin/products') }}">
                            <i class="bi bi-box-arrow-in-left me-2"></i> @lang('admin_dash.all_product')
                        </a>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill me-2"></i>Save Product</button>
                    </div>
                
                </div>
            </form>
            <br>
            <br>
            {{-- <div class="card ">
                
                    <div class="card-header">
                        
                        <a type="button"  class="btn btn-warning float-end" href="{{ url('admin/products') }}" style="border-radius: 6px;">
                            <i class="bi bi-box-arrow-in-left"></i> Back
                        </a>
                    </div>
                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top: 5px;">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                                
                            @endif
                            <ul class="nav nav-tabs nav-tabs-bordered  border" id="myTab" role="tablist" style="margin-top:4px;">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Image</button>
                                </li>
                            
                            </ul>
    
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade border p-3  show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row g-3" style="margin-top: -6px;">
                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">Category</label>
                                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                @foreach ($categories as $category)
                                                <option hidden value="">Choose category</option>   
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>   
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="invalid-feedback">
                                                    {{ $message }}
                                                </p>
                                            @enderror 
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">Product Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <p class="invalid-feedback">
                                                    {{ $message }}
                                                </p>
                                            @enderror 
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">Product Slug</label>
                                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror">
                                            @error('slug')
                                                <p class="invalid-feedback">
                                                    {{ $message }}
                                                </p>
                                            @enderror 
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">Brand</label>
                                            <select name="brand" class="form-control @error('brand') is-invalid @enderror">
                                                @foreach ($brands as $brand)
                                                <option hidden value="">Choose brand</option>   
                                                <option value="{{ $brand->name }}">{{ $brand->name }}</option>   
                                                @endforeach
                                                @error('brand')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror 
                                            </select>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputName5" class="form-label">Description</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                                            @error('description')
                                                <p class="invalid-feedback">
                                                    {{ $message }}
                                                </p>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade border p-3 " id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                    <div class="row g-3" style="margin-top: -6px;">
                                        
                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">Original Price</label>
                                            <input type="text" name="original_price" class="form-control @error('original_price') is-invalid @enderror">
                                            @error('original_price')
                                                <p class="invalid-feedback">
                                                    {{ $message }}
                                                </p>
                                            @enderror 
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">Selling Price</label>
                                            <input type="text" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror">
                                            @error('selling_price')
                                                <p class="invalid-feedback">
                                                    {{ $message }}
                                                </p>
                                            @enderror 
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputName5" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control  @error('quantity') is-invalid @enderror">
                                            @error('quantity')
                                                <p class="invalid-feedback">
                                                    {{ $message }}
                                                </p>
                                            @enderror 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox-wrapper-35">
                                                <input class="switch2"  type="checkbox" id="switch2" name="trending" value="1">
                                                <label for="switch2">
                                                <span class="switch2-x-text">Trending is </span>
                                                <span class="switch2-x-toggletext">
                                                    <span class="switch2-x-unchecked"><span class="switch2-x-hiddenlabel">Unchecked: </span><span class="badge rounded-pill bg-success"><i class="bi bi-check-circle "></i> Trending</span></span>
                                                    <span class="switch2-x-checked"><span class="switch2-x-hiddenlabel">Checked: </span><span class="badge rounded-pill bg-warning"><i class="bi bi-exclamation-circle"></i> Not-Trending</span></span>
                                                </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkbox-wrapper-35">
                                                <input class="switch"  type="checkbox" id="switch" name="status" value="1">
                                                <label for="switch">
                                                <span class="switch-x-text">Status is </span>
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
                                <div class="tab-pane fade border p-3 " id="image" role="tabpanel" aria-labelledby="image-tab">
                                    <div id="preview-container"></div>
    
                                    <div class="row g-3" style="margin-top: -6px;">
                                        <div class="col-md-12">
                                            <input type="file" id="file-input" name="image[]" multiple class="form-control @error('image') is-invalid @enderror">
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
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-end" style="margin-bottom: 14px;">Save</button>
                        </div>
                    </form>    
            </div> --}}
           
        </div>
    </section>
</div>
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function () {
              $('#categorySelect').change(function () {
                  var categoryId = $(this).val();
                  if (categoryId) {
                      $('#brandSelect').prop('disabled', false);
                    //   $('#SizeCheck').prop('disabled', false);
                  } else {
                      $('#brandSelect').prop('disabled', true);
                    //   $('#SizeCheck').prop('disabled', true);
                  }
              });
  
              
          });
  </script> --}}
  <script>
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
                        subcategorySelect.appendChild(option);
                    });
                    subcategorySelect.disabled = false;
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>
@endpush
