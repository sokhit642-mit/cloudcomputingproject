<div>
    <div class="container-small cart">
        <nav class="mb-3" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item fw-normal"><a href="#!">@lang('wishlist.home')</a></li>
            <li class="breadcrumb-item fw-normal"><a href="#!">@lang('wishlist.wishlist')</a></li>
            
          </ol>
        </nav>
        <h2 class="mb-5 fw-normal">@lang('wishlist.wishlist')<span class="text-body-tertiary fw-normal ms-2">(<livewire:fronted.wishlist-count />)</span></h2>
        <div class="border-y border-translucent" >
          <div class="table-responsive scrollbar">
            <table class="table fs-9 mb-0">
              <thead>
                <tr>
                  <th class="sort white-space-nowrap align-middle fs-10" scope="col" style="width:7%;"></th>
                  <th class="sort white-space-nowrap align-middle" scope="col" style="width:30%; min-width:250px;" data-sort="products">@lang('wishlist.products')</th>
                  <th class="sort align-middle desc" scope="col" data-sort="color" style="width:16%;">@lang('wishlist.category')</th>
             
                  <th class="sort align-middle text-end" scope="col" data-sort="price" style="width:10%;">@lang('wishlist.prices')</th>
                  <th class="sort align-middle text-end pe-0" scope="col" style="width:35%;"> </th>
                </tr>
              </thead>
               
                    
                        <tbody class="list" id="profile-wishlist-table-body">
                            @forelse ($wishlist as $wistlistItem)
                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                    @if ($wistlistItem->product)
                                        <td class="align-middle white-space-nowrap ps-0 py-0"><a class="border border-translucent rounded-2 d-inline-block" href="{{ url('/collections/'.$wistlistItem->product->category->slug.'/'.$wistlistItem->product->slug) }}"><img src="{{ $wistlistItem->product->productImages[0]->image }}" alt="" width="53" class=" rounded-3"></a></td>
                                        <td class="products align-middle pe-11"><a class="fw-semibold mb-0 line-clamp-1" href="{{ url('/collections/'.$wistlistItem->product->category->slug.'/'.$wistlistItem->product->slug) }}">{{ $wistlistItem->product->name }}</a></td>
                                        <td class="color align-middle white-space-nowrap fs-9 text-body">{{$wistlistItem->product->category->name}}</td>

                                        <td class="price align-middle text-body fs-9 fw-semibold text-end">${{$wistlistItem->product->selling_price}}.00</td>
                                        <td class="total align-middle fw-bold text-body-highlight text-end text-nowrap pe-0">
                                            <button type="button" wire:click='removeWishlistItem({{$wistlistItem->id}})' class="btn fw-normal btn-danger fs-10">
                                                <span wire:loading.remove wire:target='removeWishlistItem({{$wistlistItem->id}})'>
                                                    <i class="fa fa-trash"></i> @lang('wishlist.remove')

                                                </span>
                                                <span wire:loading wire:target='removeWishlistItem({{$wistlistItem->id}})'>
                                                  @lang('wishlist.removeing...')
                                                </span>
                                            </button>
                                            {{-- <button class="btn btn-primary fw-normal fs-10">
                                                <svg class="svg-inline--fa fa-cart-shopping me-1 fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-shopping" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path>
                                                </svg> @lang('wishlist.add to cart')
                                            </button> --}}
                                        </td>
                                
                                    @endif
                                </tr>
                            @empty
                                <tr class="text-center" >
                                    <td colspan="8" style="color: rgb(255, 0, 0);">@lang('order.no_items')</td>
                                </tr>
                            @endforelse
                        </tbody>
                    
                            
                
            </table>
          </div>
          
        </div>
      </div>
</div>
