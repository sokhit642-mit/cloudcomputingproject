{{-- Brand store --}}
<div wire:ignore.self class="modal fade"   id="SizeModal" tabindex="-1" data-bs-backdrop="static" style="display: none;" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('admin_dash.add_size')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"  wire:click='closeModal' aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeSizes()" id="myForm">
          @csrf
          <div class="modal-body">
          
              <section class="section">
                  <div class="row">
                  <div class="col-lg-12">
                      <div class="card-body">
                        <div class="row g-3">
                          
                          <div class="col-md-12">
                            <div class="form-floating">
                              <input type="text" wire:model='name' class="form-control" id="floatingName" placeholder="">
                              <label for="floatingName">@lang('admin_dash.size_name')</label>
                              @error('name') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_s_name')*</span> @enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                              <input type="text" wire:model='slug' class="form-control" id="floatingName" placeholder="">
                              <label for="floatingName">@lang('admin_dash.size_slug')</label>
                              @error('slug') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_s_slug')*</span> @enderror
                            </div>

                            {{-- <div class="form-floating">
                              <input type="color" wire:model='code' class="form-control " id="floatingName" placeholder="Color Name">
                              <label for="floatingName">Color Code</label>
                              @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> --}}
                          </div>
                          <div class="col-md-12">
                            <select name="category_id" wire:model='category_id'  class="form-select">
                                                
                                @foreach ($categories as $category)
                                <option hidden value="">@lang('admin_dash.choose_category')</option>   
                                <option value="{{ $category->id }}">{{ $category->name }}</option>   
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_s_choose_cat')*</span> @enderror
                          </div>
                          <div class="checkbox-wrapper-35">
                            <input class="switch3"  wire:model='status' type="checkbox" id="switch3" name="switch3" value="1">
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
                  
              </section>
        
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-box-arrow-in-down me-2"></i>Save</button>
          </div>
        </form>
        
      </div>
    </div>
</div>

{{-- Brand Edit --}}
<div wire:ignore.self class="modal fade"  id="sizeEditModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('admin_dash.edit_size')</h5>
        <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateSize()">
        @csrf
        <div class="modal-body">
          
          <section class="section">
              <div class="row">
              <div class="col-lg-12">
                  <div class="card-body">
                    <div class="row g-3">
                      
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" wire:model='name' class="form-control" id="floatingName" placeholder="">
                          <label for="floatingName">@lang('admin_dash.size_name')</label>
                          @error('name') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_s_name')*</span> @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" wire:model='slug' class="form-control" id="floatingName" placeholder="">
                          <label for="floatingName">@lang('admin_dash.size_slug')</label>
                          @error('slug') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_s_slug')*</span> @enderror
                        </div>

                        {{-- <div class="form-floating">
                          <input type="color" wire:model='code' class="form-control " id="floatingName" placeholder="Color Name">
                          <label for="floatingName">Color Code</label>
                          @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> --}}
                      </div>
                      <div class="col-md-12">
                        <select name="category_id" wire:model='category_id'  class="form-select">
                                            
                            @foreach ($categories as $category)
                            <option hidden value="">@lang('admin_dash.choose_size')</option>   
                            <option value="{{ $category->id }}">{{ $category->name }}</option>   
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_s_choose_cat')*</span> @enderror
                      </div>
                      <div class="checkbox-wrapper-35">
                        <input class="switch3"  wire:model='status' type="checkbox" id="switch3" name="switch3" value="1">
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
              
          </section>
    
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary float-end"><i class="bi bi-box-arrow-in-down"></i> Update</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
{{-- view brand --}}
{{-- <div wire:ignore.self class="modal fade"  id="BrandViewModal" tabindex="-1" style="display: none;" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Brand</h5>
        <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="seeBrand()">
        @csrf
        <div class="modal-body">
        
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    
                      
                    <div class="card-body">
                      <div class="row g-3">
                        
                        <div class="col-md-12">
                          <div class="form-floating">
                            <input type="text" wire:model.defer='name' class="form-control" id="floatingName" placeholder="Your Name">
                            <label for="floatingName">Brand Name</label>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating">
                            <input type="text" wire:model.defer='slug' class="form-control" id="floatingName" placeholder="Your Name">
                            <label for="floatingName">Slug Name</label>
                            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        
                        <div class="checkbox-wrapper-35">
                          <input class="form-check-input" wire:ignore.self  wire:model.defer='status' type="checkbox" id="form-check-input" name="form-check-input" value="1">
                          <label for="form-check-input">
                            <span class="form-check-input-x-text">Status is </span>
                            <span class="form-check-input-x-toggletext">
                              <span class="form-check-input-x-unchecked"><span class="form-check-input-x-hiddenlabel">Unchecked: </span>Visible</span>
                              <span class="form-check-input-x-checked"><span class="form-check-input-x-hiddenlabel">Checked: </span>Hildden</span>
                            </span>
                          </label>
                        </div>
                       
                      </div>  
                    
                    </div>
                    </div>
                  
                </div>
                
            </section>
      
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary float-end" data-bs-dismiss="modal">Update</button>
        </div>
      </form>
      
    </div>
  </div>
</div> --}}

