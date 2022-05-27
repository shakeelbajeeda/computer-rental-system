@extends('layouts.angvo')
@section('content')
    <style>
        .c_title {
            height: 71px;
            overflow: hidden;
        }

        .pagination {
            justify-content: center;
        }

        /*
    *
    * ==========================================
    * FOR DEMO PURPOSE
    * ==========================================
    *
    */
        .blockUI {
            z-index: 1100 !important
        }

        .shop-collection-area {
            background: #eecda3;
            background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
            background: linear-gradient(to right, #eecda3, #ff5722);
            min-height: 100vh;
        }

        .custom_btn {
            width: 221px;
            float: right;
            background: #ff5722;
            border-color: #ff5722;
        }

        .stripe_btn {
            width: 221px;
            float: right;
            background: #ff5722;
            border-color: #ff5722;
        }

        @media screen and (max-width: 712px) {
            .pl-4, .px-4 {
                padding: 0px !important;
            }

            #button-addon3 {
                border-radius: 0px !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .coupon_div {
                border-radius: 0px !important;
            }

            h1 {
                font-size: 22px;
            }

            /*.digit-group2{margin-left: 25px;}*/
            .escrow-form-button {
                float: right;
                padding-top: 15px;
                padding-bottom: 15px;
                padding: 15px;
            }
        }

        .bank_detail {
            background: #c37a221f;
            padding: 10px;
            border-radius: 10px;
        }

        .hideable {
            display: none;
        }
    </style>
    <style type="text/css">
        .verify_now {
            margin-right: 10px;
            text-align: center;
        }

        .escrow_payment {
            text-align: center;
        }

        .b_info {
            border: 1px solid #796c6c29;
            padding: 15px;
        }

        @media screen and (max-width: 512px) {
            .escrow_payment {
                width: 100%;
            }

            .verify_now {
                width: 100%;
                margin-right: 0px;
                margin-top: 5px;
            }

            .form_control {
                width: 44px;
                height: 44px;
                margin-left: 0px !important;
                margin-right: 6px !important;
            }

        }
    </style>

    <style type="text/css">

        .gm-style-iw-d {
            height: auto;
            width: 290px
        }

        .gm-style-iw-d img {
            margin-bottom: 15px;
            max-height: 175px;
            max-width: 270px;
            width: 100%
        }

        .gm-style-iw-d h5 {
            font-size: 14px;
            font-family: Roboto, sans-serif;
            color: #7859fd;
            line-height: 1.2
        }

        .gm-style-iw-d h4 {
            font-size: 16px;
            font-family: Roboto, sans-serif;
            color: #484848;
            font-weight: 700;
            line-height: 1.2
        }

        .gm-style-iw-d p {
            font-size: 14px;
            font-family: Roboto, sans-serif;
            color: #484848;
            line-height: 1.2
        }

        .gm-style-iw-d p span {
            margin-right: 10px
        }

        .navbar_brand img {
            max-width: 150px
        }

        .form-wizard {
            font-size: 16px;
            font-weight: 300;
            color: #888;
            padding-top: 0;
            padding-bottom: 50px;
            line-height: 30px
        }

        .form-wizard a,
        .form-wizard a:focus,
        .form-wizard a:hover {
            color: #ea2803;
            text-decoration: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s
        }

        .form-wizard table tr th {
            font-weight: 400
        }

        .form-wizard img {
            max-width: 100%
        }

        .form-wizard ::-moz-selection {
            background: #ea2803;
            color: #fff;
            text-shadow: none
        }

        .form-control option:checked,
        .form-control option:hover {
            box-shadow: 0 0 10px 100px #ea2803 inset
        }

        .form-control:focus {
            outline: 0;
            background: #fff;
            border: 1px solid #ccc;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .form-control:-moz-placeholder {
            color: #888
        }

        .form-control:-ms-input-placeholder {
            color: #888
        }

        .form-control::-webkit-input-placeholder {
            color: #888
        }

        .form-wizard label {
            font-weight: 300;
            color: #000;
            margin-bottom: 5px
        }

        .form-wizard label span {
            color: #ea2803
        }

        .form-wizard .btn {
            min-width: 80px;
            height: 35px;
            margin: 0;
            padding: 0 10px;
            vertical-align: middle;
            border: 0;
            font-family: Roboto, sans-serif;
            font-size: 15px;
            font-weight: 300;
            line-height: 35px;
            color: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            text-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s
        }

        .form-wizard .btn:hover {
            background: #6442f6 !important;
            color: #fff
        }

        .form-wizard .btn:active {
            outline: 0;
            background: #6442f6;
            color: #fff;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .form-wizard .btn.active:focus,
        .form-wizard .btn:active:focus,
        .form-wizard .btn:focus {
            outline: 0;
            background: #6442f6;
            color: #fff
        }

        .form-wizard .btn.btn-next {
            background: #7859fd
        }

        .form-wizard .btn.btn-next.active:focus,
        .form-wizard .btn.btn-next:active:focus,
        .form-wizard .btn.btn-next:focus {
            background: #6442f6
        }

        .form-wizard .btn.btn-submit,
        .form-wizard .btn.btn-submit.active:focus,
        .form-wizard .btn.btn-submit:active:focus,
        .form-wizard .btn.btn-submit:focus {
            background: #6442f6
        }

        .form-wizard .btn.btn-cancel,
        .form-wizard .btn.btn-cancel:focus,
        .form-wizard .btn.btn-cancel:hover,
        .form-wizard .btn.btn-previous,
        .form-wizard .btn.btn-previous.active:focus,
        .form-wizard .btn.btn-previous:active:focus,
        .form-wizard .btn.btn-previous:focus {
            background: #bbb
        }

        .form-wizard .success h3 {
            color: #4f8a10;
            text-align: center;
            margin: 20px auto !important
        }

        .form-wizard .success .success-icon {
            color: #4f8a10;
            font-size: 100px;
            border: 5px solid #4f8a10;
            border-radius: 100px;
            text-align: center !important;
            width: 110px;
            margin: 25px auto
        }

        .form-wizard .progress-bar {
            background-color: #ea2803
        }

        .form-wizard-steps {
            margin: auto;
            overflow: hidden;
            position: relative
        }

        .form-wizard-progress {
            position: absolute;
            top: 36px;
            left: 0;
            width: 100%;
            height: 0;
            background: #ea2803
        }

        .form-wizard-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 0;
            background: #ea2803
        }

        .form-wizard-tolal-steps-3 .form-wizard-step {
            position: relative;
            float: left;
            width: 33.33%;
            padding: 0 5px
        }

        .form-wizard-tolal-steps-4 .form-wizard-step {
            position: relative;
            float: left;
            padding-right: 20px
        }

        .form-wizard-tolal-steps-5 .form-wizard-step {
            position: relative;
            float: left;
            width: 20%;
            padding: 0 5px
        }

        .form-wizard-step-icon {
            display: inline-block;
            width: 28px;
            height: 28px;
            background: #efefef;
            font-size: 14px;
            margin-right: 3px;
            text-align: center;
            color: #777;
            line-height: 28px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%
        }

        .form-wizard-step.activated .form-wizard-step-icon {
            background: #ea2803;
            border: 1px solid #fff;
            color: #fff;
            line-height: 28px;
            text-align: center
        }

        .form-wizard-step.active .form-wizard-step-icon {
            background: #7859fd;
            border: 1px solid #fff;
            color: #fff;
            line-height: 28px
        }

        .form-wizard-step.activated .form-wizard-step-icon {
            background: #7859fd
        }

        .form-wizard-step p {
            color: #000;
            margin-bottom: 0;
            display: inline-block
        }

        .form-wizard-step.activated p {
            color: #000
        }

        .form-wizard-step.active p {
            color: #7859fd
        }

        .form-wizard fieldset {
            display: none;
            text-align: left;
            border: 0 !important
        }

        .form-wizard-buttons {
            text-align: right
        }

        .form-wizard .input-error {
            border-color: #ea2803
        }

        section.main-escrow {
            padding-top: 30px
        }

        .escrow-breadcrumbs p i {
            font-size: 10px
        }

        .escrow-breadcrumbs p {
            opacity: .8;
            color: #000
        }

        .escrow-breadcrumbs h2 {
            color: #07171d;
            font-size: 24px
        }

        .escrow-steps-outer {
            background: #fff;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 6px #33415007;
            border: 1px solid #efefef;
            border-radius: 4px;
            justify-content: space-between;
            margin-top: 15px
        }

        .escrow-steps {
            display: flex;
            align-items: center
        }

        .escrow-steps-content {
            display: flex;
            align-items: center;
            padding-right: 15px
        }

        .escrow-steps-content.escrow-step-disable span {
            background: #efefef;
            color: #b0b4b6;
            font-weight: 500
        }

        .escrow-steps-content.escrow-step-disable i,
        .escrow-steps-content.escrow-step-disable p {
            color: #b0b4b6
        }

        .escrow-steps-content p {
            margin: 0;
            padding: 0 4px;
            color: #7859fd;
            margin: 0;
            font-size: 13px
        }

        .escrow-steps-content span {
            background: #7859fd;
            border-radius: 50%;
            height: 22px;
            width: 22px;
            text-align: center;
            line-height: 24px;
            color: #fff;
            font-size: 14px
        }

        .escrow-steps-content i {
            color: #7859fd;
            font-size: 10px
        }

        button.escrow-step-btn {
            background: #7859fd 0 0 no-repeat padding-box;
            border-radius: 4px;
            border: 0;
            padding: 3px 20px;
            color: #fff
        }

        .escrow-note {
            background: #fff 0 0 no-repeat padding-box;
            box-shadow: 0 2px 6px #33415007;
            border: 1px solid #efefef;
            border-radius: 8px;
            padding: 20px;
            margin-top: 15px;
            position: relative
        }

        .escrow-note:before {
            position: absolute;
            content: "";
            top: 30px;
            left: -8px;
            width: 16px;
            height: 16px;
            background: #fff;
            transform: rotate(45deg);
            border: 1px solid #efefef;
            z-index: -1
        }

        .escrow-note p {
            color: #272727;
            opacity: .76
        }

        .escrow-note h2 {
            font-size: 22px;
            color: #272727
        }

        .escrow-basic-detail {
            background: #fff 0 0 no-repeat padding-box;
            box-shadow: 0 2px 6px #33415007;
            border: 1px solid #efefef;
            border-radius: 8px;
            padding: 20px;
            margin-top: 15px
        }

        button:focus,
        input:focus {
            outline: 0 !important
        }

        .escrow-basic-detail p {
            color: #07171d;
            font-size: 14px
        }

        .escrow-basic-detail h3 {
            font-size: 18px;
            font-weight: 500;
            color: #334150
        }

        .escrow-form-fields {
            padding-bottom: 10px
        }

        .escrow-form-fields label {
            width: 100%;
            margin-bottom: 5px;
            color: #07171d;
            font-size: 14px
        }

        .escrow-form-fields input,
        .escrow-form-fields select {
            width: 100%;
            border: 1px solid #e4e4e4;
            border-radius: 4px;
            height: 35px;
            padding: 0 10px
        }

        .escrow-form-fields input::placeholder,
        .escrow-form-fields select {
            opacity: .65;
            color: #07171d;
            font-size: 13px
        }

        .escrow-input-file input {
            width: 100%;
            height: 100%;
            position: absolute;
            opacity: 0
        }

        .escrow-input-file {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 130px
        }

        .escrow-input-file {
            position: relative;
            border: 1px dashed #e4e4e4;
            border-radius: 4px
        }

        .escrow-input-file p {
            font-size: 12px;
            color: #5a607f;
            padding-top: 10px;
            margin-bottom: 0
        }

        .escrow-input-file button {
            border: 1px solid #d7dbec;
            border-radius: 4px;
            background: 0 0;
            font-size: 14px;
            padding: 5px 10px;
            color: #7859fd
        }

        .escrow-form-button {
            float: right;
            padding-top: 15px
        }

        button.escrow-form-button1 {
            background: #fff;
            border: 1px solid #d7dbec;
            border-radius: 4px;
            color: #7859fd;
            padding: 2px 20px
        }

        button.escrow-form-button2 {
            background: #ff5722 0 0 no-repeat padding-box;
            border-radius: 4px;
            border: 1px solid #ff5722;
            color: #fff;
            padding: 2px 20px;
            margin-left: 5px;
        }

        .escrow-form-radio-btns {
            padding-left: 15px;
            margin: 5px 0
        }

        label {

            text-transform: capitalize;
        }

        .input-group-text {
            background: white;
            height: 35px;
        }

        .form_control {
            width: 44px;
            height: 44px;
            margin-left: 17px;
            margin-right: 15px;
            display: block;
            background: #6c757d0d;
            /* width: 18%; */
            /* height: calc(1.5em + .75rem + 2px); */
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            /* background-color: #fff; */
            /* background-clip: padding-box; */
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            text-align: center;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .preview_div {
            padding: 10px;
            padding-bottom: 27px;
            border: 1px solid #d4b7b740;
            box-sizing: border-box;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        /*.t2 .select2-container--default .select2-selection--single {
            background-color: #fff!important;
            border: 1px solid #fff!important;
        }*/
        .t2 .selectize-input {
            width: 138px;
            margin-top: 8px;
            margin-left: 0px;
            border-top: none;
            border-left: none;
            margin-right: 0px;
            border-right: none;
        }

        .selectize-input {
            height: 0px !important
        }

        /*.selectize-input .item{    margin-bottom: -20px!important;
            position: absolute;}*/
    </style>
    <?php
    $cart = \Cart::content();
    $subtotal = \Cart::content()->sum('price');
    if (session()->has('coupon_id') and session()->has('coupon_discount')) {
        $coupon_discount = session()->get('coupon_discount');
    } else {
        $coupon_discount = 0;
    }
    $subtotal = round($usd_to_pkr * $subtotal);
    $total = round($subtotal - $coupon_discount);
    ?>
    <!--====== PAGE TITLE PART START ======-->
    <section class="banner-area page-title bg_cover"
             style="background-image: url({{asset('public/angvo/assets/images/banners/shopping_cart_banner.jpg')}})">
        <div class="banner-bg">
            <div class="container">
                <div class="row">
                <!--   <div class="col-lg-12">
                        <div class="page-title-content">
                            <h3 class="title">Checkout</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                </ol>
                            </nav>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="banner-shape-1">
        </div>
        <div class="banner-shape-2">
            <img src="{{asset('public/angvo/assets/images/banner-shape-1.png')}}" alt="">
        </div>
        <div class="banner-shape-3">
            <img src="{{asset('public/angvo/assets/images/banner-shape-2.png')}}" alt="">
        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SERVICES PRICING PART START ======-->
    @if(isset($cart) and sizeof($cart)> 0)
        <section class="shop-collection-area pt-30 pb-130 them_bg_color">
            <div class="container">
                <div class="px-4 px-lg-0">
                    <!-- For demo purpose -->
                    <div class="container text-white py-5 text-center">
                        <h3 class="display-5" style="color: white;">Checkout</h3>
                        </p>
                    </div>
                    <!-- End -->

                    <div class="pb-5">
                        <div class="container-fluid">
                            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                                <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                                        Services
                                    </div>
                                    @if(isset($cart) and sizeof($cart)>0)
                                        <br>
                                        <ul class="list-unstyled mb-4" data-2x="Here 1">
                                            @foreach($cart as $key=> $c)
                                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                            class="text-muted">{{$c->name}} @if($c->options->sub_service_title != '')
                                                            ( {{$c->options->sub_service_title}} ) @endif
                                                        <span> - {{$c->options->package}}</span></strong><strong>{{$c->price}}
                                                        USD</strong></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon
                                        code
                                    </div>
                                    <div class="p-4">
                                        <p class="font-italic mb-4">If you have a coupon code, please enter it in the
                                            box below</p>
                                        <form method="post" action="{{route('validate_coupon')}}">
                                            @csrf
                                            <div class="input-group mb-4 border rounded-pill p-2 coupon_div">
                                                <input name="code" type="text" placeholder="Enter Coupon"
                                                       aria-describedby="button-addon3" class="form-control border-0"
                                                       required="">
                                                <div class="input-group-append border-0">
                                                    <button id="button-addon3" type="submit"
                                                            class="btn btn-dark px-4 rounded-pill"><i
                                                                class="fa fa-gift mr-2"></i>Apply coupon
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order
                                        summary
                                    </div>
                                    <div class="p-4">
                                        <ul class="list-unstyled mb-4">
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                        class="text-muted">Order Subtotal </strong><strong>{{$subtotal}}
                                                    PKR</strong></li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                        class="text-muted">Coupon
                                                    Discount</strong><strong>{{$coupon_discount}} PKR</strong></li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                        class="text-muted">Total</strong>
                                                <h5 class="font-weight-bold">{{number_format($total)}} PKR</h5>
                                            </li>

                                            <?php

                                            $USD = App\Setting::where('type', 'usd_to_pkr')->first()->value;

                                            ?>

                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                        class="text-muted">Total USD </strong>

                                                <h5 class="font-weight-bold">{{$total/$USD}} USD</h5>
                                                {{--                                                <h5 class="font-weight-bold">{{number_format($total/$USD)}} USD</h5>--}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                                <div class="col-md-12">
                                    <h4 style="text-align: center;">Payment Method</h4>
                                    <label style="cursor: pointer;" onclick="validate_method('Credit Card');">
                                        <input type="radio" name="payment_method" value="Credit Card" checked="checked">
                                        By Credit Card
                                    </label>
                                    <span id="credit_cart_note" style="color:red;display: none;">Note : Credit card payment method is  not available now. It will be available soon!</span>
                                    <br>
                                    <label onclick="validate_method('Bank Deposit');">
                                        <input type="radio" name="payment_method"
                                               value="Bank Deposit"> By Bank Deposit
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <div class="row" id="bank_detail_div" >
                                        <div class="col-md-12">
                                            <p style="background: #ebdbc6;
    padding: 10px;
    border-radius: 10px; text-align: center;"><strong> Please desposit <span style="color: #ff5722;font-size:20px;">{{number_format($total)}}
                                                        PKR </span> in any of the following bank accounts </strong></p>
                                        </div>
                                        @if(isset($banks) and sizeof($banks))
                                            @foreach($banks as $b)
                                                <div class="col-md-4" >
                                                    <br>
                                                    <p class="bank_detail" style="display:none;">
                                                        <strong>Account Title: </strong>{{$b->account_title}}
                                                        <br>
                                                        <strong>Account Number: </strong> {{$b->account_no}}
                                                        <br>
                                                        <strong>Bank: </strong> {{$b->bank_name}}
                                                        <br>
                                                    </p>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-md-12">
                                                <h4 style="text-align: center;">No Bank Found</h4>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @if(!auth()->check())
                                <!-- login form starts here -->
                                    <div class="col-md-12">
                                        <br>
                                        <h4 style="margin-top: 10px;">Login / Signup</h4>
                                        <br>

                                        <form role="form" action="javascript:void(0);" method="post"
                                              class="require-validation"
                                              data-cc-on-file="false"
                                              data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                              id="payment-form">

                                            <div class="row">
                                                <div class="col-md-4 hideable">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control " name="first_name"
                                                           required="">
                                                </div>
                                                <div class="col-md-4 hideable">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control " name="last_name"
                                                           required="">
                                                </div>
                                                <div class="col-md-4 hideable">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control " name="phone" required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <br>
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" name="email" required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <br>
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                           required="">
                                                </div>
                                                <div class="col-md-6 hideable">
                                                    <label>Password Confirmation</label>
                                                    <input type="password" class="form-control "
                                                           name="password_confirmation" required="">
                                                </div>

                                                <div class="col-md-12">
                                                    <br>
                                                    <label><input id="create_checkbox" type="checkbox" name="is_signup"
                                                                  value="1" onclick="toggle_div(this);"> Create
                                                        account?</label>
                                                </div>


                                                <div class="col-md-12 PaymentDetailsDiv">
                                                    <br/>

                                                    <h4 align="center">Payment Details</h4>
                                                    <br/>


                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">

                                                                <div class='col-xs-12 form-group required'>

                                                                    <label class='control-label'>Name on Card <span
                                                                                class="text-danger">*</span></label>
                                                                    <input

                                                                            class='form-control' size='4' type='text'
                                                                            id="card_holder_name" placeholder="Name on Card">

                                                                    <span id="error_card_holder_name" class="text-danger"></span>


                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">

                                                            <div class="form-group">
                                                                <label>Card Number <span
                                                                            class="text-danger">*</span></label>
                                                                <input type="text" name="card_holder_number"
                                                                       id="card_holder_number" class="form-control"
                                                                       placeholder="1234 5678 9012 3456" maxlength="20"
                                                                       onkeypress=""/>
                                                                <span id="error_card_number" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Expiry Month <span
                                                                            class="text-danger">*</span></label>
                                                                <input type="text" name="card_expiry_month"
                                                                       id="card_expiry_month" class="form-control"
                                                                       placeholder="MM" maxlength="2"
                                                                       onkeypress="return only_number(event);"/>
                                                                <span id="error_card_expiry_month"
                                                                      class="text-danger"></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Expiry Year <span
                                                                            class="text-danger">*</span></label>
                                                                <input type="text" name="card_expiry_year"
                                                                       id="card_expiry_year" class="form-control"
                                                                       placeholder="YYYY" maxlength="4"
                                                                       onkeypress="return only_number(event);"/>
                                                                <span id="error_card_expiry_year"
                                                                      class="text-danger"></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>CVC <span
                                                                            class="text-danger">*</span></label>
                                                                <input type="text" name="card_cvc" id="card_cvc"
                                                                       class="form-control" placeholder="123"
                                                                       maxlength="4"
                                                                       onkeypress="return only_number(event);"/>
                                                                <span id="error_card_cvc" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                </div>





                                                <div class="col-md-12">
                                                    <br>
                                                    <button class="btn btn-dark rounded-pill py-2 btn-block custom_btn"
                                                            type="button" onclick="do_checkout(this);"
                                                            style="display:none;">Confirm Order
                                                    </button>

                                                    <button class="btn btn-dark rounded-pill py-2 btn-block  stripe_btn"
                                                            type="button">Confirm Order
                                                    </button>

                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                    <!-- login form ends here -->
                                @else

                                    <form role="form" action="javascript:void(0);" method="post"
                                          class="require-validation"
                                          data-cc-on-file="false"
                                          data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                          id="payment-form">

                                        <div class="col-md-12 PaymentDetailsDiv">
                                            <br/>

                                            <h4 align="center">Payment Details</h4>
                                            <br/>


                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <div class='col-xs-12 form-group required'>

                                                            <label class='control-label'>Name on Card <span
                                                                        class="text-danger">*</span> </label>
                                                            <input

                                                                    class='form-control' size='4' type='text'
                                                                    id="card_holder_name" placeholder="Name on Card">

                                                            <span id="error_card_holder_name" class="text-danger"></span>


                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label>Card Number <span
                                                                    class="text-danger">*</span></label>
                                                        <input type="text" name="card_holder_number"
                                                               id="card_holder_number" class="form-control"
                                                               placeholder="1234 5678 9012 3456" maxlength="20"
                                                               onkeypress=""/>
                                                        <span id="error_card_number" class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Expiry Month <span
                                                                    class="text-danger">*</span></label>
                                                        <input type="text" name="card_expiry_month"
                                                               id="card_expiry_month" class="form-control"
                                                               placeholder="MM" maxlength="2"
                                                               onkeypress="return only_number(event);"/>
                                                        <span id="error_card_expiry_month"
                                                              class="text-danger"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Expiry Year <span
                                                                    class="text-danger">*</span></label>
                                                        <input type="text" name="card_expiry_year"
                                                               id="card_expiry_year" class="form-control"
                                                               placeholder="YYYY" maxlength="4"
                                                               onkeypress="return only_number(event);"/>
                                                        <span id="error_card_expiry_year"
                                                              class="text-danger"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>CVC <span
                                                                    class="text-danger">*</span></label>
                                                        <input type="text" name="card_cvc" id="card_cvc"
                                                               class="form-control" placeholder="123"
                                                               maxlength="4"
                                                               onkeypress="return only_number(event);"/>
                                                        <span id="error_card_cvc" class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                        </div>

                                    </form>


                                    <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-dark rounded-pill py-2 btn-block custom_btn"
                                                type="button" onclick="do_checkout(this);" style="display:none;">Confirm
                                            Order
                                        </button>

                                        <button class="btn btn-dark rounded-pill py-2 btn-block  stripe_btn"
                                                type="button">Confirm Order
                                        </button>
                                    </div>

                                @endif
                            </div>
                        </div>
                        <!-- end containter fluid -->
                    </div>
                </div>
        </section>
    @else
        <section class="shop-collection-area pt-30 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h3>Please add service to the cart first</h3>
                        <center>
                            <br><br>
                            <div class="input-group-append border-0">
                                <a href="{{route('services')}}" class="btn btn-dark">
                                    Go Back
                                </a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!--====== SERVICES PRICING PART ENDS ======-->

    <!-- email otp modal -->
    <!-- Modal -->
    <div class="modal fade" id="email_otp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!--   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div> -->
                <div class="modal-body" style="margin:0px;padding:0px;">
                    <div class="container-fluid" style="padding:0px;">
                        <div class="col-md-12" style="background: rgb(243 240 255);
    height: 116px;">
                            <center>
                                <i class="fa fa-envelope" style="    color: black;
    font-size: 70px;
    padding-top: 21px;"></i>
                            </center>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="card py-3 px-4"
                                         style="margin-bottom:0px; padding-left:1.5rem!important; padding-right: 1.5rem!important">
                                        <h5 class="m-0"><strong>Verify Email</strong></h5><span class="mobile-text">Check your Email. We've sent you the 6 digits OTP code at  <b
                                                    class="text-danger" style="color:blue;font-weight:100;"
                                                    id="chk_email"></b></span>
                                        <form class="digit-group2" data-group-name="digits" data-autosubmit="false"
                                              autocomplete="off">
                                            <div class="d-flex flex-row mt-2">
                                                <form id="email_otp_form">
                                                    <input type="number" class="form-control form_control verify_email"
                                                           autofocus="" id="digit-1" name="digit-1" data-next="digit-2">
                                                    <input type="number" class="form-control form_control verify_email"
                                                           id="digit-2" name="digit-2" data-next="digit-3"
                                                           data-previous="digit-1">
                                                    <input type="number" class="form-control form_control verify_email"
                                                           id="digit-3" name="digit-3" data-next="digit-4"
                                                           data-previous="digit-2">
                                                    <input type="number" class="form-control form_control verify_email"
                                                           id="digit-4" name="digit-4" data-next="digit-5"
                                                           data-previous="digit-3">
                                                    <input type="number" class="form-control form_control verify_email"
                                                           id="digit-5" name="digit-5" data-next="digit-6"
                                                           data-previous="digit-4">
                                                    <input type="number" class="form-control form_control verify_email"
                                                           id="digit-6" name="digit-6" data-previous="digit-5"
                                                           data-next="digit-111">
                                                </form>
                                            </div>


                                            <div class="text-left mt-2"><span
                                                        class="mobile-text">Don't get the code? </span> <span
                                                        class="text-danger cursor" onclick="resend_otp(this);"
                                                        style="cursor:pointer;"> Resend</span></div>

                                            <div class="escrow-form-button">
                                                <button class="escrow-form-button1 text-danger" data-dismiss="modal"
                                                        onclick="resend_otp2(this);">Cancel
                                                </button>
                                                <button type="button" onclick="verify_email(this);"
                                                        class="escrow-form-button2 float-right pull-right"
                                                        style="display:block!important;">Confirm
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-primary">Save changes</button>
                 </div> -->
            </div>
        </div>
    </div>
    <!-- email otp modal ends here -->
@endsection
@section('footer_scripts')

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
    <script>

        // var $form = $(".require-validation");

        // $('form.require-validation').bind('submit', function(e) {
        //     var $form         = $(".require-validation"),
        //         inputSelector = ['input[type=email]', 'input[type=password]',
        //             'input[type=text]', 'input[type=file]',
        //             'textarea'].join(', '),
        //         $inputs       = $form.find('.required').find(inputSelector),
        //         $errorMessage = $form.find('div.error'),
        //         valid         = true;
        //     $errorMessage.addClass('hide');
        //
        //     $('.has-error').removeClass('has-error');
        //     $inputs.each(function(i, el) {
        //         var $input = $(el);
        //         if ($input.val() === '') {
        //             $input.parent().addClass('has-error');
        //             $errorMessage.removeClass('hide');
        //             e.preventDefault();
        //         }
        //     });
        //
        //     if (!$form.data('cc-on-file')) {
        //         e.preventDefault();
        //         Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        //         Stripe.createToken({
        //             number: $('#card_holder_number').val(),
        //             cvc: $('.card-cvc').val(),
        //             exp_month: $('.card-expiry-month').val(),
        //             exp_year: $('.card-expiry-year').val()
        //         }, stripeResponseHandler);
        //     }
        //
        // });

        function stripeResponseHandler(status, response) {

            var $form = $(".require-validation");
            console.log("response " + response);
            console.log("status " + status);

            console.log("response stringify " + JSON.stringify(response));
            console.log("response error " + response.error);

            if (response.error) {

                alert(response.error.message);

                // $('.error')
                //     .removeClass('hide')
                //     .find('.alert')
                //     .text(response.error.message);
            } else {
                // token contains id, last4, and card type

                // var token = response['id'];

                var token = response.id;
                console.log("token " + token);

                // return token;

                // insert the token into the form so it gets submitted to the server
                // $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' readonly name='stripeToken' value='" + token + "'/>");
                // $form.get(0).submit();

                // do_checkout(e);
                $(".custom_btn").click();

            }
        }


        var is_validate_otp = false;
        var otp_code = '0';

        function validate_method(method) {
            if (method == "Bank Deposit") {
                $('#credit_cart_note').hide();
                $('#bank_detail_div').show(500);
            } else {
                // $('#credit_cart_note').show();
                // $('#bank_detail_div').hide(500);
            }
        }

        function toggle_div(e) {
            if ($('#create_checkbox').is(':checked')) {
                $('.hideable').show(500);
            }
            else {
                $('.hideable').hide(500);
            }
        }

        function verify_email(e) {
            is_validate_otp = 1;
            do_checkout(e);
        }

        function resend_otp(e) {
            is_validate_otp = 0;
            do_checkout(e);
        }

        function resend_otp2(e) {
            is_validate_otp = 0;

        }

        $('input[type=radio][name=payment_method]').change(function () {
            if (this.value == 'Bank Deposit') {


                $(".PaymentDetailsDiv").hide(500);
                $(".stripe_btn").hide();
                $(".custom_btn ").show();
                $('.bank_detail').show(500);

            }
            else {
                $(".PaymentDetailsDiv").show(500);
                $(".stripe_btn").show();
                $(".custom_btn ").hide();
                $('.bank_detail').hide(500);
            }
            // else if (this.value == 'transfer') {
            //     alert("Transfer Thai Gayo");
            // }
        });

        Stripe.setPublishableKey("{{env('STRIPE_KEY')}}");

        $(document).on("click", ".stripe_btn", function (e) {
            console.log('stripe_btn clicked');
            e.preventDefault();
            var $form = $('#payment-form');
            if ($('#card_holder_number').val() != '' && $('#card_expiry_month').val() != '' && $('#card_holder_name').val() != '' && $('#card_cvc').val()) {
                $('#card-errors').hide();
                if (Stripe.card.validateCardNumber($('#card_holder_number').val())) {
                    // if (Stripe.card.validateExpiry($('#card_expiry_month').val())) {
                    if (Stripe.card.validateCVC($('#card_cvc').val())) {

                        Stripe.card.createToken({
                            number: $('#card_holder_number').val(),
                            cvc: $('#card_cvc').val(),
                            exp_month: $('#card_expiry_month').val(),
                            exp_year: $('#card_expiry_year').val()

                        }, stripeResponseHandler);

                        // Stripe.createToken({
                        //     number: $('#card_holder_number').val(),
                        //     cvc: $('#card_cvc').val(),
                        //     exp_month: $('#card_expiry_month').val(),
                        //     exp_year: $('#card_expiry_year').val()
                        // }, stripeResponseHandler);

                    } else {
                        alert('CVC is incorrect');
                    }
                    // } else {
                    //     alert('Expiry date is incorrect');
                    // }
                } else {
                    alert('Card number is incorrect');
                }
            }
            else {
                alert('Please fill all the fields');
            }

        });

        function do_checkout(e) {

            console.log("validate_order " + validate_order());

            if (validate_order()) {
                @if(!auth()->check())
                if ($('input[name=is_signup]').is(':checked')) {
                    var code = '';
                    $('.verify_email').each(function (index, value) {
                        code = code + '' + $(this).val();
                    });
                    code = code.trim();

                    if ($("input[name='payment_method']:checked").val() == "Credit Card") {
                        var stripToken = $('input[name=stripeToken]').val();
                        console.log("stripToken " + stripToken);

                        var data = {
                            _token: '{{csrf_token()}}',
                            stripeToken: stripToken,
                            payment_method: $("input[name='payment_method']:checked").val(),
                            first_name: $("input[name='first_name']").val(),
                            last_name: $("input[name='last_name']").val(),
                            email: $("input[name='email']").val(),
                            password: $("input[name='password']").val(),
                            phone: $("input[name='phone']").val(),
                            is_validate_otp: is_validate_otp,
                            otp_code: code,
                            is_signup: 1
                        }

                    }
                    else {
                        var data = {
                            _token: '{{csrf_token()}}',
                            payment_method: $("input[name='payment_method']:checked").val(),
                            first_name: $("input[name='first_name']").val(),
                            last_name: $("input[name='last_name']").val(),
                            email: $("input[name='email']").val(),
                            password: $("input[name='password']").val(),
                            phone: $("input[name='phone']").val(),
                            is_validate_otp: is_validate_otp,
                            otp_code: code,
                            is_signup: 1
                        }
                    }

                }
                else {

                    if ($("input[name='payment_method']:checked").val() == "Credit Card") {

                        var stripToken = $('input[name=stripeToken]').val();
                        console.log("stripToken " + stripToken);

                        var data = {
                            _token: '{{csrf_token()}}',
                            payment_method: $("input[name='payment_method']:checked").val(),
                            stripeToken: stripToken,
                            email: $("input[name='email']").val(),
                            password: $("input[name='password']").val()


                        };
                    }
                    else {
                        var data = {
                            _token: '{{csrf_token()}}',
                            payment_method: $("input[name='payment_method']:checked").val(),
                            email: $("input[name='email']").val(),
                            password: $("input[name='password']").val()
                        }

                    }


                }
                @else

                if ($("input[name='payment_method']:checked").val() == "Credit Card") {

                    // alert("HERE 1");
                    var stripToken = $('input[name=stripeToken]').val();
                    console.log("stripToken 1 " + stripToken);

                    var data = {
                        _token: '{{csrf_token()}}',
                        payment_method: $("input[name='payment_method']:checked").val(),
                        stripeToken: stripToken
                    };
                }
                else {
                    var data = {
                        _token: '{{csrf_token()}}',
                        payment_method: $("input[name='payment_method']:checked").val()
                    };
                }

                @endif
                block();

                console.log("data post " + data);
                console.log("data post length " + data.length);
                console.log("data post  stringify " + JSON.stringify(data));

                generalAjaxLocal(data, '{{route("do_checkout")}}', function (res) {

                    console.log("resp " + res);
                    console.log("resp length " + res.length);
                    console.log("resp " + JSON.stringify(res));

                    if (res.status) {
                        toastr.success(res.response, 'Success');
                        if (res.response == "We have send OTP code to your given email address. Please Varify it.Thanks!") {
                            $('#chk_email').text(data.email);
                            $('#email_otp_modal').modal('show');
                            is_validate_otp = 0;
                        } else {

                            // if($("input[name='payment_method']:checked").val() == "Credit Card")
                            // {
                            //     $("#payment-form").submit();
                            //
                            // }
                            // else
                            //
                            // {

                            window.location.href = '{{route("my_orders")}}'

                            // }

                        }
                        unBlock();
                    }
                    else {
                        toastr.error(res.response, 'Error');
                        unBlock();
                    }
                });
            }

        }

        function validate_order() {
            var is_validated = true;
            @if(!auth()->check())
            if ($('input[name=is_signup]').is(':checked')) {

                if ($("input[name='payment_method']:checked").val() == "Credit Card") {
                    if ($('input[name=card_holder_number]').val() != ""
                        && $('input[name=card_expiry_month]').val() != ""
                        && $('input[name=card_expiry_year]').val() != ""
                        && $('input[name=card_cvc]').val() != ""

                    ) {

                        is_validated = true;
                        // console.log("Here 1");

                        if ($('input[name=first_name]').val() != "" && $('input[name=last_name]').val() != "" && $('input[name=email]').val() != "" && $('input[name=password]').val() != "" && $("input[name='phone']").val() != "" && $('input[name=password_confirmation]').val() != "" && $("input[name='password_confirmation']").val() != "") {
                            if ($('input[name=password]').val() != $('input[name=password_confirmation]').val()) {
                                is_validated = false;
                                toastr.error("Password & Password Confirmation Does Not Match!", 'Error');
                            } else {
                                is_validated = true;
                            }
                        }
                        else {
                            is_validated = false;
                            toastr.error("Please fill all the fields", 'Error');
                        }


                    }
                    else {
                        // console.log("Here 3");

                        is_validated = false;
                        toastr.error("Please fill all Payment Details fields", 'Error');
                        unBlock();
                        // return false;
                    }


                }
                else {

                    if ($('input[name=first_name]').val() != "" && $('input[name=last_name]').val() != "" && $('input[name=email]').val() != "" && $('input[name=password]').val() != "" && $("input[name='phone']").val() != "" && $('input[name=password_confirmation]').val() != "" && $("input[name='password_confirmation']").val() != "") {
                        if ($('input[name=password]').val() != $('input[name=password_confirmation]').val()) {
                            is_validated = false;
                            toastr.error("Password & Password Confirmation Does Not Match!", 'Error');
                        } else {
                            is_validated = true;
                        }
                    }
                    else {
                        is_validated = false;
                        toastr.error("Please fill all the fields", 'Error');
                    }
                }
            }
            else {

                // console.log("Here");
                if ($("input[name='payment_method']:checked").val() == "Credit Card") {
                    if ($('input[name=card_holder_number]').val() != ""
                        && $('input[name=card_expiry_month]').val() != ""
                        && $('input[name=card_expiry_year]').val() != ""
                        && $('input[name=card_cvc]').val() != ""

                    ) {

                        is_validated = true;
                        // console.log("Here 1");


                        if ($('input[name=email]').val() != "" && $('input[name=password]').val() != "") {
                            is_validated = true;
                        }
                        else {
                            is_validated = false;
                            // console.log("Here 4");

                            toastr.error("Please fill all the fields", 'Error');
                            unBlock();
                        }


                    }
                    else {
                        // console.log("Here 3");

                        is_validated = false;
                        toastr.error("Please fill all Payment Details fields", 'Error');
                        unBlock();
                        // return false;
                    }


                }
                else {


                    if ($('input[name=email]').val() != "" && $('input[name=password]').val() != "") {
                        is_validated = true;
                    }
                    else {
                        is_validated = false;
                        // console.log("Here 4");

                        toastr.error("Please fill all the fields", 'Error');
                        unBlock();
                    }
                }

            }
            @else

            if ($("input[name='payment_method']:checked").val() == "Credit Card") {
                if ($('input[name=card_holder_number]').val() != ""
                    && $('input[name=card_expiry_month]').val() != ""
                    && $('input[name=card_expiry_year]').val() != ""
                    && $('input[name=card_cvc]').val() != ""

                ) {

                    is_validated = true;
                    // console.log("Here 1");


                }
                else {
                    // console.log("Here 3");

                    is_validated = false;
                    toastr.error("Please fill all Payment Details fields", 'Error');
                    unBlock();
                    // return false;
                }


            }

            @endif
            if (is_validate_otp) {
                var code = '';
                $('.verify_email').each(function (index, value) {
                    code = code + '' + $(this).val();

                });
                code = code.trim();
                if (code != "") {

                }
                else {
                    is_validated = false;
                    toastr.error("Please enter otp code", 'Error');
                }
            }
            return is_validated;
        }

        function block() {
            $.blockUI({message: $('#please_wait')});
        }

        function unBlock() {
            $.unblockUI();
        }

        function generalAjaxLocal(data, route, call_back) {


            $.ajax({

                type: "POST",

                url: route,

                data: data,

                dataType: 'json',

                async: true,

                success: call_back,

                error: function (err) {
                    unBlock();
                    toastr.error("Network Server Error. Please try again", 'Error');
                    var err = JSON.parse(err.responseText);
                    toastr.error(err.message, 'Error');
                    return err;

                }

            });

        }

        $('.digit-group2').find('input').each(function () {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function (e) {
                var parent = $($(this).parent());

                if (e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));
                    var text_value = $(this).val();
                    if (text_value.length > 1) {
                        $(this).val(text_value.charAt(0));
                    }
                    if (prev.length) {
                        $(prev).select();
                    }
                } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));
                    var text_value = $(this).val();
                    if (text_value.length > 1) {
                        $(this).val(text_value.charAt(0));
                    }
                    if (next.length) {
                        $(next).select();
                    } else {
                        if (parent.data('autosubmit')) {
                            // parent.submit();
                        }
                    }
                }
            });
        });

    </script>
@endsection
