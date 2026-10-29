{{-- Brand store --}}
<div wire:ignore.self class="modal fade"   id="ColorModal" tabindex="-1" data-bs-backdrop="static" style="display: none;" aria-hidden="true" >
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('admin_dash.add_color')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"  wire:click='closeModal' aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeColor()" id="myForm">
          @csrf
          <div class="modal-body">
          
              <section class="section">
                  <div class="row">
                  <div class="col-lg-12">
                      <div class="card-body">
                        <div class="row g-3">
                          
                          <div class="col-md-12">
                            <div class="form-floating">
                              <input type="text" wire:model='name' class="form-control  @error('name')  is-invalid @enderror" id="floatingName" placeholder="">
                              <label for="floatingName">@lang('admin_dash.color_name')</label>
                              @error('name') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_c_name')</span> @enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label  class="form-label">@lang('admin_dash.color')</label>
                            <input type="color" style="height: 50px;width:80px;" wire:model='code' class="form-control form-control-color @error('code')  is-invalid @enderror"" id="floatingName" placeholder="Color Name">
                            @error('code') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_c_color')</span> @enderror

                            {{-- <div class="form-floating">
                              <input type="color" wire:model='code' class="form-control " id="floatingName" placeholder="Color Name">
                              <label for="floatingName">Color Code</label>
                              @error('code') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_c_name')</span> @enderror
                            </div> --}}
                            
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
<div wire:ignore.self class="modal fade"  id="ColorEditModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('admin_dash.edit_color')</h5>
        <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateColor()">
        @csrf
        <div class="modal-body">
          
          <section class="section">
              <div class="row">
              <div class="col-lg-12">
                  <div class="card-body">
                    <div class="row g-3">
                      
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" wire:model='name' class="form-control  @error('name')  is-invalid @enderror" id="floatingName" placeholder="">
                          <label for="floatingName">@lang('admin_dash.color_name')</label>
                          @error('name') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_c_name')</span> @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label  class="form-label">@lang('admin_dash.color')</label>
                        <input type="color" wire:model='code' style="height: 50px;width:80px;" class="form-control form-control-color  @error('code')  is-invalid @enderror" id="floatingName" placeholder="Color Name">
                         @error('code') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_c_color')</span> @enderror
                        {{-- <div class="form-floating">
                          <input type="color" wire:model='code' class="form-control " id="floatingName" placeholder="Color Name">
                          <label for="floatingName">Color Code</label>
                          @error('code') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_c_name')</span> @enderror
                        </div> --}}
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
          <button type="submit" class="btn btn-primary float-end"><i class="bi bi-box-arrow-in-down me-2"></i> @lang('admin_dash.save')</button>
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
                            @error('name') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_c_name')</span> @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating">
                            <input type="text" wire:model.defer='slug' class="form-control" id="floatingName" placeholder="Your Name">
                            <label for="floatingName">Slug Name</label>
                            @error('slug') <span class="text-danger" style="font-size: 12px;">@lang('admin_dash.validate_c_name')</span> @enderror
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

