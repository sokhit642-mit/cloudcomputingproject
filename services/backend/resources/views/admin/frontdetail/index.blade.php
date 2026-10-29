@extends('layouts.admin')
@section('title','Admin | Settings')

@section('content')
<div class="container-small cart">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item fw-normal"><a href="#!">Home</a></li>
            <li class="breadcrumb-item fw-normal"><a href="#!">Front Detail</a></li>

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
    {{-- <h2 class="mb-5 fw-normal">My Orders<span class="text-body-tertiary fw-normal ms-2"></span></h2> --}}
    <form action="{{url('admin/frontdetail')}}" method="POST">
        @csrf
        <div class="card">
            
            <div class="card-header">
                <div class="card-title border-bottom">
                    <h4>
                        Social Media
                    </h4>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label" for="">Facebook link</label>
                        <input type="text" name="facebook" value="{{$frontdetail->facebook ?? ''}}" class="form-control" placeholder="facebook URL">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Telegram link</label>
                        <input type="text" name="telegram" value="{{$frontdetail->telegram ?? ''}}" class="form-control" placeholder="telegram URL">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Instagram link</label>
                        <input type="text" name="instagram" value="{{$frontdetail->instagram ?? ''}}" class="form-control" placeholder="instagram URL">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Youtube link</label>
                        <input type="text" name="youtube" value="{{$frontdetail->youtube ?? ''}}" class="form-control" placeholder="youtube URL">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Tiktok link</label>
                        <input type="text" name="tiktok" value="{{$frontdetail->tiktok ?? ''}}" class="form-control" placeholder="tiktok URL">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            
            <div class="card-header">
                <div class="card-title border-bottom">
                    <h4>
                        Phone Number & About Us
                    </h4>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label" for="">Phone number 1</label>
                        <input type="text" name="phonenumber1" value="{{$frontdetail->phonenumber1 ?? ''}}" class="form-control" placeholder="phone number 1">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Phone number 2</label>
                        <input type="text" name="phonenumber2" value="{{$frontdetail->phonenumber2 ?? ''}}"  class="form-control" placeholder="phone number 2">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Phone number 3</label>
                        <input type="text" name="phonenumber3" value="{{$frontdetail->phonenumber3 ?? ''}}"  class="form-control" placeholder="phone number 3">
                    </div>
                </div>
                
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="form-label" for="">About HomeSport</label>
                        <textarea name="abouthomesport" class="form-control" id=""cols="20" rows="5" placeholder="about homesport">{{$frontdetail->abouthomesport ?? ''}} </textarea>
                    </div>
                </div>
            </div>
            
            
        </div>
        <br>
        <div class="text-center">
                    
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill me-2"></i>Save</button>
        </div>
    </form>
</div>
@endsection