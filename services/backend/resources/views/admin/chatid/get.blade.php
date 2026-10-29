@extends('layouts.admin')
@section('title')
    Get Telegram chat ID
@endsection
@section('content')
<div class="">
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">@lang('admin_dash.home')</a></li>
          <li class="breadcrumb-item">Get Telegram chat ID</li>
        </ol>
    </nav>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <Label class="fw-bold">Bot Token</Label>

                <input type="text" readonly class="form-control" value="8065406790:AAH3pgMiJDjSllHctHhqSZhy6PBem6cgFvA" id="chat_id" name="chat_id" placeholder="Enter Telegram Chat ID" required>

                <label class="mt-2 fw-bold">Bot Name</label>
                <input type="text" readonly class="form-control" value="@new_order_come_bot" id="bot_name" name="bot_name" placeholder="Enter Bot Name" required>
                <br>
                <a href="https://t.me/new_order_come_bot" class="mt-2">Bot Link(Click here to start bot)</a>
                <hr>
                <div class="">
                    <h4>Get Telegram Chat ID</h4>
                
                    <!-- Show success or error message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @elseif(isset($chat_id))
                        <div class="alert alert-info">
                            <strong>Chat ID: </strong> {{ $chat_id }}
                        </div>
                    @elseif(isset($error))
                        <div class="alert alert-warning">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endif
                
                    <form action="{{ route('getChatId') }}" method="GET">
                        <div class="input-group">
                            {{-- <label for="chat_id">Telegram Chat ID</label> --}}
                            <input type="text" class="form-control" id="chat_id" name="chat_id" placeholder="Chat ID will appear here" value="{{ old('chat_id', isset($chat_id) ? $chat_id : '') }}" readonly>
                            <button type="submit" class="btn btn-primary">Get Chat ID</button>  
                        </div>
                    </form>
                
                    @if(!isset($chat_id))
                        <div class="mt-3">
                            <p><strong>Note:</strong> Please send a message to the bot in Telegram so we can retrieve your chat ID.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
   
   
</div>


@endsection
