<div>
    <div>
        <div class="container-small cart">
            <nav class="mb-3" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item fw-normal"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item fw-normal"><a href="#!">Order</a></li>
    
                </ol>
            </nav>
            {{-- <livewire:admin-notifications /> --}}

            @if(session()->has('order_message'))
                <div class="alert alert-success">
                    {{ session('order_message') }}
                </div>
            @endif
    
        {{-- <button wire:click="$emit('orderCreated', ['id' => 123])">Test Event</button>

            <div>
                <button onclick="testOrderEvent()">Test Order Event</button>
            </div>
            
            <script>
                function testOrderEvent() {
                    // Emit the orderCreated event with a dummy order ID (e.g., 123)
                    @this.emit('orderCreated', { id: 123 });
                }
            </script> --}}
            
            {{-- @if(session()->has('order_message'))
            <script>
                Swal.fire({
               title: "Admin dashboard",
               text: "{{ Session('order_message')}}",
               imageUrl: "{{ asset('admin-assets/assets/img/welcome.jpg') }}",
               imageWidth: 300,
               imageHeight: 200,
               imageAlt: "Custom image"
               
             });
           </script>
            @endif --}}
            
            @if (session('order_message'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3500",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
    
                        toastr.success(@json(session('order_message')));
    
                        // Reload the page after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 4000); // Adjust the delay time as needed (in milliseconds)
                    });
                </script>
            @endif
    
            {{-- <h2 class="mb-5 fw-normal">My Orders<span class="text-body-tertiary fw-normal ms-2"></span></h2> --}}
            <div class="card">
                <div class="card-header">
                    <form action="" method="GET">
                    
                        <div class="row gap-6 gap-md-0 g-md-6">
                            <div class="col-md-6">
                                <label>Filter by Date</label>
                                <input type="date" name="date" value="{{ request()->date }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Filter by Status</label>
                                <div class="d-flex">
                                    <select name="status" class="form-select me-2">
                                        <option value="">Select Status</option>
                                        <option value="in-progress" {{ Request::get('status') == 'in-progress' ? 'selected':'' }}>in-progress</option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }}>Completed</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }}>Pending</option>
                                        <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }}>Out for Delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Filter</button>
            
                                </div>
                               
                            </div>
                           
                        </div>
                    </form>
                </div>
               
                <div class="border-y border-translucent">
                    <div class="table-responsive scrollbar">
                        <table class="table fs-9 mb-0 ">
                            <thead class="table-secondary">
                                <tr>
                                    <th class="sort white-space-nowrap text-center align-middle" scope="col">Order ID</th>
                                    <th class="sort white-space-nowrap align-middle" scope="col" data-sort="products">Tracking
                                        No</th>
                                    <th class="sort white-space-nowrap align-middle" scope="col" data-sort="products">Full Name
                                    </th>
                                    <th class="sort align-middle desc" scope="col" data-sort="color">Payment Mode</th>
                                    <th class="sort align-middle desc" scope="col" data-sort="color">Order Date</th>
                                    <th class="sort align-middle desc" scope="col" data-sort="color">Status Message</th>
                                    <th class="sort align-middle text-center pe-0" scope="col">Action</th>
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
                                                        $statusClass = 'bg-label-warning'; // yellow color for in-progress
                                                        break;
                                                    case 'completed':
                                                        $statusClass = 'bg-label-success'; // green color for completed
                                                        break;
                                                    case 'pending':
                                                        $statusClass = 'bg-label-info'; // blue color for pending
                                                        break;
                                                    case 'out-for-delivery':
                                                        $statusClass = 'bg-label-primary'; // primary color for out-for-delivery
                                                        break;
                                                    default:
                                                        $statusClass = 'bg-label-secondary'; // grey color for unknown status
                                                        break;
                                                }
                                            @endphp
                                        @else
                                            @php $statusClass = 'bg-light'; @endphp <!-- Light background if no status -->
                                        @endif
                                        <div class="badge px-2 {{ $statusClass }}">
                                            {{ $order->status_message ?? 'No Status Available' }}
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ url('admin/orders/'.$order->id) }}"
                                            class="btn btn-primary fw-normal btn-sm">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="7" style="color: rgb(255, 0, 0);">No item Added!!!</td>
                                </tr>
                                @endforelse
                            </tbody>
        
        
        
                        </table>
                        <div class="mt-2 float-end">
                            {{-- {{$orders->links()}} --}}
                        </div>
                    </div>
        
                </div>
            </div>
            
        </div>
    </div>
</div>
