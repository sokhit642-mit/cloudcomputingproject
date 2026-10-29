<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags and styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Admin Login</title>
</head>

<body>
    <main class="form-signin w-100 m-auto">

        <form action="{{ route('adminLogin.submit') }}" method="POST">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <h1 class="h3 mb-3 fw-normal">Admin Login</h1>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
