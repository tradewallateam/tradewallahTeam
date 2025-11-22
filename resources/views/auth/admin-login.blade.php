<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Tradingwallah | Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login/admin/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body>
    <div class="login-form">
        <div class="text">LOGIN</div>
        <form action="{{ route('auth.admin.login.submit') }}" method="POST">
            @csrf
            <div class="field">
                <div class="fas fa-envelope"></div>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Enter you email id">
            </div>
            @error('email')
                <p style="color: red; padding:0px; text-align:left">{{ $message }}</p>
            @enderror
            <div class="field">
                <div class="fas fa-lock"></div>
                <input type="password" placeholder="Password" name="password" id="password"
                    value="{{ old('password') }}">
            </div>
            @error('password')
                <p style="color: red;d padding:0px; text-align:left">{{ $message }}</p>
            @enderror
            <button>LOGIN</button>
            <div class="link">
                Not a member?
                <a href="#">Signup now</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timerProgressBar: true,
                showConfirmButton: true
            });
        </script>
    @endif
    @if (session('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: '{{ session('failed') }}',
                timerProgressBar: true,
                showConfirmButton: true
            });
        </script>
    @endif
</body>

</html>
