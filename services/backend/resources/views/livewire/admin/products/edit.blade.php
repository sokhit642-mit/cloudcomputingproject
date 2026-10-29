<div>
    <section class="section dashboard">
        <div class="pagetitle">
            <div class="row" style="float: right;margin-top: 2px;">
                {{-- <nav>
                    <a href="{{ url('admin/category/create') }}" type="button" data-bs-original-title="Add New Category" data-bs-toggle="tooltip" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
                </nav> --}}
            </div>
            <h1>Add Products</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item">Edit</li>
               
                
              </ol>
              
            </nav>
            <form id="myForm" action="{{ url('admin/products/'.$products->id) }}"  method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
               
                <div class="row gy-4">
                    <div class="col-xl-9">
                        <div class="card p-4">
                        <div  class="php-email-form ">
                            <div class="row gy-4">
            
                            
            
                            <div class="col-md-6 position-relative">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" value="{{ $products->name }}"  id="validationTooltipUsername"  value="{{ old('name') }}" name="name" placeholder="Product Name" class="form-control @error('name') is-invalid" @enderror">
                                    <div class="invalid-tooltip">
                                        Please enter Product name.
                                    </div>
                                    {{-- @error('name')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror  --}}
                                    
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputName5" class="form-label">Product Slug</label>
                                <input type="text" value="{{ $products->slug }}"  value="{{ old('slug') }}" name="slug" placeholder="Product Slug" class="form-control @error('slug') is-invalid" @enderror">
                                <div class="invalid-tooltip" >
                                    Please enter Product slug.
                                </div>
                                {{-- @error('slug')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror  --}}
                            </div>
                            <div class="col-md-12 position-relative">
                               
                                   
                                
                                <label for="inputName5" class="form-label">Description</label>
                                <textarea name="description"  placeholder="Description" class="form-control @error('description') is-invalid" @enderror" id="" cols="30" rows="4">{{old('description')}} {{ $products->description }}</textarea>
                                <div class="invalid-tooltip">
                                    Please enter Product Description.
                                </div>
                                {{-- @error('description')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror  --}}
                            </div>
            
                            
                            </div>
                        </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Product Category | Brand</div>
                            <div class="card-body">
                                <div  class="php-email-form pt-3">
                                    <div class="row gy-4">
                                        <div class="col-md-4 position-relative">
                                            
                                            <div>
                                                <label for="categorySelect" class="form-label">Select Category</label>
                                                <select id="categorySelect" name="category_id"  class="form-select @error('category_id') is-invalid" @enderror">
                                                    
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected':''}}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4 position-relative">
                                            <label for="inputName5" class="form-label">Sub-Category</label>
                                            <select name="subcategory"  class="form-select @error('subcategory') is-invalid" @enderror">
                                                            
                                                @foreach ($subcategory as $subcategory)
                                                <option hidden value="">Choose Sub category</option>   
                                                <option value="{{ $subcategory->name }}" {{ $subcategory->name == $products->subcategory ? 'selected':''}}>{{ $subcategory->name }}</option>   
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose product sub-category.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputName5" class="form-label">Brand</label>
                                            <select name="brand"  class="form-select @error('brand') is-invalid" @enderror">
                                                @foreach ($brands as $brand)
                                            <option hidden value="">Choose brand</option>   
                                            <option value="{{ $brand->name }}" {{ $brand->name == $products->brand ? 'selected':''}}>{{ $brand->name }} ({{$brand->category->name}})</option>   
                                            @endforeach
                                                {{-- @error('brand')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror  --}}
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose product brand.
                                            </div>
                                        </div>
                                        <col-md-4>
                                        
                                        
                                        
                                        
                                        </col-md-4>
                                    </div>
                                    <select id="categorySelect" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                        <option hidden value="">Choose category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    <select id="brandSelect" name="brand"  class="form-select @error('brand') is-invalid @enderror" disabled>
                                        <option hidden value="">Choose brand</option>
                                        @foreach ($brands as $brand)
                                        <div data-brand="{{ $brand->category_id }}">
                                            <option value="{{ $brand->id }}" data-category-id="{{ $brand->category_id }}">{{ $brand->name }}</option>
                                        </div>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card" style="margin-top: -16px;">
                            
                            <div class="card-header">Images</div>
                            <div class="card-header">
                                <div class="upload" style="margin-top: -15px;">
                                    <div class="upload__box">
                                      <input type="file" name="image[]" class="form-control1" hidden id="form-control1" data-max_length="5" multiple>
                                      <div class="d-grid gap-2 mt-3">
                                        
                                        <label for="form-control1" class="btn btn-primary mb-3">Upload Images (Less then 5.)</label>
                                        
                                      </div>
                                      <label for="inputName5" class="form-label">old images preview</label>
                                        <div>
                                            <div for="image"  class="dropzone">
                                        
                                               
                                                @if ($products->productImages)
                                                <div class="row">
                                                    @foreach ($products->productImages as $image)
                                                    <div class="col-md-2 text-center">
            
                                                        <img src="{{ asset($image->image)}}" alt="Img" class="border" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;border-radius: 6px;" width="130px" height="130px" >
                                                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                                    </div>
                                                        
                                                    @endforeach
                                                </div>
                                                
                                        
                                                @else
                                                    <h5>No Image Added.</h5>
                                                @endif
                                                
                                               
                
                                                
                                            </div>
                                            
            
                                        </div>
                                        <br>
                                        <label for="inputName5" class="form-label">New images preview</label>
                                
                                        <div for="image"  class="dropzone">
                                        
                                            <div class="upload__img-wrap" style="display: flex;">
                                               
                                               
                                            </div>
                                       
                                            
                                           
            
                                            
                                        </div>
                                    </div>
                                </div>
                                
                               
                                
                            </div>
                                
                        </div>
                        <div class="card" style="margin-top: -16px;">
                            <div class="card-header">Pricing</div>
                            <div class="card-body">
                                <br>
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <label for="inputName5" class="form-label">Original Price</label>
                                        <input type="text"  value="{{ $products->original_price }}" placeholder="Original Price"  name="original_price" class="form-control @error('original_price') is-invalid" @enderror">
                                        {{-- <div class="invalid-feedback">
                                            Please enter Product Original price.
                                        </div> --}}
                                        @error('original_price')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror 
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="inputName5" class="form-label">Selling Price</label>
                                        <input type="text" value="{{ $products->selling_price }}"  placeholder="Selling Price" name="selling_price" class="form-control @error('selling_price') is-invalid" @enderror">
                                        {{-- <div class="invalid-feedback">
                                            Please enter Product Selling price.
                                        </div> --}}
                                        @error('selling_price')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror 
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Quantity</label>
                                        <input type="number" value="{{ $products->quantity }}" placeholder="Product Quantity"  name="quantity" class="form-control  @error('quantity') is-invalid" @enderror">
                                        {{-- <div class="invalid-feedback">
                                            Please enter Product quantity.
                                        </div> --}}
                                        @error('quantity')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror 
                                    </div>
                                   
                                </div>
                                
                            </div>
                                
                        </div>
                        
                        
                    </div>
                    <div class="col-xl-3">
            
                        <div class="row">
                            <div class="card">
                                {{-- <img src="assets/img/card.jpg" class="card-img-top" alt="..."> --}}
                                <div class="card-header">
                                    Product Trending
                                </div>
                                <div class="card-body border">
                                <div class="row g-3" style="margin-top: 8px;">
                                    <div class="col-md-12">
                                        <div class="checkbox-wrapper-35">
                                            <input class="switch2"  type="checkbox" id="switch2" {{ $products->trending == '1' ? 'checked':'' }} name="trending" value="1">
                                            <label for="switch2">
                                            <span class="switch2-x-text">Trending is </span>
                                            <span class="switch2-x-toggletext">
                                                <span class="switch2-x-unchecked"><span class="switch2-x-hiddenlabel">Unchecked: </span><span class="badge rounded-pill bg-success"><i class="bi bi-check-circle "></i> Trending</span></span>
                                                <span class="switch2-x-checked"><span class="switch2-x-hiddenlabel">Checked: </span><span class="badge rounded-pill bg-warning"><i class="bi bi-exclamation-circle"></i> Not-Trending</span></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                
                                </div>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                            <div class="card" style="margin-top: -16px;">
                                {{-- <img src="assets/img/card.jpg" class="card-img-top" alt="..."> --}}
                                <div class="card-header">
                                    Product Status
                                </div>
            
                                <div class="card-body border">
                                <div class="row g-3" style="margin-top: 8px;">
                                    
                                    <div class="col-md-12">
                                        <div class="checkbox-wrapper-35">
                                            {{-- <label for="inputName5" class="form-label">Product Status</label> --}}
                                            <input class="switch"  type="checkbox" id="switch" {{ $products->status == '1' ? 'checked':'' }} name="status" value="1">
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
                                <div class="card-footer"></div>
                            </div>
                            <div class="card" style="margin-top: -16px;">
                                <div class="card-header">
                                    Colors
                                </div>
                                <div class="card-body border">
                                    <br>
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <div class="">
                        
                                            <div class="gap-6 p-1">
                                                @forelse ($colors as $colorItem)
                                                
                                                    <input class="form-check-input" name="colors[{{ $colorItem->id }}]" value="{{ $colorItem->id }}" type="checkbox">
                                                    <label class="form-check-label">
                                                        {{-- {{ $colorItem->name }}  --}}
                                                        <input type="color" disabled value="{{ $colorItem->code }}"> 
                                                    </label>
                                                    {{-- <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off">
                                                    <label class="btn btn-{{ $colorItem->code }}" for="btn-check">{{ $colorItem->name }} </label> --}}
                
                                                @empty
                                                    <h4>No Colors.</h4>
                                                @endforelse
                                            </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive p-2">
                                            <table class="table table-hover  table-sm table-striped border" style="border-radius: 25px;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Color</th>
                                                        <th class="text-center">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($products->productColors as $prodColor)
                                                        
                                                        <tr>
                                                            <td style="vertical-align: middle;" class="text-center">{{ $prodColor->id }}</td>
                                                            <td style="vertical-align: middle;" class="text-center"><input type="color" class=" mt-1" style="width:100px;height:35px" disabled value="{{ $prodColor->color->code }}"> </td>
                                                            <td style="vertical-align: middle;" class="text-center"><a href="{{ url('admin/product-color/'.$prodColor->id.'/delete') }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                                                        </tr>
                                                    @empty
                                                        <tr class="text-center" >
                                                            <td colspan="5">No Color Select.</td>
                                                        </tr>
                                                       
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer"></div>
                            </div>
                            <div class="card" style="margin-top: -16px;">
                                <div class="card-header ">Sizes</div>
                                <div class="card-body border">
                                    <br>
                                    
                                    <div class="row gy-4">
                                        <div class="container">
                                        
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div id="sizeContainer" class="d-flex flex-wrap">
                                                        @forelse ($sizes as $sizeItem)
                                                            <div class=" size-item" style="padding: 1px" data-category="{{ $sizeItem->category_id }}">
                                                                <input type="checkbox" class="btn-check" name="sizes[{{ $sizeItem->id }}]" value="{{ $sizeItem->id }}" id="{{ $sizeItem->name }}" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="{{ $sizeItem->name }}">{{ $sizeItem->name }}</label>
                                                            </div>
                                                        @empty
                                                            <h4>No Sizes.</h4>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="">
                                                <div class="" id="sizeCheckboxes">
                                                    @forelse ($sizes as $sizeItem)
                                                        <div class="size-checkbox" data-category-id="{{ $sizeItem->category_id }}">
                                                            <input type="checkbox" class="btn-check" name="sizes[]" value="{{ $sizeItem->id }}" id="size_{{ $sizeItem->id }}" autocomplete="off">
                                                            <label class="btn btn-outline-primary" for="size_{{ $sizeItem->id }}">{{ $sizeItem->name }}</label>
                                                        </div>
                                                    @empty
                                                        <h4>No Sizes.</h4>
                                                    @endforelse
                                                <div class="invalid-feedback">
                                                    Please choose product category.
                                                </div>
                                            
                                                <div class="gap-6" id="sizeCheckboxes">
                                                
                                                    @forelse ($sizes as $sizeItem)
                                                    <div class="size-checkbox p-2" data-category-id="{{ $sizeItem->category_id }}">
                                                        <input type="checkbox" class="btn-check size-checkbox" name="sizes[]" value="{{ $sizeItem->id }}" id="size_{{ $sizeItem->id }}" autocomplete="off">
                                                        <label class="btn btn-outline-primary mt-1" for="size_{{ $sizeItem->id }}">{{ $sizeItem->name }}</label>
                                                    </div>
                                                   
                                                                                                
                                                    @empty
                                                        <h4>No Sizes.</h4> 
                                                    @endforelse
    
                                            
                                                </div>
                                            
                                            </div>
                                        </div> --}}
                                        <div class="table-responsive p-2">
                                            <table class="table table-hover table-bordered table-sm table-striped border" style="border-radius: 25px;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Size</th>
                                                        <th class="text-center">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($products->productSizes as $prodSize)
                                                        
                                                        <tr>
                                                            <td style="vertical-align: middle;" class="text-center">{{ $prodSize->id }}</td>
                                                            <td style="vertical-align: middle;" class="text-center">
                                                                <input type="checkbox" disabled class="btn-check" autocomplete="off">
                                                                <label class="btn btn-primary mt-1">{{ $prodSize->size->name }}</label>
                                                                {{-- <input type="text" class=" mt-1" style="width:100px;height:35px" disabled value="{{ $prodSize->size->name }}">  --}}
                                                            </td>
                                                            <td style="vertical-align: middle;" class="text-center"><a href="{{ url('admin/product-size/'.$prodSize->id.'/delete') }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                                                        </tr>
                                                    @empty
                                                        <tr class="text-center" >
                                                            <td colspan="5">No Sizes Select.</td>
                                                        </tr>
                                                       
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                        
                </div>
                
                
                <br>
                </div>
                <div class="text-center">
                    <a type="button"  class="btn btn-warning" href="{{ url('admin/products') }}" style="margin-top: -16px;">
                        <i class="bi bi-box-arrow-in-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary" style="margin-top: -16px;"><i class="bi bi-save"></i> Save</button>
    
                
                </div>
            </form>
            <br>
            <br>
            
           
          </div>
    </section>
</div>