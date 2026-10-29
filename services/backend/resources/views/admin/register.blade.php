<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Registration | HOMESPORT</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('admin-das/image-removebg-preview.png') }}" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

  <!-- Core & Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <style>
    :root {
      --primary-color: #696cff;
      --primary-hover: #5f61e6;
      --primary-light: rgba(105, 108, 255, 0.12);
      --primary-gradient: linear-gradient(135deg, #696cff 0%, #4f46e5 100%);
      --accent-gradient: linear-gradient(135deg, #0ea5e9 0%, #6366f1 100%);
      --dark-bg: #0f172a;
      --card-bg: #ffffff;
      --text-main: #334155;
      --text-muted: #64748b;
      --border-color: #e2e8f0;
    }

    body {
      font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background-color: #f8fafc;
      color: var(--text-main);
      min-height: 100vh;
      overflow-x: hidden;
    }

    .auth-wrapper {
      min-height: 100vh;
      display: flex;
    }

    /* Left Hero Side */
    .hero-side {
      background: radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.25) 0%, transparent 40%),
                  radial-gradient(circle at 90% 80%, rgba(14, 165, 233, 0.2) 0%, transparent 40%),
                  linear-gradient(160deg, #0b1120 0%, #111827 50%, #0f172a 100%);
      color: #ffffff;
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 3.5rem 3rem;
    }

    .hero-side::before {
      content: '';
      position: absolute;
      top: -20%;
      left: -20%;
      width: 140%;
      height: 140%;
      background: radial-gradient(circle, rgba(105, 108, 255, 0.08) 0%, transparent 60%);
      pointer-events: none;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.4rem 1rem;
      border-radius: 9999px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(8px);
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 0.03em;
      color: #c7d2fe;
    }

    .hero-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 2.5rem;
      font-weight: 800;
      line-height: 1.2;
      background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .feature-card {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      border-radius: 14px;
      padding: 1.25rem 1.5rem;
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      background: rgba(255, 255, 255, 0.08);
      transform: translateY(-2px);
      border-color: rgba(105, 108, 255, 0.4);
    }

    .feature-icon {
      width: 42px;
      height: 42px;
      border-radius: 10px;
      background: var(--primary-gradient);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      color: #ffffff;
      box-shadow: 0 4px 14px rgba(105, 108, 255, 0.35);
    }

    /* Right Form Side */
    .form-side {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2.5rem 1.5rem;
      background-color: #f8fafc;
    }

    .register-card {
      width: 100%;
      max-width: 520px;
      background: #ffffff;
      border-radius: 20px;
      padding: 2.5rem;
      box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.07),
                  0 0 0 1px rgba(226, 232, 240, 0.8);
      position: relative;
    }

    .brand-logo-wrap {
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      text-decoration: none;
    }

    .brand-logo-img {
      max-height: 44px;
      object-fit: contain;
    }

    .brand-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 800;
      font-size: 1.5rem;
      color: #0f172a;
      margin: 0;
      letter-spacing: -0.02em;
    }

    .brand-tag {
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--primary-color);
      background: var(--primary-light);
      padding: 0.15rem 0.5rem;
      border-radius: 6px;
    }

    /* Avatar Upload */
    .avatar-upload-wrap {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 1.75rem;
    }

    .avatar-preview-box {
      width: 105px;
      height: 105px;
      border-radius: 50%;
      position: relative;
      cursor: pointer;
      box-shadow: 0 6px 20px rgba(105, 108, 255, 0.2);
      border: 3px solid #ffffff;
      outline: 2px dashed #cbd5e1;
      outline-offset: 3px;
      transition: all 0.3s ease;
      background: #f1f5f9;
    }

    .avatar-preview-box:hover {
      outline-color: var(--primary-color);
      transform: scale(1.03);
    }

    .avatar-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
    }

    .avatar-badge-btn {
      position: absolute;
      bottom: -2px;
      right: -2px;
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: var(--primary-gradient);
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid #ffffff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      font-size: 1rem;
      transition: all 0.2s ease;
    }

    .avatar-preview-box:hover .avatar-badge-btn {
      background: var(--primary-hover);
      transform: scale(1.1);
    }

    .avatar-hint {
      font-size: 0.8rem;
      color: var(--text-muted);
      margin-top: 0.6rem;
      text-align: center;
    }

    /* Inputs */
    .form-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: #334155;
      margin-bottom: 0.4rem;
    }

    .input-group-custom {
      position: relative;
      display: flex;
      align-items: center;
      border: 1px solid #cbd5e1;
      border-radius: 10px;
      background-color: #ffffff;
      transition: all 0.2s ease;
    }

    .input-group-custom:focus-within {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(105, 108, 255, 0.18);
    }

    .input-group-custom.is-invalid {
      border-color: #ef4444;
      box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
    }

    .input-icon-lead {
      display: flex;
      align-items: center;
      justify-content: center;
      padding-left: 0.95rem;
      color: #94a3b8;
      font-size: 1.25rem;
    }

    .input-group-custom:focus-within .input-icon-lead {
      color: var(--primary-color);
    }

    .input-group-custom .form-control {
      border: none;
      box-shadow: none;
      padding: 0.65rem 0.85rem;
      font-size: 0.95rem;
      color: #0f172a;
      background: transparent;
    }

    .input-group-custom .form-control:focus {
      outline: none;
    }

    .toggle-password-btn {
      background: none;
      border: none;
      padding: 0 0.85rem;
      color: #94a3b8;
      cursor: pointer;
      display: flex;
      align-items: center;
      font-size: 1.25rem;
      transition: color 0.2s ease;
    }

    .toggle-password-btn:hover {
      color: var(--text-main);
    }

    /* Password Strength Meter */
    .strength-meter-wrap {
      margin-top: 0.4rem;
    }

    .strength-meter-bars {
      display: flex;
      gap: 4px;
      height: 4px;
      border-radius: 2px;
      overflow: hidden;
      background-color: #f1f5f9;
    }

    .strength-bar {
      flex: 1;
      height: 100%;
      border-radius: 2px;
      background-color: #e2e8f0;
      transition: background-color 0.3s ease;
    }

    .strength-label {
      font-size: 0.75rem;
      font-weight: 600;
      margin-top: 0.25rem;
      display: flex;
      justify-content: space-between;
      color: var(--text-muted);
    }

    /* Match Feedback */
    .match-feedback {
      font-size: 0.78rem;
      font-weight: 600;
      margin-top: 0.25rem;
      display: none;
    }

    .match-feedback.matched {
      display: block;
      color: #10b981;
    }

    .match-feedback.mismatched {
      display: block;
      color: #ef4444;
    }

    /* Submit Button */
    .btn-submit {
      background: var(--primary-gradient);
      color: #ffffff;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: 1rem;
      padding: 0.75rem 1.5rem;
      border-radius: 10px;
      border: none;
      box-shadow: 0 4px 15px rgba(105, 108, 255, 0.35);
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .btn-submit:hover {
      background: linear-gradient(135deg, #5b5ee6 0%, #4338ca 100%);
      color: #ffffff;
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(105, 108, 255, 0.45);
    }

    .btn-submit:active {
      transform: translateY(0);
    }

    .btn-submit:disabled {
      opacity: 0.65;
      cursor: not-allowed;
    }

    /* Back Home Pill */
    .back-home-link {
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      color: var(--text-muted);
      font-size: 0.85rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .back-home-link:hover {
      color: var(--primary-color);
      transform: translateX(-2px);
    }

    @media (max-width: 991.98px) {
      .hero-side {
        display: none;
      }
      .form-side {
        padding: 2rem 1rem;
      }
      .register-card {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="auth-wrapper container-fluid p-0">
    <div class="row g-0 w-100 min-vh-100">
      
      <!-- Left Column: Hero Showcase (Desktop) -->
      <div class="col-lg-6 col-xl-7 hero-side d-none d-lg-flex">
        <!-- Top Section -->
        <div>
          <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="{{ url('/') }}" class="brand-logo-wrap">
              <img src="{{ asset('front-assets/homesport-logo.png') }}" alt="HOMESPORT" class="brand-logo-img">
              <div>
                <h3 class="brand-title text-white mb-0">HOMESPORT</h3>
                <span class="hero-badge">Admin System</span>
              </div>
            </a>

            <a href="{{ url('/') }}" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1">
              <i class="bx bx-store-alt me-1"></i> Visit Store
            </a>
          </div>

          <div class="mt-5 pt-3">
            <span class="hero-badge mb-3">
              <i class="bx bxs-shield-check text-warning"></i> Secure Admin Access
            </span>
            <h1 class="hero-title mt-2">
              Empower Your Store Management.
            </h1>
            <p class="text-white-50 fs-5 mt-3" style="max-width: 540px;">
              Manage sports apparel, track customer orders in real time, configure promotions, and monitor analytics with the HOMESPORT administration panel.
            </p>
          </div>
        </div>

        <!-- Center Graphic -->
        <div class="text-center my-4">
          <img src="{{ asset('admin-das/img/boy-with-rocket-light.png') }}" alt="Management Portal" class="img-fluid" style="max-height: 290px; filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.35));">
        </div>

        <!-- Bottom Feature Cards -->
        <div class="row g-3">
          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon mb-2">
                <i class="bx bx-box"></i>
              </div>
              <h6 class="text-white mb-1 fw-bold">Inventory Control</h6>
              <p class="text-white-50 small mb-0">Full stock & product catalog management.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon mb-2" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                <i class="bx bx-receipt"></i>
              </div>
              <h6 class="text-white mb-1 fw-bold">Orders & Invoices</h6>
              <p class="text-white-50 small mb-0">Live tracking and KHQR billing integration.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon mb-2" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                <i class="bx bx-line-chart"></i>
              </div>
              <h6 class="text-white mb-1 fw-bold">Reports & PDF</h6>
              <p class="text-white-50 small mb-0">Automated sales reports and telemetry.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Registration Form -->
      <div class="col-12 col-lg-6 col-xl-5 form-side">
        <div class="register-card">
          
          <!-- Back Link (Mobile) -->
          <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ url('/') }}" class="back-home-link">
              <i class="bx bx-left-arrow-alt fs-5"></i> Back to Store
            </a>
            <span class="brand-tag">Admin Portal</span>
          </div>

          <!-- Header -->
          <div class="text-center mb-3">
            <a href="{{ url('/') }}" class="d-inline-block mb-2">
              <img src="{{ asset('front-assets/homesport-logo.png') }}" alt="HOMESPORT" style="height: 48px; object-fit: contain;">
            </a>
            <h3 class="fw-bold mb-1" style="font-family: 'Plus Jakarta Sans', sans-serif; color: #0f172a;">
              Create Admin Account
            </h3>
            <p class="text-muted small">
              Register a new administrative account with store management privileges.
            </p>
          </div>

          <!-- Validation Error Alert -->
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 p-3 mb-3 shadow-sm" role="alert">
              <div class="d-flex align-items-center gap-2 mb-1">
                <i class="bx bx-error-circle fs-5 text-danger"></i>
                <strong class="small">Please review the following errors:</strong>
              </div>
              <ul class="mb-0 ps-3 small">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <!-- Form -->
          <form action="{{ route('adminRegister.submit') }}" method="POST" enctype="multipart/form-data" id="adminRegisterForm" novalidate>
            @csrf

            <!-- Interactive Profile Avatar Upload -->
            <div class="avatar-upload-wrap">
              <div class="avatar-preview-box" id="avatarPreviewContainer" title="Click to upload profile photo">
                <img id="avatarPreviewImg" class="avatar-img" src="{{ asset('admin-das/img/avatars/1.png') }}" alt="Admin Avatar">
                <span class="avatar-badge-btn">
                  <i class="bx bx-camera"></i>
                </span>
              </div>
              <input type="file" id="imageInput" name="image" class="d-none" accept="image/png,image/jpeg,image/webp,image/gif">
              <div class="avatar-hint">
                <span class="fw-semibold text-dark">Click avatar</span> to upload photo <span class="text-muted">(JPG, PNG, max 2MB)</span>
              </div>
              <button type="button" class="btn btn-link btn-sm text-danger text-decoration-none py-0 d-none mt-1" id="removeAvatarBtn">
                <i class="bx bx-trash me-1"></i> Remove photo
              </button>
            </div>

            <!-- Full Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
              <div class="input-group-custom @error('name') is-invalid @enderror">
                <span class="input-icon-lead">
                  <i class="bx bx-user"></i>
                </span>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. John Doe" required autofocus autocomplete="name">
              </div>
              @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-3">
              <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
              <div class="input-group-custom @error('email') is-invalid @enderror">
                <span class="input-icon-lead">
                  <i class="bx bx-envelope"></i>
                </span>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="admin@homesport.com" required autocomplete="email">
              </div>
              @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
              <div class="input-group-custom @error('password') is-invalid @enderror">
                <span class="input-icon-lead">
                  <i class="bx bx-lock-alt"></i>
                </span>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••••••" required autocomplete="new-password">
                <button type="button" class="toggle-password-btn" id="togglePasswordBtn" aria-label="Toggle password visibility">
                  <i class="bx bx-hide" id="passwordIcon"></i>
                </button>
              </div>
              @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror

              <!-- Password Strength Meter -->
              <div class="strength-meter-wrap" id="strengthMeterWrap">
                <div class="strength-meter-bars">
                  <div class="strength-bar" id="strengthBar1"></div>
                  <div class="strength-bar" id="strengthBar2"></div>
                  <div class="strength-bar" id="strengthBar3"></div>
                  <div class="strength-bar" id="strengthBar4"></div>
                </div>
                <div class="strength-label">
                  <span id="strengthText">Password strength</span>
                  <span class="text-muted small">Min. 6 characters</span>
                </div>
              </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
              <div class="input-group-custom">
                <span class="input-icon-lead">
                  <i class="bx bx-check-shield"></i>
                </span>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="••••••••••••" required autocomplete="new-password">
                <button type="button" class="toggle-password-btn" id="toggleConfirmPasswordBtn" aria-label="Toggle password confirmation visibility">
                  <i class="bx bx-hide" id="confirmPasswordIcon"></i>
                </button>
              </div>
              <div class="match-feedback" id="matchFeedback"></div>
            </div>

            <!-- Terms & Privacy Agreement -->
            <div class="mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="termsCheck" required checked>
                <label class="form-check-label text-muted small" for="termsCheck">
                  I agree to the <a href="javascript:void(0);" class="text-decoration-none fw-semibold" style="color: var(--primary-color);">Administrator Security Guidelines</a> & store privacy policy.
                </label>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="d-grid mb-3">
              <button class="btn btn-submit w-100" type="submit" id="submitBtn">
                <i class="bx bx-user-plus fs-5"></i>
                <span>Register Admin Account</span>
              </button>
            </div>

            <!-- Link to Login -->
            <div class="text-center pt-2 border-top">
              <p class="text-muted small mb-0">
                Already have an admin account? 
                <a href="{{ route('adminLogin') }}" class="fw-bold text-decoration-none" style="color: var(--primary-color);">
                  Sign in here <i class="bx bx-right-arrow-alt align-middle"></i>
                </a>
              </p>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Toastr Configuration
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "4000",
        "extendedTimeOut": "1000"
      };

      @if(session('message'))
        toastr.success(@json(session('message')));
      @endif

      @if($errors->any())
        @foreach($errors->all() as $error)
          toastr.error(@json($error));
        @endforeach
      @endif

      // Avatar Preview Handling
      const avatarContainer = document.getElementById('avatarPreviewContainer');
      const imageInput = document.getElementById('imageInput');
      const avatarImg = document.getElementById('avatarPreviewImg');
      const removeBtn = document.getElementById('removeAvatarBtn');
      const defaultAvatar = "{{ asset('admin-das/img/avatars/1.png') }}";

      avatarContainer.addEventListener('click', () => imageInput.click());

      imageInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
          if (file.size > 2 * 1024 * 1024) {
            toastr.error('Profile photo must be less than 2MB.');
            imageInput.value = '';
            return;
          }
          const reader = new FileReader();
          reader.onload = function (evt) {
            avatarImg.src = evt.target.result;
            removeBtn.classList.remove('d-none');
          };
          reader.readAsDataURL(file);
        }
      });

      removeBtn.addEventListener('click', function () {
        imageInput.value = '';
        avatarImg.src = defaultAvatar;
        removeBtn.classList.add('d-none');
      });

      // Password Toggle Visibility
      const passwordInput = document.getElementById('password');
      const togglePasswordBtn = document.getElementById('togglePasswordBtn');
      const passwordIcon = document.getElementById('passwordIcon');

      togglePasswordBtn.addEventListener('click', function () {
        const isPassword = passwordInput.getAttribute('type') === 'password';
        passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
        passwordIcon.classList.toggle('bx-hide', !isPassword);
        passwordIcon.classList.toggle('bx-show', isPassword);
      });

      // Confirm Password Toggle Visibility
      const confirmPasswordInput = document.getElementById('password_confirmation');
      const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPasswordBtn');
      const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');

      toggleConfirmPasswordBtn.addEventListener('click', function () {
        const isPassword = confirmPasswordInput.getAttribute('type') === 'password';
        confirmPasswordInput.setAttribute('type', isPassword ? 'text' : 'password');
        confirmPasswordIcon.classList.toggle('bx-hide', !isPassword);
        confirmPasswordIcon.classList.toggle('bx-show', isPassword);
      });

      // Password Strength Meter
      const bar1 = document.getElementById('strengthBar1');
      const bar2 = document.getElementById('strengthBar2');
      const bar3 = document.getElementById('strengthBar3');
      const bar4 = document.getElementById('strengthBar4');
      const strengthText = document.getElementById('strengthText');

      function resetStrength() {
        [bar1, bar2, bar3, bar4].forEach(b => b.style.backgroundColor = '#e2e8f0');
        strengthText.textContent = 'Password strength';
        strengthText.style.color = 'var(--text-muted)';
      }

      passwordInput.addEventListener('input', function () {
        const val = passwordInput.value;
        if (!val) {
          resetStrength();
          checkPasswordMatch();
          return;
        }

        let score = 0;
        if (val.length >= 6) score++;
        if (val.length >= 10) score++;
        if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
        if (/[0-9]/.test(val) || /[^A-Za-z0-9]/.test(val)) score++;

        resetStrength();

        if (score === 1) {
          bar1.style.backgroundColor = '#ef4444';
          strengthText.textContent = 'Weak';
          strengthText.style.color = '#ef4444';
        } else if (score === 2) {
          bar1.style.backgroundColor = '#f59e0b';
          bar2.style.backgroundColor = '#f59e0b';
          strengthText.textContent = 'Fair';
          strengthText.style.color = '#f59e0b';
        } else if (score === 3) {
          bar1.style.backgroundColor = '#3b82f6';
          bar2.style.backgroundColor = '#3b82f6';
          bar3.style.backgroundColor = '#3b82f6';
          strengthText.textContent = 'Good';
          strengthText.style.color = '#3b82f6';
        } else if (score >= 4) {
          bar1.style.backgroundColor = '#10b981';
          bar2.style.backgroundColor = '#10b981';
          bar3.style.backgroundColor = '#10b981';
          bar4.style.backgroundColor = '#10b981';
          strengthText.textContent = 'Strong ✓';
          strengthText.style.color = '#10b981';
        }

        checkPasswordMatch();
      });

      // Real-time Confirm Password Match
      const matchFeedback = document.getElementById('matchFeedback');

      function checkPasswordMatch() {
        const p1 = passwordInput.value;
        const p2 = confirmPasswordInput.value;

        if (!p2) {
          matchFeedback.className = 'match-feedback';
          matchFeedback.textContent = '';
          return;
        }

        if (p1 === p2) {
          matchFeedback.className = 'match-feedback matched';
          matchFeedback.innerHTML = '<i class="bx bx-check-circle me-1"></i> Passwords match';
        } else {
          matchFeedback.className = 'match-feedback mismatched';
          matchFeedback.innerHTML = '<i class="bx bx-x-circle me-1"></i> Passwords do not match';
        }
      }

      confirmPasswordInput.addEventListener('input', checkPasswordMatch);

      // Form Submit Loading Feedback
      const form = document.getElementById('adminRegisterForm');
      const submitBtn = document.getElementById('submitBtn');

      form.addEventListener('submit', function () {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Creating Admin Account...';
      });
    });
  </script>
</body>

</html>
