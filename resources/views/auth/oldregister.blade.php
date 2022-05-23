<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/jquery.animatedheadline.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/main.css')}}">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('public/angvo/assets/images/favicon.png')}}" type="image/png">

    <title>{{ENV('APP_NAME')}}</title>
 <style type="text/css">
        .pagination {
            justify-content: center;
        }
        .close span {float: right;}
        .toast-close-button{display: none!important;}
    </style>
</head>

<body>
<!-- ==========Preloader========== -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ==========Preloader========== -->

<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="{{asset('public/assets/images/account/account-bg.jpg')}}">
    <div class="container">
        @include('common.error')
        <div class="padding-top padding-bottom" style="padding-top:20px;padding-bottom:5px;">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">Sign Up</span>
                    <h2 class="title">{{ENV('APP_NAME')}}</h2>
                </div>
                <form class="account-form" id="sign_in" method="POST" action="{{route('custom_register')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email2">First Name<span>*</span></label>
                        <input type="text" class="@error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name" required autocomplete="off">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email2">Last Name<span>*</span></label>
                        <input name="last_name" type="text" class="@error('last_name') is-invalid @enderror" placeholder="Last Name" required autocomplete="off">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email2">Email<span>*</span></label>
                        <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Username" required autocomplete="off">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone<span>*</span></label>
                        <input type="tel" class="@error('phone') is-invalid @enderror" name="phone" placeholder="Phone/Mobile" required autocomplete="off">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pass3">Password<span>*</span></label>
                        <input type="password" placeholder="Password" name="password" id="pass3" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pass3">Password Confirmation<span>*</span></label>
                        <input type="password" placeholder="Password" name="password_confirmation" id="pass3" required>
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Sign Up">
                    </div>
                </form>
                <div class="option">
                    Already have an account? <a href="{{route('login')}}">Login now</a>
                </div>
                <!--  <div class="or"><span>Or</span></div>
                 <ul class="social-icons">
                     <li>
                         <a href="#0">
                             <i class="fab fa-facebook-f"></i>
                         </a>
                     </li>
                     <li>
                         <a href="#0" class="active">
                             <i class="fab fa-twitter"></i>
                         </a>
                     </li>
                     <li>
                         <a href="#0">
                             <i class="fab fa-google"></i>
                         </a>
                     </li>
                 </ul> -->
            </div>
        </div>
    </div>
</section>
<!-- ==========Sign-In-Section========== -->


<script src="{{asset('public/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/assets/js/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('public/assets/js/plugins.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/heandline.js')}}"></script>
<script src="{{asset('public/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('public/assets/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('public/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/assets/js/wow.min.js')}}"></script>
<script src="{{asset('public/assets/js/countdown.min.js')}}"></script>
<script src="{{asset('public/assets/js/odometer.min.js')}}"></script>
<script src="{{asset('public/assets/js/viewport.jquery.js')}}"></script>
<script src="{{asset('public/assets/js/nice-select.js')}}"></script>
<script src="{{asset('public/assets/js/main.js')}}"></script>

</body>

</html>
