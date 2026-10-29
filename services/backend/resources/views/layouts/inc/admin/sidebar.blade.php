{{-- <aside id="sidebar" class="sidebar">
 
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item  ">
        <a class="nav-link {{ Request::is('admin/dashboard') ? '':'collapsed'}}" href="{{ url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      
      <li class="nav-heading">Categories</li>
      <li class="nav-item ">
        <a class="nav-link {{ Request::is('admin/category') ? '':'collapsed'}}" href="{{ url('admin/category')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Category</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{ Request::is('admin/sub-category') ? '':'collapsed'}}" href="{{ url('admin/sub-category')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Sub-Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/brands') ? '':'collapsed'}}"  href="{{ url('admin/brands')}}">
          <i class="bi bi-card-list"></i>
          <span>Brand</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{ Request::is('admin/colors') ? '':'collapsed'}}" href="{{ url('admin/colors')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Colors</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{ Request::is('admin/sizes') ? '':'collapsed'}}" href="{{ url('admin/sizes')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Sizes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/products') ? '':'collapsed'}}"  data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box-seam"></i>
          <span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('admin/products/create') ? 'active':''}}" href="{{ url('admin/products/create') }}">
              <i class="bi bi-circle"></i><span>Add Products</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admin/products') ? 'active':''}}" href="{{ url('admin/products') }}">
              <i class="bi bi-circle"></i><span>Views Products</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item ">
        <a class="nav-link {{ Request::is('admin/sliders') ? '':'collapsed'}}" href="{{ url('admin/sliders')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Home sliders</span>
        </a>
      </li>
     
      <li class="nav-item ">
        <a class="nav-link collapsed" href="{{ url('/')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Home Page</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>
          <li>
            <a href="components-cards.html">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-carousel.html">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="components-list-group.html">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="components-modal.html">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="components-tabs.html">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
          <li>
            <a href="components-progress.html">
              <i class="bi bi-circle"></i><span>Progress</span>
            </a>
          </li>
          <li>
            <a href="components-spinners.html">
              <i class="bi bi-circle"></i><span>Spinners</span>
            </a>
          </li>
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-circle"></i><span>Tooltips</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside> --}}
  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme ">

      
    <div class="app-brand demo ">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">


        </span>
        <img src="{{asset('admin-das/image-removebg-preview.png')}}" class="app-brand-logo demo" width="15%" id="brand-Logo" alt="">

        <span class="app-brand-text demo menu-text fw-bold ms-2">@lang('admin_dash.home_sport')</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    
    
    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
          <span class="badge badge-center rounded-pill bg-danger ms-auto">5</span>
        </a>
        
      </li> --}}
      <li class="menu-item {{ Request::is('admin/dashboard') ? 'active':''}}">
        <a href="{{ url('admin/dashboard') }}" class="menu-link ">
          <i class='bx bxs-dashboard me-3' ></i>
          <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.dasboard')</div>
         
        </a>
        
      </li>
      <li class="menu-item {{ Request::is('admin/frontdetail') ? 'active':''}}">
        <a href="{{ url('admin/frontdetail') }}" class="menu-link ">
          <i class='bx bxs-detail me-3'></i>
          <div class="text-truncate" data-i18n="Dashboards">Front detail</div>
        
        </a>
      </li>
      {{-- <li class="menu-item {{ Request::is('admin/bakongkhqr') ? 'active':''}}">
        <a href="{{ url('admin/bakongkhqr') }}" class="menu-link ">
          <i class='bx bxs-detail me-3'></i>
          <div class="text-truncate" data-i18n="Dashboards">Bakong KHQR</div>
        
        </a>
      </li> --}}
      <li class="menu-item {{ Request::is('admin/view-khqr') || Request::is('admin/bakongkhqr') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='bx bx-qr me-3'></i>
          <div class="text-truncate" data-i18n="Front Pages">Bakong KHQR</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('admin/bakongkhqr') ? 'active' : '' }}">
                <a href="{{ url('admin/bakongkhqr') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Dashboards">Change KHQR</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/view-khqr') ? 'active' : '' }}">
                <a href="{{ url('admin/view-khqr') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Dashboards">View KHQR</div>
                </a>
            </li>
        </ul>
      </li>
      <li class="menu-item {{ Request::is('admin/telegram-change-chat-id') || Request::is('admin/telegram-get-chat-id') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='bx bxl-telegram me-3'></i>
          <div class="text-truncate" data-i18n="Front Pages">Telegram</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('admin/telegram-get-chat-id') ? 'active' : '' }}">
                <a href="{{ url('admin/telegram-get-chat-id') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Dashboards">Get Chat ID</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/telegram-change-chat-id') ? 'active' : '' }}">
                <a href="{{ url('admin/telegram-change-chat-id') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Dashboards">Change Chat ID</div>
                </a>
            </li>
        </ul>
      </li>
      @if (Auth::user()->role == '2')
       
        <li class="menu-item {{ Request::is('admin/admins') ? 'active':''}}">
          <a href="{{ url('admin/admins') }}" class="menu-link ">
            <i class='bx bxs-user-account me-3'></i>
            <div class="text-truncate" data-i18n="Dashboards">Admin</div>
          
          </a>
        </li>
        <li class="menu-item {{ Request::is('admin/user') ? 'active':''}}">
          <a href="{{ url('admin/user') }}" class="menu-link ">
            <i class='bx bxs-user-rectangle me-3'></i>
            <div class="text-truncate" data-i18n="Dashboards">User</div>
          
          </a>
        </li>
      @else
        <li class="menu-item {{ Request::is('admin/user') ? 'active':''}}">
          <a href="{{ url('admin/user') }}" class="menu-link ">
            <i class='bx bxs-user-rectangle me-3'></i>
            <div class="text-truncate" data-i18n="Dashboards">User</div>
          </a>
        </li>
      @endif
      
      <li class="menu-item {{ Request::is('admin/category*') || Request::is('admin/sub-category*') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='bx bx-category me-3'></i>
            <div class="text-truncate" data-i18n="Front Pages">@lang('admin_dash.category')</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('admin/category') ? 'active' : '' }}">
                <a href="{{ url('admin/category') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.all-category')</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/sub-category') ? 'active' : '' }}">
                <a href="{{ url('admin/sub-category') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.sub-category')</div>
                </a>
            </li>
        </ul>
      </li>
    

      {{-- <li class="menu-item {{ Request::is('admin/category') ? 'active':''}}">
        <a href="{{ url('admin/category') }}" class="menu-link ">
          <i class='bx bx-category me-3'></i>
          <div class="text-truncate" data-i18n="Dashboards">Category</div>
         
        </a>
        
      </li>
      <li class="menu-item {{ Request::is('admin/sub-category') ? 'active':''}}">
        <a href="{{ url('admin/sub-category') }}" class="menu-link ">
          <i class='bx bx-category me-3'></i>
          <div class="text-truncate" data-i18n="Dashboards">Sub-Category</div>
         
        </a>
        
      </li> --}}
      <li class="menu-item {{ Request::is('admin/brands') ? 'active':''}}">
        <a href="{{ url('admin/brands') }}" class="menu-link ">
          <i class='bx bx-layer me-3'></i>
          <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.brands')</div>
         
        </a>
        
      </li>
      <li class="menu-item {{ Request::is('admin/sizes') ? 'active':''}}">
        <a href="{{ url('admin/sizes') }}" class="menu-link ">
          <i class='bx bx-font-size me-3' ></i>
          <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.sizes')</div>
         
        </a>
        
      </li>
      <li class="menu-item {{ Request::is('admin/colors') ? 'active':''}}">
        <a href="{{ url('admin/colors') }}" class="menu-link ">
          <i class='bx bxs-color me-3' ></i>
          <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.colors')</div>
         
        </a>
        
      </li>
      <li class="menu-item {{ Request::is('admin/sliders') ? 'active':''}}">
        <a href="{{ url('admin/sliders') }}" class="menu-link ">
          <i class='bx bx-slideshow me-3'></i>
          <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.sliders')</div>
         
        </a>
        
      </li>
      
      <li class="menu-item {{ Request::is('admin/orders') ? 'active':''}}">
        <a href="{{ url('admin/orders') }}" class="menu-link ">
          <i class='bx bx-cart-download me-3'></i>
          <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.orders')</div>
         
        </a>
      </li>
      <li class="menu-item {{ Request::is('admin/report') ? 'active':''}}">
        <a href="{{ url('admin/report') }}" class="menu-link ">
          <i class='bx bxs-report me-3'></i>
          <div class="text-truncate" data-i18n="Dashboards">Report</div>
         
        </a>
        
      </li>
      {{-- <li class="menu-item {{ Request::is('admin/discounts') ? 'active':''}}">
        <a href="{{ url('admin/discounts') }}" class="menu-link ">
          <i class='bx bxs-discount me-3' ></i>
          <div class="text-truncate" data-i18n="Dashboards">Discounts</div>
         
        </a>
        
      </li> --}}
      <li class="menu-item {{ Request::is('admin/products*') || Request::is('admin/products/create*') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='bx bxs-spreadsheet me-3'></i>
            <div class="text-truncate" data-i18n="Front Pages">@lang('admin_dash.products')</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('admin/products') ? 'active' : '' }}">
                <a href="{{ url('admin/products') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.products_all')</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/products/create') ? 'active' : '' }}">
                <a href="{{ url('admin/products/create') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.product_create')</div>
                </a>
            </li>
        </ul>
      </li>
      <li class="menu-item {{ Request::is('admin/coupons') ? 'active':''}}">
        <a href="{{ url('admin/coupons') }}" class="menu-link ">
          <i class='bx bxs-coupon me-3' ></i>
          <div class="text-truncate" data-i18n="Dashboards">Couons</div>
         
        </a>
        
      </li>
      <li class="menu-item {{ Request::is('/') ? 'active':''}}">
        <a href="{{ url('/') }}" class="menu-link ">
          <i class='menu-icon tf-icons bx bx-store'></i>
          <div class="text-truncate" data-i18n="Dashboards">@lang('admin_dash.frontpage')</div>
         
        </a>
        
      </li>
    </ul>
    
    

  </aside>