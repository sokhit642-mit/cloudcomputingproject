<section class="bg-body-highlight dark__bg-gray-1100 py-9">
  <div class="container-small">
    <div class="row justify-content-between gy-4">
      <div class="col-12 col-lg-4">
        <div class="d-flex align-items-center mb-2">
          {{-- <img src="{{ asset('front-assets/homesport-logo.png')}}" alt="phoenix" width="70"> --}}
          {{-- <h5 class="logo-text ms-2">phoenix</h5> --}}
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7818.087690442653!2d104.89778292696842!3d11.548712600000028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109510346a40d07%3A0x248d1062cf45df8a!2sHome%20Sport!5e0!3m2!1sen!2skh!4v1732638408358!5m2!1sen!2skh" class="border rounded-2" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        {{-- <p class="text-body-tertiary mb-1 lh-lg fs-9">@lang('home.homesport_say')</p> --}}
      </div>
      <div class="col-6 col-md-auto">
        <h5 class=" fw-medium mb-3">@lang('home.about_home_sport_menu')</h5>
        <div class="d-flex flex-column">
          {{-- <a class="text-body-tertiary  fs-9 mb-1" href="#!">Careers</a> --}}
          <a class="text-body-tertiary  fs-9 mb-1" href="{{url('/about-us')}}">About Us</a>
          <a class="text-body-tertiary  fs-9 mb-1" href="#!">Privacy Policy</a>
          <a class="text-body-tertiary  fs-9 mb-1" href="#!">Terms &amp; Conditions</a></div>
      </div>
      <div class="col-6 col-md-auto">
        <h5 class=" fw-medium mb-3">@lang('home.stay_connected')</h5>
        <div class="d-flex flex-column">
          {{-- <a class="text-body-tertiary  fs-9 mb-1" href="#!">Blogs</a> --}}
          <a class="mb-1  fs-9 d-flex" href="{{$appfrontdetail->facebook ?? ''}}">
            <i class="fa-brands fa-facebook fs-8 me-2"></i>
            <span class="text-body-secondary">Facebook</span></a>
          <a class="mb-1  fs-9 d-flex" href="{{$appfrontdetail->tiktok ?? ''}}">
            <i class="fa-brands fa-tiktok fs-8 me-2"></i>
            <span class="text-body-secondary">Tiktok</span>
          </a>
          <a class="mb-1  fs-9 d-flex" href="{{$appfrontdetail->telegram ?? ''}}">
            <i class="fa-brands fs-8 fa-telegram  me-2"></i>
            <span class="text-body-secondary">Telegram</span>
          </a>
          <a class="mb-1  fs-9 d-flex" href="{{$appfrontdetail->youtube ?? ''}}">
            <i class="fa-brands fs-8 me-2 fa-youtube"></i>
            <span class="text-body-secondary">Youtube</span>
          </a>
        </div>
      </div>
      <div class="col-6 col-md-auto">
        <h5 class=" fw-medium mb-3">@lang('home.customer_services_menu')</h5>
        <div class="d-flex flex-column">
          <a class="text-body-tertiary  fs-9 mb-1" href="#!">{{$appfrontdetail->phonenumber1 ?? ''}}</a>
          <a class="text-body-tertiary  fs-9 mb-1" href="#!">{{$appfrontdetail->phonenumber2 ?? ''}}</a>
          <a class="text-body-tertiary  fs-9 mb-1" href="#!">{{$appfrontdetail->phonenumber3 ?? ''}}</a>
          {{-- <a class="text-body-tertiary  fs-9 mb-1" href="#!">Telegram</a> --}}
          <a class="text-body-tertiary  fs-9 mb-1" href="#!"></a></div>
      </div>
      <div class="col-6 col-md-auto">
        <h5 class=" fw-medium mb-3">@lang('home.payment_method_menu')</h5>
        <div class="d-flex flex-column">
          {{-- <a class="text-body-tertiary  fs-9 mb-1" href="#!">@lang('home.online_payment_method_menu')</a> --}}
          <a class="text-body-tertiary  fs-9 mb-1" href="#!">@lang('home.kh_qr')</a>
          <a class="text-body-tertiary  fs-9 mb-1" href="#!">
            <img style="border-radius: 2px;width:80px;" src="{{ asset('phoenix-assets/images/1665562484524-Bakong.jpg') }}" alt="">
           
          </a>
         
          <a class="text-body-tertiary  fs-9 mb-1" href="#!"></a>
        </div>
      </div>
    </div>
  </div><!-- end of .container-->
</section>