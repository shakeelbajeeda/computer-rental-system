
 @if(auth()->user() and request()->route()->getName() != 'home_page')
     @if(auth()->user()->is_active == 0)
         <?php
           session()->flash('message', "Your Account has been blocked. Please contact to Admin");
           session()->flash('alert-type', "error");

         ?>
         <script>window.location = "{{route('home_page')}}";</script>
     @endif
 @endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ENV('APP_NAME')}}</title>
    <meta name="description" content=" User Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('website/assets/images/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/base/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/base/elisyam-1.5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/base/ezumo-1.5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/owl-carousel/owl.theme.min.css') }}">
    <link href="{{ asset('public/assets/css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/zoomimage.css') }}"/>
    <!-- CSRF Token -->
    @yield('header_styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/datatables/datatables.min.css') }}">
    <!--[if lt IE 9]> -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <style type="text/css">
        .full-page-content {
            min-height: 82vh;
        }
    </style>
    <style type="text/css">
        .page-content.d-flex.align-items-stretch .content-inner .container-fluid {
            min-height: 82vh;
        }

        .default-sidebar > .side-navbar.shrinked {
            max-width: 8.5rem;
            width:     8.5rem;
        }

        .default-sidebar > .side-navbar.shrinked a span {
            display:       block;
            margin-bottom: 12px;
        }
    </style>
     <style type="text/css">
        .pagination {
            justify-content: center;
        }
        .close span {float: right;}
        .toast-close-button{display: none!important;}
        *[class*="icon-"] {
    transform: 0!important;
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
    </style>
</head>
<body id="page-top">
    <style type="text/css">

    #please_wait {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 1.0;
    }
    #icons_style{
        margin-top: 243px;
            font-size: 80px;
        color: #ff5722;
    }
    .blockUI{border: none!important;}
 </style>

 <!-- preloader -->
 <div id="please_wait" style="display:none;">
    <i id="icons_style" class="la la-circle-o-notch la-spin"></i>
</div>
<!-- Begin Preloader -->
<div id="preloader">
    <div class="canvas">
        <img style="width: 225px;" src="{{ asset(env('PUBLIC_URL'). 'website/assets/images/logo.png')}}" alt="logo" class="loader-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- End Preloader -->
<div class="page">
    <!-- Begin Header -->
    <header class="header">
        @include('user.layouts.topnav')
    </header>
    <!-- End Header -->
    <!-- Begin Page Content -->
    <div class="page-content d-flex align-items-stretch">
        <div class="default-sidebar">
            @include('user.layouts.left_sidebar')
        </div>
        <div class="content-inner">
        @yield('content')

        <!-- Begin Page Footer-->
            <footer class="main-footer">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                        <p class="text-gradient-02"></p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href=""></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Copyright © <strong><?php echo date('Y');  ?></strong></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
            <!-- End Page Footer -->

        </div>
        <!-- End Content -->

    </div>
    <!-- End Page Content -->
</div>
<!-- Begin Success Modal -->
<!-- End Success Modal -->
<!-- End Modal -->
<!-- sweet alerts plug in ...swal -->
<script src="{{ asset(env('PUBLIC_URL').'public/assets/js/dashboard/jquerySweetAlerts.js') }}"></script>
<!-- Begin Vendor Js -->
<script src="{{ asset('public/assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/base/core.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/bootstrap-select/bootstrap-select.min.js') }}"></script>

<!-- End Vendor Js -->
<!-- for data tables -->
<!-- <script src="{{ asset('public/assets/vendors/js/datatables/datatables.min.js') }}"></script> -->


<!-- Begin Page Vendor Js -->
<script src="{{ asset('public/assets/vendors/js/nicescroll/nicescroll.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/chart/chart.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/calendar/moment.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/app/app.js') }}"></script>


<!-- End Page Vendor Js -->


<!-- Begin Page Snippets -->
<script src="{{ asset('public/assets/js/dashboard/db-default.js') }}"></script>
<script src="{{ asset('public/assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('public/assets/js/components/validation/validation.min.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset('public/assets/js/components/wizard/form-wizard.min.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('public/js/zoomimage.js') }}"></script>
<script src="{{ asset('public/assets/vendors/js/tabledit/jquery.tabledit.min.js') }}"></script>
<script src="{{ asset('public/assets/js/components/tabledit/tabledit.js') }}"></script>


<!-- End Page Snippets -->
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script>
    function clientavatar(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var img = $(input).attr('img');
            // alert(img);
            reader.onload = function (e) {
                $('#imagePreview' + img).css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview' + img).hide();
                $('#imageEditPreview' + img).hide();
                $('#hideimg' + img).hide();
                $('#old_img' + img).prop('disabled', false);
                $('#imagePreview' + img).fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function clientavatar_p(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            // var img=$(input).attr('img');
            // alert(img);
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imageEditPreview1').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


        @if(Session::has('message'))
    var type = "{{Session::get('alert-type','Notification')}}"


    switch (type) {
        case 'Notification':
            toastr.info("{{ Session::get('message') }}", 'Congrats');
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}", 'Success');
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}", 'Warning');
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}", 'Error');
            break;
            default:
            toastr.error("{{ Session::get('message') }}", 'Error');
            break;
    }
    @endif
    @if($errors->any())
    @php
        $html  = "<ul>";

        foreach ($errors->all() as $error) {
            $html .= "<li> $error </li>";
        }
            $html .= "</ul>";
    @endphp
    toastr.error("{!! $html !!}", 'Error');
    @endif
</script>
<!-- Popover Initialization -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    function change_status(e) {
        var id = $(e).attr('id');
        var operation = $(e).attr('operation');
        var table = $(e).attr('table');
        var tbl_field = $(e).attr('tbl_field');
        var status = $(e).attr('status');

        var item = 'User';


        swal({
            title: "Are you sure?",
            text: "Are you really want to " + operation + " this " + item + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            confirmButtonClass: 'btn btn-success',
            cancel: true,
            buttonsStyling: false
        }).then((result) => {
            if (result) {
                generalAjax({id: id, status: status, table: table, tbl_field: tbl_field, _token: '{{csrf_token()}}'}, '{{route("change_status")}}', function (res) {
                    if (res.status) {
                        swal({
                            title: 'Congrats!',
                            icon: "success",
                            text: res.response,
                            type: 'confirm',
                            confirmButtonClass: "btn btn-success",
                            buttonsStyling: true
                        }).then((result) => {
                            if (result) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal({
                            title: 'Error!',
                            text: res.response,
                            type: 'error',
                            confirmButtonClass: "btn btn-danger",
                            buttonsStyling: false
                        })
                    }

                });

            }
        }).catch(swal.noop);


    }

    function generalAjax(data, route, call_back) {

        $.ajax({
            type: "POST",
            url: route,
            data: data,
            dataType: 'json',
            async: true,
            success: call_back,
            error: function (err) {
                block();
                return err;
            }
        });
    }
    $(document).on({
     ajaxStart: function() { block();   },
     ajaxStop: function() { unBlock(); }
});
    function block() {
      $.blockUI({ message: $('#please_wait') });
    }

    function unBlock() {
      $.unblockUI();
    }
</script>

<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
@yield('footer_scripts')
</body>
</html>
