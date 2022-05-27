<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Login | UTAS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset(env('PUBLIC_URL') . 'website/assets/images/favicon.png') }}"
        type="image/png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_URL') . 'login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset(env('PUBLIC_URL') . 'login_assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(env('PUBLIC_URL') . 'login_assets/css/main.css') }}">
    <!--===============================================================================================-->
    <style>
        .wrap-login100 {
            padding: 33px 130px 33px 95px;
        }

        @media (max-width: 576px) {
            .wrap-login100 {
                padding: 12px 15px 33px;
            }
        }

    </style>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" style="display: flex;align-items:center" data-tilt>
                    <a href="{{ url('/') }}"> <img
                            src="{{ asset(env('PUBLIC_URL') . 'website/assets/images/logo.png') }}" alt="IMG"></a>
                </div>

                <form class="account-form" id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
                        UTAS Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: adam@gmail.com">
                        <input class="input100 @error('email') is-invalid @enderror" type="text" name="email"
                            placeholder="Email" required autocomplete="off" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    @error('email')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password"
                            required="">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    @error('password')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="background-color: #ff5722;">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            If you don't have an account?
                        </span>
                        <a class="txt2" href="{{ url('register') }}">
                            Create Account
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset(env('PUBLIC_URL') . 'login_assets/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <!--===============================================================================================-->
    <script src="{{ asset(env('PUBLIC_URL') . 'login_assets/js/main.js') }}"></script>

</body>

</html>
