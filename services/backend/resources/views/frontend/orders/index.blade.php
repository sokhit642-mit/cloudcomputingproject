@extends('layouts.app')
@section('title','Orders')

@section('content')

{{--
<livewire:fronted.wishlist-show /> --}}
<div>
    <div class="container-small cart">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fw-normal"><a href="#!">@lang('home.home_menu')</a></li>
                <li class="breadcrumb-item fw-normal"><a href="#!">@lang('order.order')</a></li>

            </ol>
        </nav>
        <h2 class="mb-5 fw-normal">@lang('order.myorder')<span class="text-body-tertiary fw-normal ms-2"></span></h2>
        <div class="border-y border-translucent">
            <div class="table-responsive scrollbar">
                <table class="table fs-9 mb-0">
                    <thead>
                        <tr>
                            <th class="sort white-space-nowrap text-center align-middle" scope="col">@lang('order.orderid')</th>
                            <th class="sort white-space-nowrap align-middle" scope="col" data-sort="products">
                                @lang('order.tracking_no')
                            </th>
                            <th class="sort white-space-nowrap align-middle" scope="col" data-sort="products">@lang('order.full_name')
                            </th>
                            <th class="sort align-middle desc" scope="col" data-sort="color">@lang('order.payment_mode')</th>
                            <th class="sort align-middle desc" scope="col" data-sort="color">@lang('order.order_date')</th>
                            <th class="sort align-middle desc" scope="col" data-sort="color">@lang('order.status_message')</th>
                            <th class="sort align-middle text-center pe-0" scope="col">@lang('order.action')</th>
                        </tr>
                    </thead>


                    <tbody class="list" id="profile-wishlist-table-body">
                        @forelse ($orders as $order)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="text-center align-middle">{{$order->id}}</td>
                            <td class="align-middle">{{$order->tracking_no}}</td>
                            <td class="align-middle">{{$order->fullname}}</td>
                            <td class="align-middle">{{$order->payment_mode}}</td>
                            <td class="align-middle">{{$order->created_at->format('d-m-Y')}}</td>
                            <td class="align-middle">
                                @if ($order->status_message)
                                    @php
                                        $statusClass = '';
                                        switch ($order->status_message) {
                                            case 'in-progress':
                                                $statusClass = 'badge-phoenix-warning'; // yellow color for in-progress
                                                break;
                                            case 'completed':
                                                $statusClass = 'badge-phoenix-success'; // green color for completed
                                                break;
                                            case 'pending':
                                                $statusClass = 'badge-phoenix-info'; // blue color for pending
                                                break;
                                            case 'out-for-delivery':
                                                $statusClass = 'badge-phoenix-primary'; // primary color for out-for-delivery
                                                break;
                                            default:
                                                $statusClass = 'badge-phoenix-secondary'; // grey color for unknown status
                                                break;
                                        }
                                    @endphp
                                @else
                                    @php $statusClass = 'bg-light'; @endphp <!-- Light background if no status -->
                                @endif
                                <div class="badge badge-phoenix px-2 {{ $statusClass }}">
                                    {{ $order->status_message ?? 'No Status Available' }}
                                </div>
                                {{-- {{$order->status_message}} --}}
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ url('orders/'.$order->id) }}"
                                    class="btn btn-primary fw-normal btn-sm">@lang('order.view')</a>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="7" style="color: rgb(255, 0, 0);">@lang('order.no_items')</td>
                        </tr>
                        @endforelse
                    </tbody>



                </table>
                <div class="mt-2 float-end">
                    {{$orders->links()}}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection