{{-- create subcategory --}}
<div wire:ignore.self class="modal fade"data-bs-backdrop="static" id="SubCategoryModal" tabindex="-1" style="display: none;" aria-hidden="true" >
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('admin_dash.add_sub_category')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"  wire:click='closeModal' aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeSubCategory()" id="myForm" class="needs-validated">
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
                              <label for="floatingName">@lang('admin_dash.sub_category_name')</label>
                              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <select name="category_id" wire:model='category_id'  class="form-select">
                                                
                                @foreach ($categories as $category)
                                <option hidden value="">@lang('admin_dash.choose_category')</option>   
                                <option value="{{ $category->id }}">{{ $category->name }}</option>   
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          
                        
                          <div class="col-md-12">
                            <div class="form-floating">
                              <input type="text" wire:model='slug' class="form-control" id="floatingName" placeholder="">
                              <label for="floatingName">@lang('admin_dash.sub_category_slug')</label>
                              @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
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
            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-floppy me-2"></i>@lang('admin_dash.save')</button>
          </div>
        </form>
        
      </div>
    </div>
</div>
{{-- Edit subcategory --}}
<div wire:ignore.self class="modal fade" data-bs-backdrop="static"  id="EditSubCategoryModal" tabindex="-1" style="display: none;" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('admin_dash.add_sub_category')</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"  wire:click='closeModal' aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateSubcategory()" id="myForm" class="needs-validated">
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
                            <label for="floatingName">@lang('admin_dash.sub_category_name')</label>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <select name="category_id" wire:model='category_id'  class="form-select">
                                              
                              @foreach ($categories as $category)
                              <option hidden value="">@lang('admin_dash.choose_category')</option>   
                              <option value="{{ $category->id }}">{{ $category->name }}</option>   
                              @endforeach
                          </select>
                          @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                      
                        <div class="col-md-12">
                          <div class="form-floating">
                            <input type="text" wire:model='slug' class="form-control" id="floatingName" placeholder="">
                            <label for="floatingName">@lang('admin_dash.sub_category_slug')</label>
                            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
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
          <button type="submit" class="btn btn-primary float-end"><i class="bi bi-floppy me-2"></i>@lang('admin_dash.save')</button>
        </div>
      </form>
      
    </div>
  </div>
</div>