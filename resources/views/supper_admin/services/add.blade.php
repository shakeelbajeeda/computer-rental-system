@extends('layouts.supper_admin')
{{-- page level styles --}}

@section('content')
    <link rel="stylesheet" href="{{asset(env('PUBLIC_URL').'website/assets/css/multiselect.css')}}">
    <style>
        .ms-options-wrap > .ms-options > ul input[type="checkbox"] {
            margin-right: 5px;
            position: absolute;
            left: 4px;
            top: 11px;
        }

        #add_sub_service_btn {
            float: right;
            display: none;
        }

        .appended_row {
            background: #2c304d2e;
            border-radius: 10px;
            padding-bottom: 18px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .remove_btn {
            float: right;
            color: red;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }
        .col-lg-6 {
            margin-top: 15px;
        }
        .avatar-upload {
            position:  relative;
            max-width: 205px;
            margin:    0 auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right:    0px;
            z-index:  1;
            top:      0px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input + label {
            display:       inline-block;
            width:         20px;
            height:        20px;
            margin-bottom: 0;
            border-radius: 100%;
            background:    #FFFFFF;
            border:        1px solid transparent;
            box-shadow:    0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor:        pointer;
            font-weight:   normal;
            transition:    all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input + label:hover {
            background:   #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input + label:after {
            content:     "\f040";
            font-family: 'FontAwesome';
            color:       #757575;
            position:    absolute;
            top:         0px;
            left:        0;
            right:       0;
            text-align:  center;
            margin:      auto;
        }

        .avatar-upload .avatar-preview {
            width:         80px;
            height:        80px;
            position:      relative;
            border-radius: 100%;
            border:        6px solid #F8F8F8;
            box-shadow:    0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview > div {
            width:               100%;
            height:              100%;
            border-radius:       100%;
            background-size:     cover;
            background-repeat:   no-repeat;
            background-position: center;
        }
    </style>
    <?php
    $cats = ['Computer', 'Keyboard', 'Mouse', 'Other'];    ?>
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">@if(isset($service->id) and $service->id >0) Edit @else Add New @endif
                        Service</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}"><i
                                            class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@if(isset($service->id) and $service->id >0) Edit @else
                                    Add New @endif Service
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">

            <div class="col-xl-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>@if(isset($service->id) and $service->id >0) Edit @else Add New @endif Service
                        </h4>
                    </div>
                    <div class="widget-body">
                        @if(isset($service->id) and $service->id >0)
                            <form id="i_form" action="{{route('products.update',[$service->id])}}" enctype='multipart/form-data' method="post">
                                 {{ method_field('put') }}
                                @else
                                    <form id="i_form" action="{{route('products.store')}}" method="post"
                                          enctype='multipart/form-data'>
                                        @endif

                                        @csrf

                                        <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Select Image</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type="file" img="1" class="form-control" onchange="changeAvatar(this)" name="image" id="imageUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload1"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                @if(isset($service->image))
                                                    <div id="imagePreview1">
                                                        <img id="imageEditPreview1" style="height: 69px;width: 69px;border-radius: 100%;" src="{{asset(env('PUBLIC_URL').'public/images/service_images/')}}/{{ $service->image}}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        <div class="form-group row d-flex align-items-center">

                                            <div class="col-lg-6">
                                                <label>Select Category</label>
                                            <select name="category" class=" form-control selectpicker show-menu-arrow"  data-live-search="true">

                                            <?php if(isset($cats) and sizeof($cats)>0):?>
                                            <?php foreach($cats as $c):?>
                                                @if(isset($service->id) and $service->category == $c)
                                                    <option selected value="<?=$c?>"><?=$c?></option>
                                                @else
                                                    <option value="<?=$c?>"><?=$c?></option>
                                                @endif
                                            <?php endforeach;
                                            else: ?>
                                            <option value="">No Category Found</option>
                                            <?php endif ?>

                                            </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Title</label>
                                                <input name="title" type="text" class="form-control custom_required"
                                                       value="{{$service->title}}" required="">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Brand</label>
                                                <input name="brand" type="text" class="form-control"
                                                       value="{{$service->brand}}" required="">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Per Hour Rent</label>
                                                <input name="per_hour_rate" type="number" class="form-control"
                                                       value="{{$service->per_hour_rate}}" required="">
                                            </div>
                                            <div class="col-lg-6">

                                                <label>Operating System</label>
                                                <input name="os" type="text"
                                                       class="form-control"
                                                       value="{{$service->os}}">
                                            </div>
                                            <div class="col-lg-6">

                                                <label>Display Size</label>
                                                <input name="display_size" type="text"
                                                       class="form-control"
                                                       value="{{$service->display_size}}">
                                            </div>
                                            <div class="col-lg-6">

                                                <label>No of USB ports</label>
                                                <input name="no_of_usb_ports" type="number"
                                                       class="form-control"
                                                       value="{{$service->no_of_usb_ports}}">
                                            </div>
                                            <div class="col-lg-6">

                                                <label>No of HDMI ports</label>
                                                <input name="no_of_hdmi_ports" type="number"
                                                       class="form-control"
                                                       value="{{$service->no_of_hdmi_ports}}">
                                            </div>
                                            <div class="col-lg-6">

                                                <label>Security Deposit</label>
                                                <input name="security_deposit" type="number"
                                                       class="form-control"
                                                       value="{{$service->security_deposit}}">
                                            </div>
                                            <div class="col-lg-6">

                                                <label>Insurance Amount</label>
                                                <input name="insurance_amount" type="number"
                                                       class="form-control"
                                                       value="{{$service->insurance_amount}}">
                                            </div>
                                        </div>
                                        <div class="em-separator separator-dashed"></div>
                                        <div class="text-right">
                                            <button class="btn btn-gradient-01" type="submit">Submit</button>
                                            <!-- <button class="btn btn-shadow" type="reset">Cancel</button> -->
                                        </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>


@stop

@section('footer_scripts')

<script>
        function changeAvatar(input) {
            console.log(input)
            if (input.files && input.files[0]) {
                let id = $(input).attr('img');
                var reader = new FileReader();
                // var img = $(input).attr('img');
                // alert(img);
                console.log(id)
                reader.onload = function (e) {
                    $('#imagePreview' + id).css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview' + id).hide();
                    $('#imageEditPreview' + id).hide();
                    $('#imagePreview' + id).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop
