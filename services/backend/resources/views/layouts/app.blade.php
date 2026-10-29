<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{--
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title class=" custom-font">@yield('title')</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin-das/image-removebg-preview.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin-das/image-removebg-preview.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-das/image-removebg-preview.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-das/image-removebg-preview.png')}}">
  <link rel="manifest" href="img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="{{asset('admin-das/image-removebg-preview.png')}}">
  <meta name="theme-color" content="#ffffff">
  <script src="{{ asset('phoenix-assets/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('phoenix-assets/js/config.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet">
  <link href="{{ asset('phoenix-assets/css/simplebar.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="{{ asset('phoenix-assets/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
  <link href="{{ asset('phoenix-assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
  <link href="{{ asset('phoenix-assets/css/user-rtl.min.css') }}" type="text/css" rel="stylesheet" id="user-style-rtl">
  <link href="{{ asset('phoenix-assets/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script>
    var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    /* Lighter backdrop for Bootstrap modal */
    .modal-backdrop {
      background-color: #0000004c;
      /* Backdrop color */
      opacity: 0.3;
      /* Adjust this value to make it lighter or darker */
    }

    .truncate1 {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 270px;
      /* Adjust as needed */
    }

    .truncate2 {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 270px;
      /* Adjust as needed */
    }

    .multi-line-truncate {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      /* Number of lines to show */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 200px;
      /* Adjust as needed */
      height: 3em;
      Adjust according to line height line-height: 1.5em;
      /* Adjust according to your text line height */
    }
  </style>
  <style>
    .qr-code {
      position: relative;
      margin: 20px 0;
      width: 200px;
      height: 200px;
    }

    .qr-code img {
      width: 100%;
      height: 100%;

    }

    .qr-code .corner {
      position: absolute;
      width: 40px;
      height: 40px;
      border: 3px solid #908e8e;
      border-radius: 5px;

    }

    .qr-code .top-left {
      top: -3px;
      left: -9px;
      border-right: none;
      border-bottom: none;
    }

    .qr-code .top-right {
      top: -3px;
      right: -9px;
      border-left: none;
      border-bottom: none;
    }

    .qr-code .bottom-left {
      bottom: -3px;
      left: -9px;
      border-right: none;
      border-top: none;
    }

    .qr-code .bottom-right {
      bottom: -3px;
      right: -9px;
      border-left: none;
      border-top: none;
    }

    .checkout .tab-content {
      padding-right: 10px;
    }

    .checkout .nav-link {
      border: 1px solid #000;
      border-radius: 0px;
      margin-bottom: 8px;
    }
  </style>
  <style>
    .custom-font {
      font-family: Khmer OS Battambang;
      /* font-family: Khmer OS Battambang; */
    }
  </style>
  <style>
    .offcanvas {
      z-index: 1050;
      /* Higher than the navbar */
    }

    .sticky-top {
      z-index: 1030;
      /* Default Bootstrap sticky-top z-index */
    }
  </style>
  <style>
    /* .carousel-inner img {
          width: 100%;
          height: auto;
      } */

    .thumbnail img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      cursor: pointer;
      margin-bottom: 10px;
      border: 1px solid #ddd;
    }

    .thumbnail.active img {
      border: 2px solid #007bff;
    }

    .thumbnails {
      display: flex;
      justify-content: center;
      gap: 10px;
    }
  </style>
  <style>
    .truncate {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 200px;
      /* Adjust as needed */
    }

    .multi-line-truncate {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      /* Number of lines to show */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 200px;
      /* Adjust as needed */
      height: 3em;
      /* Adjust according to line height */
      line-height: 1.5em;
      /* Adjust according to your text line height */
    }
  </style>
  <style>
    .buy-now .btn-buy-now {
      position: fixed;
      bottom: 3rem;
      right: 1.625rem;
      z-index: 1080;
      /* box-shadow:0 1px 20px 1px #ff3e1d */
    }

    [dir=rtl] .buy-now .btn-buy-now {
      left: 1.625rem;
      right: inherit
    }

    .buy-now .btn-buy-now:hover {
      box-shadow: none
    }
  </style>
  <style>
    .timeline {
      position: relative;
      padding-left: 40px;
      margin-top: 20px;
    }

    .timeline::before {
      content: '';
      position: absolute;
      top: 0;
      left: 15px;
      width: 4px;
      height: 20%;
      background: #e9ecef;
    }

    .timeline-step {
      position: relative;
      padding-bottom: 40px;
    }

    .timeline-step .timeline-icon {
      position: absolute;
      left: -38px;
      top: 5px;
      width: 30px;
      height: 30px;
      background-color: #ccc;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .timeline-step.active .timeline-icon {
      background-color: #28a745;
    }

    .timeline-step.active .timeline-icon i {
      color: #fff;
    }

    .timeline-step.completed .timeline-icon {
      background-color: #ffc107;
    }

    .timeline-step .timeline-line {
      position: absolute;
      left: -25px;
      top: 30px;
      width: 4px;
      height: 100%;
      background: #ccc;
    }

    .timeline-step.active .timeline-line {
      background: #28a745;
    }

    .timeline-step.completed .timeline-line {
      background: #ffc107;
    }
  </style>
  <style>
    #product-dropdown {
      max-height: 300px;
      overflow-y: auto;
      border: 1px solid #ddd;
      border-radius: 4px;
      background-color: #fff;
    }

    #product-dropdown .dropdown-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px;
      cursor: pointer;
      border-bottom: 1px solid #f0f0f0;
    }

    #product-dropdown img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 4px;
    }

    #product-dropdown .dropdown-item a {
      color: #333;
      font-weight: 500;
      text-decoration: none;
      flex-grow: 1;
    }

    #product-dropdown .dropdown-item:hover {
      background-color: #f8f9fa;
    }
  </style>


  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="{{ asset('phoenix-assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('phoenix-assets/css/carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('phoenix-assets/css/custom.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="@sweetalert2/theme-bulma/bulma.css">
  {{--
  <link href="{{ asset('phoenix-assets/css/bulma-theme.css') }}" rel="stylesheet"> --}}
  <style>
    .toast {
      width: 390px !important;
      /* Adjust the width as needed */
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  {{--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css"> --}}
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;

    }

    /* Card-card Styling */
    .card-card {
      width: 300px;
      height: 420px;
      /* Fixed height for the card-card */
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      background-color: white;
      margin: 20px auto;
      text-align: left;
      /* Align text to the left */
      border: 1px solid #e0e0e0;
    }

    /* Header Styling */
    .card-card-header {
      background-color: rgb(225, 35, 46);
      color: white;
      padding: 12px;
      font-size: 20px;
      font-weight: bold;
      position: relative;
    }

    /* Right-Angle Cutout */
    .card-card-header::after {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 50px;
      height: 60px;
      background-color: rgb(225, 35, 46);
      clip-path: polygon(100% 0, 100% 100%, 0 40%);
      transform: translate(20px, 20px);
      /* Adjust positioning to align the angle */
    }

    /* Card-card Content */
    .card-card-content {
      padding: 20px;
      color: #333;
      font-family: 'Nunito Sans', sans-serif;
    }

    .card-card-content .name {
      font-size: calc(0.03 * 330px);
      /* 3% of the card-card height */
      font-weight: 600;
      margin-bottom: 8px;
      font-family: 'Nunito Sans', sans-serif;
    }

    .card-card-content .amount {
      font-size: calc(0.065 * 330px);
      /* 6.5% of the card-card height */
      font-weight: bold;
      color: #000;
      margin: 5px 0;
      font-family: 'Nunito Sans', sans-serif;
    }

    .card-card-content .currency {
      font-size: calc(0.03 * 340px);
      /* 3% of the card-card height */
      color: rgb(0, 0, 0);
      font-family: 'Nunito Sans', sans-serif;
    }

    /* Divider Styling */
    .divider {
      height: 1px;
      width: 90%;
      margin: 10px auto;
      background-image: linear-gradient(to right, #ccc 33%, rgba(255, 255, 255, 0) 0%);
      background-position: bottom;
      background-size: 10px 1px;
      background-repeat: repeat-x;
    }

    /* QR Code Section */
    .qr-code {
      padding: 20px;
      background-color: #ffffff;
      display: flex;
      justify-content: center;
    }

    .qr-code img {
      width: 210px;
      height: 210px;
      border-radius: 8px;
    }
  </style>
  @livewireStyles
</head>

<body>
  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  @if (session('message'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
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
  <main class="main" id="top">

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    {{-- <nav> --}}
      @include('layouts.inc.frontend.navbar')

      <br>
      <div class="ecommerce-homepage mb-2">
        @yield('content')
      </div>
      <!-- ============================================-->
      @include('layouts.inc.frontend.footer')

      <footer class="footer position-relative">
        <div class="row g-0 justify-content-between align-items-center h-100">
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-body">@lang('home.Thank you for support with Sport_menu')<span
                class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br
                class="d-sm-none" />2024 &copy;<a class="mx-1" href="#">HomeSport</a></p>
          </div>
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-body-tertiary text-opacity-85">v1.0</p>
          </div>
        </div>
      </footer>
  </main><!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->
  <div class="buy-now">
    <a href="{{$appfrontdetail->telegram ?? ''}}" target="_blank"
      class="btn fw-normal btn-subtle-primary rounded-pill btn-buy-now"><i
        class="bi bi-telegram me-1"></i>@lang('home.telegram_menu')</a>
  </div>

  </div>

  {{-- <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1"
    aria-labelledby="settings-offcanvas">
    <div class="offcanvas-header align-items-start border-bottom flex-column border-translucent">
      <div class="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
        <div>
          <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-8"></span>Theme Customizer</h5>
          <p class="mb-0 fs-9">Explore different styles according to your preferences</p>
        </div><button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><span
            class="fas fa-times fs-8"> </span></button>
      </div><button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span
          class="fas fa-arrows-rotate me-2 fs-10"></span>Reset to default</button>
    </div>
    <div class="offcanvas-body scrollbar px-card" id="themeController">
      <div class="setting-panel-item mt-0">
        <h5 class="setting-panel-item-title">Color Scheme</h5>
        <div class="row gx-2">
          <div class="col-4"><input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio"
              value="light" data-theme-control="phoenixTheme" /><label class="btn d-inline-block btn-navbar-style fs-9"
              for="themeSwitcherLight"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                  src="img/generic/default-light.png" alt="" /></span><span class="label-text">Light</span></label>
          </div>
          <div class="col-4"><input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio"
              value="dark" data-theme-control="phoenixTheme" /><label class="btn d-inline-block btn-navbar-style fs-9"
              for="themeSwitcherDark"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                  src="img/generic/default-dark.png" alt="" /></span><span class="label-text"> Dark</span></label></div>
          <div class="col-4"><input class="btn-check" id="themeSwitcherAuto" name="theme-color" type="radio"
              value="auto" data-theme-control="phoenixTheme" /><label class="btn d-inline-block btn-navbar-style fs-9"
              for="themeSwitcherAuto"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                  src="img/generic/auto.png" alt="" /></span><span class="label-text"> Auto</span></label></div>
        </div>
      </div>
      <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="setting-panel-item-title mb-1">RTL </h5>
          <div class="form-check form-switch mb-0"><input class="form-check-input ms-auto" type="checkbox"
              data-theme-control="phoenixIsRTL" /></div>
        </div>
        <p class="mb-0 text-body-tertiary">Change text direction</p>
      </div>
      <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="setting-panel-item-title mb-1">Support Chat </h5>
          <div class="form-check form-switch mb-0"><input class="form-check-input ms-auto" type="checkbox"
              data-theme-control="phoenixSupportChat" /></div>
        </div>
        <p class="mb-0 text-body-tertiary">Toggle support chat</p>
      </div>
      <div class="setting-panel-item">
        <h5 class="setting-panel-item-title">Navigation Type</h5>
        <div class="row gx-2">
          <div class="col-6"><input class="btn-check" id="navbarPositionVertical" name="navigation-type" type="radio"
              value="vertical" data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label
              class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionVertical"> <span
                class="rounded d-block"><img class="img-fluid img-prototype d-dark-none"
                  src="img/generic/default-light.png" alt="" /><img class="img-fluid img-prototype d-light-none"
                  src="img/generic/default-dark.png" alt="" /></span><span class="label-text">Vertical</span></label>
          </div>
          <div class="col-6"><input class="btn-check" id="navbarPositionHorizontal" name="navigation-type" type="radio"
              value="horizontal" data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label
              class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionHorizontal"> <span
                class="rounded d-block"><img class="img-fluid img-prototype d-dark-none"
                  src="img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none"
                  src="img/generic/top-default-dark.png" alt="" /></span><span class="label-text">
                Horizontal</span></label></div>
          <div class="col-6"><input class="btn-check" id="navbarPositionCombo" name="navigation-type" type="radio"
              value="combo" data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label
              class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionCombo"> <span
                class="rounded d-block"><img class="img-fluid img-prototype d-dark-none"
                  src="img/generic/nav-combo-light.png" alt="" /><img class="img-fluid img-prototype d-light-none"
                  src="img/generic/nav-combo-dark.png" alt="" /></span><span class="label-text"> Combo</span></label>
          </div>
          <div class="col-6"><input class="btn-check" id="navbarPositionTopDouble" name="navigation-type" type="radio"
              value="dual-nav" data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label
              class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionTopDouble"> <span
                class="rounded d-block"><img class="img-fluid img-prototype d-dark-none"
                  src="img/generic/dual-light.png" alt="" /><img class="img-fluid img-prototype d-light-none"
                  src="img/generic/dual-dark.png" alt="" /></span><span class="label-text"> Dual nav</span></label>
          </div>
        </div>
        <p class="text-warning-dark font-medium"> <span
            class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update navigation type in this
          page</p>
      </div>
      <div class="setting-panel-item">
        <h5 class="setting-panel-item-title">Vertical Navbar Appearance</h5>
        <div class="row gx-2">
          <div class="col-6"><input class="btn-check" id="navbar-style-default" type="radio" name="config.name"
              value="default" data-theme-control="phoenixNavbarVerticalStyle" disabled="disabled" /><label
              class="btn d-block w-100 btn-navbar-style fs-9" for="navbar-style-default"> <img
                class="img-fluid img-prototype d-dark-none" src="img/generic/default-light.png" alt="" /><img
                class="img-fluid img-prototype d-light-none" src="img/generic/default-dark.png" alt="" /><span
                class="label-text d-dark-none"> Default</span><span
                class="label-text d-light-none">Default</span></label></div>
          <div class="col-6"><input class="btn-check" id="navbar-style-dark" type="radio" name="config.name"
              value="darker" data-theme-control="phoenixNavbarVerticalStyle" disabled="disabled" /><label
              class="btn d-block w-100 btn-navbar-style fs-9" for="navbar-style-dark"> <img
                class="img-fluid img-prototype d-dark-none" src="img/generic/vertical-darker.png" alt="" /><img
                class="img-fluid img-prototype d-light-none" src="img/generic/vertical-lighter.png" alt="" /><span
                class="label-text d-dark-none"> Darker</span><span
                class="label-text d-light-none">Lighter</span></label></div>
        </div>
        <p class="text-warning-dark font-medium"> <span
            class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update vertical navbar
          appearance in this page</p>
      </div>
      <div class="setting-panel-item">
        <h5 class="setting-panel-item-title">Horizontal Navbar Shape</h5>
        <div class="row gx-2">
          <div class="col-6"><input class="btn-check" id="navbarShapeDefault" name="navbar-shape" type="radio"
              value="default" data-theme-control="phoenixNavbarTopShape" disabled="disabled" /><label
              class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeDefault"> <span
                class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0"
                  src="img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0"
                  src="img/generic/top-default-dark.png" alt="" /></span><span class="label-text">Default</span></label>
          </div>
          <div class="col-6"><input class="btn-check" id="navbarShapeSlim" name="navbar-shape" type="radio" value="slim"
              data-theme-control="phoenixNavbarTopShape" disabled="disabled" /><label
              class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeSlim"> <span
                class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0"
                  src="img/generic/top-slim.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0"
                  src="img/generic/top-slim-dark.png" alt="" /></span><span class="label-text"> Slim</span></label>
          </div>
        </div>
        <p class="text-warning-dark font-medium"> <span
            class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal navbar shape
          in this page</p>
      </div>
      <div class="setting-panel-item">
        <h5 class="setting-panel-item-title">Horizontal Navbar Appearance</h5>
        <div class="row gx-2">
          <div class="col-6"><input class="btn-check" id="navbarTopDefault" name="navbar-top-style" type="radio"
              value="default" data-theme-control="phoenixNavbarTopStyle" disabled="disabled" /><label
              class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDefault"> <span
                class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0"
                  src="img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0"
                  src="img/generic/top-style-darker.png" alt="" /></span><span class="label-text">Default</span></label>
          </div>
          <div class="col-6"><input class="btn-check" id="navbarTopDarker" name="navbar-top-style" type="radio"
              value="darker" data-theme-control="phoenixNavbarTopStyle" disabled="disabled" /><label
              class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDarker"> <span
                class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0"
                  src="img/generic/navbar-top-style-light.png" alt="" /><img
                  class="img-fluid img-prototype d-light-none mb-0" src="img/generic/top-style-lighter.png"
                  alt="" /></span><span class="label-text d-dark-none">Darker</span><span
                class="label-text d-light-none">Lighter</span></label></div>
        </div>
        <p class="text-warning-dark font-medium"> <span
            class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal navbar
          appearance in this page</p>
      </div><a class="bun btn-primary d-grid mb-3 text-white mt-5 btn btn-primary"
        href="https://themes.getbootstrap.com/product/phoenix-admin-dashboard-webapp-template/" target="_blank">Purchase
        template</a>
    </div>
  </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
    <div class="card-body d-flex align-items-center px-2 py-1">
      <div class="position-relative rounded-start" style="height:34px;width:28px">
        <div class="settings-popover"><span class="ripple"><span
              class="fa-spin position-absolute all-0 d-flex flex-center"><span
                class="icon-spin position-absolute all-0 d-flex flex-center"><svg width="20" height="20"
                  viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z"
                    fill="#2A7BE4"></path>
                </svg></span></span></span></div>
      </div><small class="text-uppercase text-body-tertiary fw-bold py-2 pe-2 ps-1 rounded-end">customize</small>
    </div>
  </a> --}}

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('product-searchs');
        const dropdown = document.getElementById('product-dropdown');

        if (!searchInput || !dropdown) {
            console.error('Required elements not found in the DOM.');
            return;
        }

        searchInput.addEventListener('input', async (e) => {
            const query = e.target.value.trim();

            if (query.length > 2) {
                try {
                    const response = await fetch('/search-products?query=' + encodeURIComponent(query));
                    const products = await response.json();

                    dropdown.innerHTML = '';

                    if (products.length > 0) {
                        products.forEach(product => {
                            const listItem = document.createElement('li');
                            listItem.classList.add('dropdown-item', 'd-flex', 'align-items-center', 'gap-2');

                            const image = document.createElement('img');
                            image.src = product.image;
                            image.alt = product.name;
                            image.style.width = '50px';
                            image.style.height = '50px';
                            image.classList.add('rounded');

                            const link = document.createElement('a');
                            link.href = product.url;
                            link.textContent = product.name;
                            link.classList.add('text-decoration-none', 'text-dark', 'flex-grow-1');

                            listItem.appendChild(image);
                            listItem.appendChild(link);

                            dropdown.appendChild(listItem);
                        });
                        dropdown.style.display = 'block';
                    } else {
                        dropdown.style.display = 'none';
                    }
                } catch (error) {
                    console.error('Error fetching products:', error);
                    dropdown.style.display = 'none';
                }
            } else {
                dropdown.style.display = 'none';
            }
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.input-group')) {
                dropdown.style.display = 'none';
            }
        });
    });
</script>





  <script src="{{ asset('phoenix-assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('phoenix-assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('phoenix-assets/js/anchor.min.js') }}"></script>
  <script src="{{ asset('phoenix-assets/js/is.min.js') }}"></script>
  <script src="{{ asset('phoenix-assets/js/all.min.js') }}"></script>
  <script src="{{ asset('phoenix-assets/js/lodash.min.js') }}"></script>
  {{-- <script src="{{ asset('phoenix-assets/js/list.min.js') }}"></script> --}}
  <script src="{{ asset('phoenix-assets/js/feather.min.js') }}"></script>
  {{-- <script src="{{ asset('phoenix-assets/js/dayjs.min.js') }}"></script> --}}
  <script src="{{ asset('phoenix-assets/js/phoenix.js') }}"></script>
  <script src="{{ asset('phoenix-assets/js/swiper-bundle.min.js') }}"></script>
  {{-- <script>
    window.addEventListener('message', event => {
        // alert(event.detail.message);
          
      })
  </script> --}}

  {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('alertMessage', (type, message) => {
            let icon;
            switch(type) {
                case 'success':
                    icon = 'success';
                    break;
                case 'warning':
                    icon = 'warning';
                    break;
                case 'error':
                    icon = 'error';
                    break;
                default:
                    icon = 'info';
            }

            Swal.fire({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3500,
                icon: icon,
                // title: 'Notification',
                text: message,
            });
        });
      });
  </script> --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
          const carousel = document.getElementById('productCarousel');
          const thumbnails = document.querySelectorAll('.thumbnail');
  
          carousel.addEventListener('slide.bs.carousel', function (event) {
              thumbnails.forEach((thumb, index) => {
                  if (index === event.to) {
                      thumb.classList.add('active');
                  } else {
                      thumb.classList.remove('active');
                  }
              });
          });
  
          thumbnails.forEach((thumbnail, index) => {
              thumbnail.addEventListener('click', () => {
                  thumbnails.forEach(thumb => thumb.classList.remove('active'));
                  thumbnail.classList.add('active');
              });
          });
      });
  </script>
  <script>
    // script.js
      const passwordInput = document.getElementById('password');
      const togglePassword = document.getElementById('togglePassword');
      const icon = togglePassword.querySelector('i');

      togglePassword.addEventListener('click', function () {
          const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordInput.setAttribute('type', type);
          
          // Toggle icon
          icon.classList.toggle('bi-eye-fill');
          icon.classList.toggle('bi-eye-slash-fill');
      });

  </script>
  {{-- toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    document.addEventListener('livewire:load', function () {
          Livewire.on('toast', (type, message) => {
              toastr[type](message);
          });
      });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('message', function(message, type) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
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
  
            toastr[type](message);
        });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- <script async src="https://telegram.org/js/telegram-widget.js?7" data-telegram-login="YourBotUsername"
    data-size="large" data-auth-url="/auth/telegram/callback" data-request-access="write"></script> --}}


  @livewireScripts
  @stack('scripts')

</body>

</html>