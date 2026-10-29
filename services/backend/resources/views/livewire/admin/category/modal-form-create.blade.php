<div wire:ignore.self class="modal fade" id="ExtralargeModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent='saveCategory' enctype="multipart/form-data">
            @csrf
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="">
                      
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-4">
                    
                                
                                    
                                    
                                    
                                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            
                                        {{-- <img src="{{ asset('admin-assets1\dist\img\insert-image.svg') }}"  alt="..." class="rounded-sm" style="width: 50%"> --}}
                                        
                                        <center><label for="image" id="image-preview">
                                            @if ($image)
                                                
                                                <img  style="width: 50%;" src="{{ $image->temporaryUrl() }}">
                                            @endif
                                            {{-- <img src="https://bit.ly/3ubuq5o" alt="" width="60%">
                                            <div>
                                            <span hidden>+</span>
                                            </div> --}}
                                        </label>
                                        </center>
                                        <br>
                                        
                                        <div class="form-group" style="padding: 2px;">
                                            {{-- <label for="exampleInputFile">File input</label> --}}
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="image"  wire:model.defer='image' name="image" accept="image/*" class="form-control">
                                                    
                                                    {{-- <input type="file" id="image" name="image" multiple class="form-control @error('image') is-invalid" @enderror"> --}}
                                                </div>
                    
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                
                    
                            
                    
                            </div>
                    
                            <div class="col-lg-8">
                                    <br>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" wire:model.defer='name' class="form-control" id="floatingName" placeholder="Your Name">
                                                <label for="floatingName">Category Name</label>
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-floating">
                                            <div class="form-floating">
                                                <input type="text" wire:model.defer='slug' class="form-control" id="floatingName" placeholder="Your Name">
                                                <label for="floatingName">Slug Name</label>
                                                @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                                              </div>
                                        </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-floating">
                                                {{-- <input type="text" wire:model.defer='description' class="form-control" id="floatingName" placeholder="Your Name" style="height: 135px;"> --}}
                                                
                                                <textarea class="form-control" wire:model='description' placeholder="description" id="floatingTextarea" style="height: 135px;"></textarea>
                                                <label for="floatingName">Description</label>
                                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                                {{-- <input type="text" wire:model.defer='description' class="form-control" id="floatingName" placeholder="Your Name"> --}}
                                                
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="checkbox-wrapper-35">
                                                <input class="switch"  wire:model.defer='status' type="checkbox" id="switch" name="switch" value="1">
                                                <label for="switch">
                                                  <span class="switch-x-text">Status is </span>
                                                  <span class="switch-x-toggletext">
                                                    <span class="switch-x-unchecked"><span class="switch-x-hiddenlabel">Unchecked: </span>Visible</span>
                                                    <span class="switch-x-checked"><span class="switch-x-hiddenlabel">Checked: </span>Hildden</span>
                                                  </span>
                                                </label>
                                              </div>
                                        </div>
                                        </div>
                                        
                                        
                                  
                                {{-- <div style="float: right;">
                                    <a href="{{ url('admin/category') }}" type="button" data-bs-original-title="All Category" data-bs-toggle="tooltip" class="btn btn-warning"><i class="bi bi-box-arrow-in-left"></i></a>
                                    <button type="submit" class="btn btn-primary" data-bs-original-title="Save Category" data-bs-toggle="tooltip"><i class="bi bi-floppy me-2"></i> Save</button>
                                    
                                </div> --}}
                                </div>
                                
                                
                    
                            
                    
                            </div>
                            </div>

                    </div>
                    </div>
        
                
        
                </div>
        
                
                </div>
            </section>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary float-end" data-bs-dismiss="modal">Save</button>
            </div>
        
        </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>