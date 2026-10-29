{{-- Brand store --}}
<div wire:ignore.self class="modal fade"   id="BrandModal" tabindex="-1" data-bs-backdrop="static" style="display: none;" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('admin_dash.add_brand')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"  wire:click='closeModal' aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand()" id="myForm" enctype="multipart/form-data">
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
                              <label for="floatingName">@lang('admin_dash.brand_name')</label>
                              @error('name') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_b_name')</span> @enderror
                            </div>
                          </div>
                         
                          <div class="col-md-12">
                            <div class="form-floating">
                              <input type="text" wire:model='slug' class="form-control " id="floatingName" placeholder="">
                              <label for="floatingName">@lang('admin_dash.brand_slug')</label>
                              @error('slug') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_b_slug')</span> @enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <input type="file" name="image" wire:model='image' class="form-control">
                            @error('image') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_b_image')</span> @enderror
                            <div class="d-flex">
                              
                              
                            </div>
                            @if ($image)
                            
                            <img src="{{ $image->temporaryUrl() }}" width="30%" class=" border mt-2" style="border-radius: 8px;">
                            @endif
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
            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-box-arrow-in-down"></i> Save</button>
          </div>
        </form>
        
      </div>
    </div>
</div>

{{-- Brand Edit --}}
<div wire:ignore.self class="modal fade"  id="BrandEditModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('admin_dash.edit_brand')</h5>
        <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateBrand()">
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
                            <label for="floatingName">@lang('admin_dash.brand_name')</label>
                            @error('name') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_b_name')</span> @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-12">
                          <div class="form-floating">
                            <input type="text" wire:model='slug' class="form-control" id="floatingName" placeholder="">
                            <label for="floatingName">@lang('admin_dash.brand_slug')</label>
                            @error('slug') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_b_slug')</span> @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <input type="file" name="image" wire:model='image' class="form-control">
                          @error('image') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_b_image')</span> @enderror
                          @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" width="30%" class=" border mt-2" style="border-radius: 8px;">
                          @elseif ($currentImage)
                            <img src="{{ Storage::url($currentImage) }}" alt="Current Image"  width="30%"  class=" border mt-2" style="border-radius: 8px;">
                          @endif
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


