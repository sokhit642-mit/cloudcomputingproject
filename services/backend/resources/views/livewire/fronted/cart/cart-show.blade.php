<div>
    <div class="container-small cart">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fw-normal"><a href="#!">@lang('cart.home')</a></li>
                <li class="breadcrumb-item fw-normal"><a href="#!">@lang('cart.cart')</a></li>
                {{-- <li class="breadcrumb-item active fw-normal" aria-current="page">Default</li> --}}
            </ol>
        </nav>
        @if (Session::has('alertMessage'))
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener("mouseenter", Swal.stopTimer);
                            toast.addEventListener("mouseleave", Swal.resumeTimer);
                        },
                        customClass: {
                            popup: 'swal-toast-popup',
                            title: 'swal-toast-title'
                        }
                    });

                    Toast.fire({
                        icon: "success",
                        title: @json(Session::get('alertMessage'))
                    });
                });
            </script>
        @endif

        <h2 class="mb-6 fw-medium">@lang('cart.cart')</h2>
        <div class="row g-5">
            <div class="col-12 col-lg-8">
                <div id="cartTable"
                    data-list="{&quot;valueNames&quot;:[&quot;products&quot;,&quot;color&quot;,&quot;size&quot;,&quot;price&quot;,&quot;quantity&quot;,&quot;total&quot;],&quot;page&quot;:10}">
                    <div class="table-responsive scrollbar mx-n1 px-1">
                        <table class="table fs-9 mb-0 border-top border-translucent">
                            <thead>
                                <tr>
                                    <th class="sort white-space-nowrap align-middle fs-10" scope="col"></th>
                                    <th class="sort white-space-nowrap align-middle" scope="col"
                                        style="min-width:250px;">@lang('cart.product')</th>
                                    <th class="sort align-middle" scope="col" style="width:80px;">@lang('cart.color')</th>
                                    <th class="sort align-middle" scope="col" style="width:150px;">@lang('cart.size')</th>
                                    <th class="sort align-middle text-end" scope="col" style="width:300px;">@lang('cart.price')</th>
                                    <th class="sort align-middle ps-5" scope="col" style="width:200px;">@lang('cart.quantity')</th>
                                    <th class="sort align-middle text-end" scope="col" style="width:250px;">@lang('cart.total')</th>
                                    <th class="sort text-end align-middle pe-0" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list" id="cart-table-body">
                                @forelse ($cart as $cartItem)
                                @if ($cartItem->product)
                                <tr class="cart-table-row btn-reveal-trigger">
                                    <td class="align-middle white-space-nowrap py-0">
                                        <a class="d-block border border-translucent rounded-2" href="{{ url('/collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                            @if ( $cartItem->product->productImages)
                                                <img src="{{ $cartItem->product->productImages[0]->image }}" alt="" width="53" class=" rounded-3">  
                                            @else
                                                <img src="" alt="" width="53" class=" rounded-3">  
                                            @endif
                                        </a>
                                    </td>
                                    <td class="products align-middle">
                                        <a class="fw-semibold mb-0 line-clamp-2" href="{{ url('/collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">{{ $cartItem->product->name }}</a>
                                    </td>
                                    <td class="color align-middle white-space-nowrap fs-9 text-body">
                                        @if ($cartItem->productColor)
                                            {{-- {{ $cartItem->ProductColor->id}} --}}
                                            <input type="color" value="{{$cartItem->ProductColor->color->code}}" disabled>
                                        @else
                                         <div class="color white-space-nowrap text-body-tertiary fs-9 fw-semibold">@lang('cart.noColor')</div>
                                        @endif
                                    </td>
                                    <td class="size align-middle white-space-nowrap text-body-tertiary fs-9 fw-semibold">
                                        @if ($cartItem->productSize)
                                            {{$cartItem->ProductSize->size->name}}
                                        @else
                                            <div class="size white-space-nowrap text-body-tertiary fs-9 fw-semibold">@lang('cart.noSize')</div>
                                        @endif
                                    </td>
                                    <td class="price align-middle text-body fs-9 fw-semibold text-end">
                                        ${{ number_format($cartItem->product->discounted_price, 2) }}
                                    </td>
                                    <td class="quantity align-middle fs-8 ps-5">
                                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                                            <button type="button" wire:loading.attr='disable' wire:click='decrementQuantity({{$cartItem->id}})' class="btn btn-sm px-2">-</button>
                                            <input class="form-control text-center input-spin-none bg-transparent border-0 px-0" type="number" readonly min="1" value="{{ $cartItem->quantity }}" aria-label="Amount (to the nearest dollar)">
                                            <button type="button" wire:loading.attr='disable' wire:click='incrementQuantity({{$cartItem->id}})' class="btn btn-sm px-2">+</button>
                                        </div>
                                    </td>
                                    <td class="total align-middle fw-bold text-body-highlight text-end">
                                        ${{$cartItem->product->discounted_price * $cartItem->quantity}}.00
                                        @php
                                            $totalProductAmount += $cartItem->product->discounted_price * $cartItem->quantity
                                        @endphp
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-3">
                                        <button type="button" wire:click='removeCartItem({{$cartItem->id}})'
                                            class="btn btn-sm text-body-tertiary text-opacity-85 text-body-tertiary-hover me-2">
                                            <svg
                                                class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="trash" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                </path>
                                            </svg>
                                            <!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com -->
                                        </button>
                                    </td>
                                </tr>
                                @endif

                                @empty
                                <tr class="text-center">
                                    <td colspan="8" style="color: rgb(255, 0, 0);">@lang('cart.no item add')!!!</td>
                                </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="alert alert-subtle-warning alert-dismissible fade show" role="alert">
                    <strong class=" mb-2"><i class="bi bi-pen-fill me-2"></i>@lang('cart.note')</strong>
                    <p class=" fs-9 mb-1 mt-0">@lang('cart.Be sure to check the product quantity carefully before purchasing and use the discount coupon.')</p>
                    {{-- <p class=" fs-9 mb-1 mt-0">- ត្រូវតែបញ្ចូលលេខទូរស័ព្ទដែលប្រើប្រាស់ Telegram ដើម្បីទទួលបានការជូនដំណឹងយ៉ាងឆាប់រហ័ស</p>
                    <p class=" fs-9 mb-1 mt-0">- Email ជា​ Email ដែលកំពុងប្រើប្រាស់</p>
                    <p class=" fs-9 mb-1 mt-0">- អាស័យដ្ឋានជាអាស័យដ្ឋានពិតប្រាកដ</p> --}}
                    

                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-3">
                            <h3 class="card-title mb-0 fw-medium">@lang('cart.summary')</h3><a class="btn btn-link p-0" href="#!"></a>
                        </div>
                        <div class="d-flex justify-content-between border-y border-dashed py-3 mb-3">
                            <div class="input-group">
                               
                                <!-- Coupon Code Input -->
                                <input class="form-control" type="text" wire:model.defer="couponCode" placeholder="@lang('cart.enter_coupon_code')">
                                <a  class="btn btn-phoenix-primary px-5" wire:click="applyCoupon">@lang('cart.apply_coupon')</a>
                            </div>
                        </div>
                    
                        <div class="border-dashed border-bottom border-translucent mt-4">
                            
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="text-body fw-normal">@lang('checkout.discount') : </h5>
                                <h5 class="text-danger fw-normal">-${{ number_format($discount, 2) }}</h5>
                            </div>
                           
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="text-body fw-normal">@lang('checkout.subtotal') : </h5>
                                <h5 class="text-body fw-normal">${{ number_format($totalProductAmount - $discount, 2) }}</h5>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                
                            </div>
                        </div>
                        {{-- <div>
                            
                            <div class="d-flex justify-content-between">
                                <p class="text-body fw-normal">@lang('cart.discount') :</p>
                                <p class="text-danger fw-normal">$0.00</p>
                            </div>
                         
                            <div class="d-flex justify-content-between">
                                <p class="text-body fw-normal">@lang('cart.subtotal') :</p>
                                <p class="text-body-emphasis fw-normal">${{$totalProductAmount}}</p>
                            </div>
                           
                        </div> --}}
                       
                        <div class="d-flex justify-content-between border-y border-dashed py-3 mb-4">
                            <h4 class="mb-0">@lang('cart.total') :</h4>
                            <h4 class="mb-">${{ number_format($totalProductAmount - $discount, 2) }}</h4>
                        </div>
                        <a href="{{ url('/checkout') }}" class="btn btn-primary w-100">(${{ number_format($totalProductAmount - $discount, 2) }}) @lang('cart.checkout')<svg
                                class="svg-inline--fa fa-chevron-right ms-1 fs-10" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="chevron-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                </path>
                            </svg>
                            <!-- <span class="fas fa-chevron-right ms-1 fs-10"></span> Font Awesome fontawesome.com --></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('alertMessage', event => {
        toastr[event.detail.type](event.detail.message); // 'success' or 'error'
    });

    </script>
@endpush