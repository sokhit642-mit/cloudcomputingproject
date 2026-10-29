{{--
<div class="d-block px-3 py-2 text-center text-bold skippy border-top">
  <a href="/" class="text-dark text-decoration-none">Please welcome to Home-Sport</a>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light  sticky-top border-top border-bottom"
  aria-label="Offcanvas navbar large"
  style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
  <div class="container">
    <a href="/" class="d-flex align-items-start mb-lg-0 text-dark text-decoration-none">
      <a href="#"><img src="{{ asset('front-assets/homesport-logo.png')}}" height="40px" alt=""></a>
    </a>
    <button class="navbar-toggler d-flex d-lg-none order-3 p-2 mt" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-light" tabindex="-1" id="offcanvasNavbar2"
      aria-labelledby="offcanvasNavbar2Label">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbar2Label">
          <a href="/" class="d-flex align-items-center mb-lg-0 text-dark text-decoration-none">
            <img src="{{ asset('front-assets/homesport-logo.png')}}" width="50" alt="">
          </a>
        </h5>
        <button type="button" class="btn-close btn-close-dark navbar-toggler d-flex d-lg-none order-3 p-2"
          data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body pt-0 p-lg-0">
        <hr class="d-lg-none text-dark mt-1">
        <ul class="navbar-nav me-auto flex-row flex-wrap bd-navbar-nav align-items-center">
          <li class="nav-item col-6 col-lg-auto py-1 col-12 col-lg-auto">
            <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-dark"></div>

          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">HOME</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link" aria-current="page" href="{{ url('/collections') }}">All CATEGORIES</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link" aria-current="page" href="#">PRODUCT</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link" aria-current="page" href="#">SHOP</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link" href="#">ABOUT US</a>
          </li>

        </ul>
        <hr class="d-lg-none text-dark">


        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">

          <div class="navbar-nav flex-row ms-md-auto align-items-center gap-3">


            <li class="nav-item col-6 col-lg-auto">
              <a type="button" class="btn btn-light btn-sm position-relative">
                <i class="bi bi-basket-fill"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  0
                  <span class="visually-hidden">unread messages</span>
                </span>
                <small class="d-lg-none ms-2">Cart</small>

              </a>
            </li>
            <li class="nav-item col-6 col-lg-auto me-2">
              <a type="button" class="btn btn-light btn-sm  position-relative" href="{{ url('/wishlist')}}">
                <i class="bi bi-heart-fill"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <div wire:id="Ss9b41FbJjBMkGGpy785" class=" d-inline">
                    <livewire:fronted.wishlist-count />
                  </div>
                  <span class="visually-hidden">unread messages</span>
                </span>
                <small class="d-lg-none">Wishlist</small>

              </a>
            </li>
          </div>



          <li class="nav-item py-1 col-12 col-lg-auto">
            <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-dark"></div>
            <hr class="d-lg-none text-dark-50">
          </li>

          <li class="nav-item dropdown">
            @guest
            @if (Route::has('login'))

          <li class="nav-item">
            <a class="nav-link border-2" style="border-radius: 4px;" role="button" href="{{ route('login') }}"><i
                class="bi bi-person-circle "></i> {{ __('Login') }}</a>


          </li>


          @endif



          @else
          @if (Auth::user()->role_as == '1')
          <li class="nav-item dropdown border-2 mt-1">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="25" class="rounded-circle">
              {{ Auth::user()->name }}
            </a>

            <ul class="dropdown-menu mx-0 shadow w-220px  p-2 rounded-3" data-bs-theme="light">
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="#">
                  <i class="bi bi-person-circle "></i>
                  Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="{{ url('admin/dashboard') }}">
                  <i class="bi bi-grid-1x2-fill "></i>
                  Dasboard
                </a>
              </li>
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="#">
                  <i class="bi bi-cart3"></i>
                  Cart
                </a>
              </li>
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="{{ url('/wishlist')}}">
                  <i class="bi bi-heart-fill"></i>
                  Wishlist
                </a>
              </li>
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="#">
                  <i class="bi bi-gear"></i>
                  Setting
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center rounded-2"
                  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item dropdown border-2 mt-1">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="25" class="rounded-circle">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu mx-0 shadow w-220px  p-2 rounded-3" data-bs-theme="light">
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="#">
                  <i class="bi bi-person-circle "></i>
                  Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="#">
                  <i class="bi bi-cart3"></i>
                  Cart
                </a>
              </li>
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="{{ url('/wishlist')}}">
                  <i class="bi bi-heart-fill"></i>
                  Wishlist
                </a>
              </li>
              <li>
                <a class="dropdown-item d-flex gap-2 align-items-center rounded-2" href="#">
                  <i class="bi bi-gear"></i>
                  Setting
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center rounded-2"
                  href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
          @endif


          @endguest

          </li>
        </ul>

        <div class="dropdown text-end">

        </div>
      </div>
    </div>
  </div>
</nav> --}}

<section class="py-0">
  <div class="container-small">
    <div class="ecommerce-topbar">
      <nav class="navbar navbar-expand-lg navbar-light px-0 bg-body">
        <div class="row gx-0 gy-2 w-100 flex-between-center">
          <div class="col-auto"><a class="text-decoration-none" href="index.html">
              <div class="d-flex align-items-center"><img src="{{ asset('front-assets/homesport-logo.png')}}"
                  alt="phoenix" width="70" />
                {{-- <h5 class="logo-text ms-2">phoenix</h5> --}}
              </div>
            </a></div>
          <div class="col-auto order-md-1">
            <ul class="navbar-nav navbar-nav-icons flex-row me-n2">
              <li class="nav-item d-flex align-items-center mb-1">
                <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle"><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme" style="height:32px;width:32px;"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon icon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme" style="height:32px;width:32px;"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun icon"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg></label></div>
              </li>
              <li class="nav-item dropdown dropstart">
                <a class="nav-link" id="navbarLightExampleDropdown" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false"><i class="bi bi-translate"></i></a>
                <div class="dropdown-menu py-0" aria-labelledby="navbarLightExampleDropdown">
                  <div wire:ignore.self class="py-2 rounded-3">
                    <a class="dropdown-item" href="locale/kh"><img
                        src="{{ asset('phoenix-assets/images/cambodia-flag-png-large.png')}}" width="20%"
                        class=" rounded me-2" alt=""> ភាសាខ្មែរ</a>
                    <a class="dropdown-item" href="locale/en"><img
                        src="{{ asset('phoenix-assets/images/united-kingdom-flag-png-large.png')}}" width="20%"
                        class=" rounded me-2" alt=""> English</a>
                    {{-- <a class="dropdown-item" href="locale/ch"><img
                        src="{{ asset('phoenix-assets/images/united-kingdom-flag-png-large.png')}}" width="20%"
                        class=" rounded me-2" alt=""> Chines</a> --}}

                  </div>
                </div>
              </li>
              {{-- <li class="nav-item d-flex align-items-center">
                <div class="theme-control-toggle fa-icon-wait px-2">
                  <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                    data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label
                    class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                    data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                    style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label><label
                    class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                    data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                    style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label>
                </div>
              </li> --}}

              

              <li class="nav-item"><a class="nav-link px-2 icon-indicator icon-indicator-primary"
                  href="{{ url('/cart') }}" role="button"><span class="text-body-tertiary" data-feather="shopping-cart"
                    style="height:20px;width:20px;"></span><span class="icon-indicator-number">
                    <livewire:fronted.cart.cart-count />
                  </span></a></li>
              <li class="nav-item"><a class="nav-link px-2 icon-indicator icon-indicator-primary"
                  href="{{ url('/wishlist')}}" role="button"><span class="fa fa-heart mt-1" data-feather="shopping-cart"
                    style="height:20px;width:20px;"></span><span class="icon-indicator-number">
                    <livewire:fronted.wishlist-count />
                  </span></a></li>
              {{-- <li class="nav-item dropdown"><a
                  class="nav-link px-2 icon-indicator icon-indicator-sm icon-indicator-danger"
                  id="navbarTopDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                    class="text-body-tertiary" data-feather="bell" style="height:20px;width:20px;"></span></a>
                <div
                  class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret mt-2"
                  id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                  <div class="card position-relative border-0">
                    <div class="card-header p-2">
                      <div class="d-flex justify-content-between">
                        <h5 class="text-body-emphasis mb-0">Notifications</h5><button
                          class="btn btn-link p-0 fs-9 fw-normal" type="button">Mark all as read</button>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <div class="scrollbar-overlay" style="height: 27rem;">
                        <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                  src="img/team/40x40/30.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                                <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                    class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                                    class="ms-2 text-body-quaternary text-opacity-75  fs-10">10m</span></p>
                                <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                    class="">10:41 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="dropdown notification-dropdown"><button
                                class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent"><span
                                  class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                              <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3">
                                <div class="avatar-name rounded-circle"><span>J</span></div>
                              </div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs-9 text-body-emphasis">Jane Foster</h4>
                                <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                    class='me-1 fs-10'>📅</span>Created an event.<span
                                    class="ms-2 text-body-quaternary text-opacity-75  fs-10">20m</span></p>
                                <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                    class="">10:20 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="dropdown notification-dropdown"><button
                                class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent"><span
                                  class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                              <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img
                                  class="rounded-circle avatar-placeholder" src="img/team/40x40/avatar.webp" alt="" />
                              </div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                                <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                    class='me-1 fs-10'>👍</span>Liked your comment.<span
                                    class="ms-2 text-body-quaternary text-opacity-75  fs-10">1h</span></p>
                                <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                    class="">9:30 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="dropdown notification-dropdown"><button
                                class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent"><span
                                  class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                              <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                  src="img/team/40x40/57.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs-9 text-body-emphasis">Kiera Anderson</h4>
                                <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                    class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                                    class="ms-2 text-body-quaternary text-opacity-75  fs-10"></span></p>
                                <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                    class="">9:11 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="dropdown notification-dropdown"><button
                                class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent"><span
                                  class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                              <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                  src="img/team/40x40/59.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs-9 text-body-emphasis">Herman Carter</h4>
                                <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                    class='me-1 fs-10'>👤</span>Tagged you in a comment.<span
                                    class="ms-2 text-body-quaternary text-opacity-75  fs-10"></span></p>
                                <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                    class="">10:58 PM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="dropdown notification-dropdown"><button
                                class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent"><span
                                  class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                              <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                  src="img/team/40x40/58.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs-9 text-body-emphasis">Benjamin Button</h4>
                                <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                    class='me-1 fs-10'>👍</span>Liked your comment.<span
                                    class="ms-2 text-body-quaternary text-opacity-75  fs-10"></span></p>
                                <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                    class="">10:18 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="dropdown notification-dropdown"><button
                                class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent"><span
                                  class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                              <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer p-0 border-top border-translucent border-0">
                      <div class="my-2 text-center  fs-10 text-body-tertiary text-opactity-85"><a class="er"
                          href="../../../pages/notifications.html">Notification history</a></div>
                    </div>
                  </div>
                </div>
              </li> --}}
              <li class="nav-item dropdown">

                @guest
                @if (Route::has('login'))

              <li class="nav-item">
                <a class="nav-link px-2" href="{{ route('login') }}" role="button" data-bs-auto-close="outside"
                  aria-haspopup="true" aria-expanded="false"><span class="text-body-tertiary" data-feather="user"
                    style="height:20px;width:20px;"></span></a>
              </li>


              @endif



              @else
              @if (Auth::user()->role_as == '1')
              <button class="nav-link px-2" id="navbarDropdownUser" href="{{ route('login') }}" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                @if(Auth::check())
                @if(Auth::user()->avatar)
                <img class="rounded-circle text-body-tertiary border" style="height:25px;width:25px;"
                  src="{{ Auth::user()->avatar }}" width="15%" alt="{{ Auth::user()->name }}'s Avatar" />
                @elseif(Auth::user()->image)
                <img class="rounded-circle border" src="{{ asset('uploads/profile/' . Auth::user()->image) }}"
                  style="height:25px;width:25px;" alt="{{ Auth::user()->name }}" class="profile-image">
                @else
                <img class="rounded-circle" src="{{ asset('uploads/profile/default.png') }}" alt="Default Avatar"
                  class="profile-image">
                @endif
                @endif
              </button>

              <div
                class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border mt-2"
                aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                  <div class="card-body p-0 border-bottom">
                    <div class="text-center pt-4 pb-3">
                      <div class="avatar avatar-xl ">
                        @if(Auth::check())
                        @if(Auth::user()->avatar)
                        <!-- If logged in with Google or Facebook, show the avatar -->
                        <img class="rounded-circle" src="{{ Auth::user()->avatar }}"
                          alt="{{ Auth::user()->name }}'s Avatar" />
                        @elseif(Auth::user()->image)
                        <!-- If registered normally and has an uploaded image -->
                        <img class="rounded-circle border" src="{{ asset('uploads/profile/' . Auth::user()->image) }}"
                          alt="{{ Auth::user()->name }}" class="profile-image">
                        @else
                        <!-- Default image if no avatar or uploaded image -->
                        <img class="rounded-circle" src="{{ asset('uploads/profile/default.png') }}"
                          alt="Default Avatar" class="profile-image">
                        @endif
                        @endif
                      </div>
                      <h6 class="mt-2 text-body-emphasis fw-normal"> {{ Auth::user()->name }}</h6>
                      <h6 class="mt-2 text-body-emphasis fw-normal"> {{ Auth::user()->email }}</h6>

                    </div>

                  </div>
                  <div class="overflow-auto scrollbar" style="height: 10rem;">
                    <ul class="nav d-flex flex-column mb-2 pb-1">
                      <li class="nav-item"><a class="nav-link px-3 d-block fw-normal" href="#!"> <span
                            class="me-2 text-body align-bottom"
                            data-feather="user"></span><span>@lang('home.profile_menu')</span></a></li>
                      <li class="nav-item"><a class="nav-link px-3 d-block fw-normal"
                          href="{{ url('admin/dashboard') }}"><span class="me-2 text-body align-bottom"
                            data-feather="pie-chart"></span>@lang('home.dashboard_menu')</a></li>
                      <li class="nav-item"><a class="nav-link px-3 d-block fw-normal" href="#!"> <span
                            class="me-2 text-body align-bottom"
                            data-feather="settings"></span>@lang('home.settings_menu')</a></li>
                    </ul>
                  </div>
                  <div class="card-footer p-0 border-top border-translucent">
                    <br>
                    <div class="px-3">

                      <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        <span class="me-2" data-feather="log-out"> </span>@lang('home.logout_menu')
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </div>
                    <div class="my-2 text-center  fs-10 text-body-quaternary"><a class="text-body-quaternary me-1"
                        href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1"
                        href="#!">Terms</a>&bull;<a class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
                  </div>
                </div>
              </div>
              @else

              <button class="nav-link px-2" id="navbarDropdownUser" href="{{ route('login') }}" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                @if(Auth::check())
                @if(Auth::user()->avatar)
                <img class="rounded-circle border" style="height:25px;width:25px;" src="{{ Auth::user()->avatar }}"
                  width="15%" alt="{{ Auth::user()->name }}" />
                @elseif(Auth::user()->image)
                <img class="rounded-circle border" src="{{ asset('uploads/profile/' . Auth::user()->image) }}"
                  style="height:25px;width:25px;" alt="{{ Auth::user()->name }}" class="profile-image">
                @else
                <img class="rounded-circle" src="{{ asset('uploads/profile/default.png') }}" alt="Default Avatar"
                  class="profile-image">
                @endif
                @endif
              </button>

              <div
                class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border mt-2"
                aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                  <div class="card-body p-0 border-bottom">
                    <div class="text-center pt-4 pb-3">
                      <div class="avatar avatar-xl ">
                        @if(Auth::check())
                        @if(Auth::user()->avatar)
                        <!-- If logged in with Google or Facebook, show the avatar -->
                        <img class="rounded-circle" src="{{ Auth::user()->avatar }}"
                          alt="{{ Auth::user()->name }}'s Avatar" />
                        @elseif(Auth::user()->image)
                        <!-- If registered normally and has an uploaded image -->
                        <img class="rounded-circle border" src="{{ asset('uploads/profile/' . Auth::user()->image) }}"
                          alt="{{ Auth::user()->name }}" class="profile-image">
                        @else
                        <!-- Default image if no avatar or uploaded image -->
                        <img class="rounded-circle" src="{{ asset('uploads/profile/default.png') }}"
                          alt="Default Avatar" class="profile-image">
                        @endif
                        @endif
                      </div>
                      <h6 class="mt-2 text-body-emphasis fw-normal"> {{ Auth::user()->name }}</h6>
                      <h6 class="mt-2 text-body-emphasis fw-normal"> {{ Auth::user()->email }}</h6>
                    </div>

                  </div>
                  <div class="overflow-auto scrollbar">
                    <ul class="nav d-flex flex-column mb-2 pb-1">
                      <li class="nav-item">
                        <a class="nav-link px-3 d-block fw-normal" href="{{url('/profile')}}">
                          <span class="me-2 text-body align-bottom" data-feather="user"></span>
                          <span>@lang('home.profile_menu')</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-3 d-block fw-normal" href="{{url('/orders')}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-shopping-bag me-2 mb-1">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                          </svg>
                          <span>@lang('order.order')</span>
                        </a>
                      </li>
                      {{-- <li class="nav-item">
                        <a class="nav-link px-3 d-block fw-normal" href="{{url('/profile')}}">
                          <span class="me-2 text-body align-bottom" data-feather="user"></span>
                          <span>Cart</span>
                        </a>
                      </li> --}}
                      {{-- <li class="nav-item"><a class="nav-link px-3 d-block fw-normal" href="#!"> <span
                            class="me-2 text-body align-bottom"
                            data-feather="settings"></span>@lang('home.settings_menu')</a></li> --}}
                    </ul>
                  </div>
                  <div class="card-footer p-0 border-top border-translucent">

                    <div class="px-3 mt-1">
                      <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-phoenix-secondary d-flex flex-center w-100">@lang('home.logout_menu')</button>
                      </form>
                      {{-- <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        <span class="me-2" data-feather="log-out"> </span>@lang('home.logout_menu')
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form> --}}
                    </div>
                    <div class="my-2 text-center  fs-10 text-body-quaternary"><a class="text-body-quaternary me-1"
                        href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1"
                        href="#!">Terms</a>&bull;<a class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
                  </div>
                </div>
              </div>
              @endif
              @endguest
              </li>


            </ul>
          </div>
          <div class="col-12 col-md-6">
            <div class="input-group position-relative">
              <div class="search-box ecommerce-search-box w-100">
                <form class="position-relative">
                  <input id="product-searchs" class="form-control search-input search form-control-sm" type="search"
                    placeholder="@lang('home.search_menu')" aria-label="Search" />
                  <a href="">
                    <span class="fas fa-search search-box-icon ">

                    </span>
                  </a>
                </form>
              </div>
              
              {{-- <input id="product-searchs" type="text" class="form-control" placeholder="Search for products..."
                aria-label="Search">
              <button class="btn btn-subtle-primary fw-normal">
                <span class="fas fa-search search-box-icon"></span>
              </button> --}}
              <ul id="product-dropdown" class="dropdown-menu position-absolute w-100 "
                style="z-index: 1050; display: none;margin-left:10px;margin-top: 34px;"></ul>
            </div>



          </div>

          {{-- <div class="search-box ecommerce-search-box w-100">
            <form class="position-relative">
              <input class="form-control search-input search form-control-sm" type="search"
                placeholder="@lang('home.search_menu')" aria-label="Search" />
              <a href="">
                <span class="fas fa-search search-box-icon ">

                </span>
              </a>
            </form>
          </div> --}}
        </div>

    </div>
    </nav>
  </div>
  </div><!-- end of .container-->
  <nav class="ecommerce-navbar navbar-expand navbar-light bg-body-emphasis justify-content-between">
    <div class="container-small d-flex flex-between-center" data-navbar="data-navbar">
      <div class="dropdown">
        <button class="btn text-body ps-0 pe-5 text-nowrap dropdown-toggle dropdown-caret-none fw-normal"
          data-dropdown-on-hover="data-dropdown-on-hover" data-category-btn="data-category-btn"
          data-bs-toggle="dropdown"><span class="fas fa-bars me-2"></span>@lang('home.category_menu')</button>
        {{-- <a class="nav-link px-2" id="navbarDropdownUser" href="{{ route('login') }}" role="button"
          data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
            class="text-body-tertiary" data-feather="user" style="height:20px;width:20px;"></span></a> --}}
        <div class="dropdown-menu border border-translucent py-0 category-dropdown-menu">
          <div class="card border-0 scrollbar">
            <div class="card-body">

              <div class="row">
                @php
                $categories = App\Models\Category::where('status','0')->get();
                $subcategory = App\Models\SubCategory::where('status','0')->get();
                @endphp

                @forelse ($categories as $categoryItem)

                <div class="col-md-4 ">
                  <a class="text-body-emphasis d-block text-decoration-none bg-body-highlight-hover px-2 rounded-2 "
                    href="{{ url('/collections/'.$categoryItem->slug) }}">
                    <div class="d-flex align-items-center mb-3">
                      <img src="{{ asset('uploads/category/'.$categoryItem->image) }}" class="me-1 rounded-5 p-1"
                        width="15%" alt="">
                      <h6 class="text-body-highlight mb-0 text-nowrap">{{ $categoryItem->name }}</h6>
                    </div>
                  </a>
                </div>

                @empty
                <h5>No Category Available.</h5>
                @endforelse
              </div>
              <div class="text-center border-top border-translucent pt-3"><a class=""
                  href="{{ url('/collections') }}">@lang('home.see_category_menu')<span class="fas fa-angle-right ms-1"
                    data-fa-transform="down-1"></span></a></div>
            </div>
          </div>
        </div>
      </div>

      <ul class="navbar-nav justify-content-end align-items-center ">

        <li class="nav-item border-right-style" data-nav-item="data-nav-item"><a
            class="nav-link ps-0 {{ request()->is('/') ? 'active' : '' }}"
            href="{{url('/')}}">@lang('home.home_menu')</a></li>
        <li class="nav-item border-right-style" data-nav-item="data-nav-item"><a
            class="nav-link {{ request()->is('collections') ? 'active' : '' }}"
            href="{{ url('/collections') }}">@lang('home.all categories_menu')</a></li>
        <li class="nav-item border-right-style" data-nav-item="data-nav-item"><a
            class="nav-link {{ request()->is('brands') ? 'active' : '' }}" href="{{ url('/brands') }}">
            @lang('home.all brands_menu')</a></li>
        <li class="nav-item border-right-style" data-nav-item="data-nav-item"><a
            class="nav-link {{ request()->is('all-products') ? 'active' : '' }}"
            href="{{ url('/all-products') }}">@lang('home.products_menu')</a></li>
        <li class="nav-item border-right-style" data-nav-item="data-nav-item"><a
            class="nav-link {{ request()->is('wishlist') ? 'active' : '' }}"
            href="{{ url('/wishlist')}}">@lang('home.wishlist_menu')</a></li>
        {{-- <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link"
            href="../../../apps/e-commerce/landing/shipping-info.html">Shipping Info</a></li> --}}
        {{-- <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link"
            href="../../../apps/e-commerce/admin/add-product.html">ទំព័រដើម</a></li> --}}
        {{-- <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link"
            href="../../../apps/e-commerce/landing/order-tracking.html">Track order</a></li> --}}
        <li class="nav-item" data-nav-item="data-nav-item"><a
            class="nav-link pe-0 {{ request()->is('orders') ? 'active' : '' }}" href="{{ url('/orders')}}">@lang('home.order')</a>
        </li>

        <li class="nav-item dropdown" data-nav-item="data-nav-item" data-more-item="data-more-item"><a
            class="nav-link dropdown-toggle dropdown-caret-none  pe-0" href="javascript: void(0)" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false" data-boundary="window"
            data-bs-reference="parent">@lang('home.more_menu')<span class="fas fa-angle-down ms-2"></span></a>
          <div class="dropdown-menu dropdown-menu-end category-list" aria-labelledby="navbarDropdown"
            data-category-list="data-category-list"></div>
        </li>
      </ul>
    </div>
  </nav>
</section><!-- <section> close ============================-->
<!-- ============================================-->