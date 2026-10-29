@extends('layouts.admin')
@section('title')
    Change Telegram chat ID
@endsection
@section('content')
<div class="">
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
          <li class="breadcrumb-item">Change Telegram chat ID</li>
         
          
        </ol>
        
    </nav>
    @if (session('message'))
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

                toastr.success(@json(session('message')));
            });
        </script>
    @endif
    <div class="col-md-6">
        <div class="card">
       
            <div class="card-body">
                <h3>Enter Telegram Chat ID</h3>
    
            <form action="{{ route('saveTelegramChatId') }}" method="POST">
                @csrf
                <div class="input-group">
                    {{-- <label >Telegram Chat ID</label> --}}
                    @if ($chatid->chat_id)
                        <input type="text" value="{{$chatid->chat_id}}" class="form-control" id="chat_id" name="chat_id" placeholder="Enter Telegram Chat ID" required>
                        
                    @else
                        <input type="text" class="form-control" id="chat_id" name="chat_id" placeholder="Enter Telegram Chat ID" required>
                        
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
               
            </form>
            </div>
        </div>
    </div>
   
</div>



@endsection