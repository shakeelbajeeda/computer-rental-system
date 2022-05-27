<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Register | UTAS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('public/webiste/assets/images/favicon.png') }}" type="image/png">
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
                <form class="account-form" id="sign_in" method="POST" action="{{ route('register') }}"
                    style="width:100%;">
                    @csrf
                    <span class="login100-form-title">
                        UTAS Register
                    </span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input"
                                data-validate="Valid first name is required: Mehar">
                                <input class="input100 @error('email') is-invalid @enderror" type="text"
                                    name="name" placeholder="Name" required autocomplete="off"
                                    value="{{ old('name') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-name" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('name')
                                <span style="display: block;" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input"
                                data-validate="Valid phone is required: +92324 - 4448940">
                                <input class="input100 @error('email') is-invalid @enderror" type="text" name="phone"
                                    placeholder="Phone" required autocomplete="off" value="{{ old('phone') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('phone')
                                <span style="display: block;" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input"
                                data-validate="Valid email is required: adam@gmail.com">
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
                        </div>
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Password Confirmation is required">
                                <input class="input100" type="password" name="password_confirmation"
                                    placeholder="Password Confirmation" required="">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <span style="display: block;" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input">
                                <select class="input100" name="city" aria-label="Default select example">
                                    <option value="Hobart">Hobart</option>
                                    <option value="Launceston">Launceston</option>
                                  </select>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('city')
                                <span style="display: block;" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="address"
                                    placeholder="Address" required autocomplete="off" value="{{ old('address') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('address')
                                <span style="display: block;" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-check ml-5 mt-3">
                                <input class="form-check-input" type="checkbox" name="is_student" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Is Student
                                </label>
                              </div>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="background-color: #ff5722;width: 265px;">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Already Member?
                        </span>
                        <a class="txt2" href="{{ url('login') }}">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('public/login_assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('public/login_assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('public/login_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('public/login_assets/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('public/login_assets/vendor/tilt/tilt.jquery.min.js') }}"></script>
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
    <script src="{{ asset('public/login_assets/js/main.js') }}"></script>

</body>

</html>
