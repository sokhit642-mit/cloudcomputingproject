@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item active">view</li>
      </ol>
    </nav>
</div>
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
            <div class="card-header">
                Category Image
            </div>
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('uploads/category/'.$category->image) }}" alt="" width="60%">
            {{-- <h2>Kevin Anderson</h2>
            <h3>Web Designer</h3> --}}
            {{-- <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> --}}
            <br>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
            <div class="card-header">
                Category Detail
            </div>
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
         

              
                
             

             

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Category Name</div>
                  <div class="col-lg-9 col-md-8">{{$category->name}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Slug</div>
                  <div class="col-lg-9 col-md-8">{{$category->slug}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Status</div>
                  <div class="col-lg-9 col-md-8"><span class="badge rounded-pill bg-{{ $category->status ? 'danger' :  'success'}} bg-{{ $category->status ? '<i class="bi bi-exclamation-octagon me-1"></i>' :  '<i class="bi bi-check-circle "></i>'}}">{{ $category->status == '1' ? ' Hidden':' Visible' }}</i></span></div>
                </div>
                <h5 class="card-title">Description</h5>
                <p class="small fst-italic">{{$category->description}}</p>
               

              

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
      <div style="float: right;">
        <a href="{{ url('admin/category') }}" type="button" data-bs-original-title="All Category" data-bs-toggle="tooltip" class="btn btn-warning"><i class="bi bi-box-arrow-in-left"></i></a>
        
    </div>
    </div>
  </section>
   
@endsection
