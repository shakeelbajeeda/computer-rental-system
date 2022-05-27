@extends('layouts.'.$layout)
{{-- page level styles --}}
@section('header_styles')
<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
</style>
<style>
                 /* Always set the map height explicitly to define the size of the div
                  * element that contains the map. */
                 #map {
                   height: 100%;
                 }
                 /* Optional: Makes the sample page fill the window. */
                 html, body {
                   height: 100%;
                   margin: 0;
                   padding: 0;
                 }
                 #description {
                   font-family: Roboto;
                   font-size: 15px;
                   font-weight: 300;
                 }

                 #infowindow-content .title {
                   font-weight: bold;
                 }

                 #infowindow-content {
                   display: none;
                 }

                 #map #infowindow-content {
                   display: inline;
                 }

                 .pac-card {
                   margin: 10px 10px 0 0;
                   border-radius: 2px 0 0 2px;
                   box-sizing: border-box;
                   -moz-box-sizing: border-box;
                   outline: none;
                   box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                   background-color: #fff;
                   font-family: Roboto;
                 }
                 .display{
                   display: none;
                 }

                 #pac-container {
                   padding-bottom: 12px;
                   margin-right: 12px;
                 }

                 .pac-controls {
                   display: inline-block;
                   padding: 5px 11px;
                 }

                 .pac-controls label {
                   font-family: Roboto;
                   font-size: 13px;
                   font-weight: 300;
                 }

                 #pac-input {
                   background-color: #fff;
                   font-family: Roboto;
                   font-size: 15px;
                   font-weight: 300;
                   margin-left: 12px;
                   padding: 0 11px 0 13px;
                   text-overflow: ellipsis;
                   width: 400px;
                 }
                 .pac-container {
                   z-index: 5051 !important;
                        }

                 #pac-input:focus {
                   border-color: #4d90fe;
                 }

                 #title {
                   color: #fff;
                   background-color: #4d90fe;
                   font-size: 25px;
                   font-weight: 500;
                   padding: 6px 12px;
                 }
                 #target {
                   width: 345px;
                 }
               </style>
<style>

  .avatar-upload{position:relative;max-width:205px;margin:0 auto;}
  .avatar-upload .avatar-edit{position:absolute;right:0px;z-index:1;top:0px;}
  .avatar-upload .avatar-edit input{display:none;}
  .avatar-upload .avatar-edit input + label{display:inline-block;width:20px;height:20px;margin-bottom:0;border-radius:100%;background:#FFFFFF;border:1px solid transparent;box-shadow:0px 2px 4px 0px rgba(0, 0, 0, 0.12);cursor:pointer;font-weight:normal;transition:all 0.2s ease-in-out;}
  .avatar-upload .avatar-edit input + label:hover{background:#f1f1f1;border-color:#d6d6d6;}
  .avatar-upload .avatar-edit input + label:after{content:"\f040";font-family:'FontAwesome';color:#757575;position:absolute;top:0px;left:0;right:0;text-align:center;margin:auto;}
  .avatar-upload .avatar-preview{width:80px;height:80px;position:relative;border-radius:100%;border:6px solid #F8F8F8;box-shadow:0px 2px 4px 0px rgba(0, 0, 0, 0.1);}
  .avatar-upload .avatar-preview > div{width:100%;height:100%;border-radius:100%;background-size:cover;background-repeat:no-repeat;background-position:center;}
  /*! CSS Used fontfaces */
  @font-face{font-family:'FontAwesome';src:url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.eot?v=4.7.0');src:url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.eot#iefix&v=4.7.0') format('embedded-opentype'),url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'),url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'),url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'),url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');font-weight:normal;font-style:normal;}
</style>
@stop
@section('content')
<?php
$roles = ['Web Manager', 'UCR Staff', 'Customer'];
$cities = ['Hobart', 'Launceston'];

    $route = route('update_profile');
    $method = 'post';

?>
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">{{$title}}</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a><i class="ti ti-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">User management</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>{{$title}}</h4>
                </div>
                <div class="widget-body">

                    <form class="needs-validation" novalidate=""   action="{{$route}}" autocomplete="off" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        {{ method_field($method) }}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Select Role</label>
                            <div class="col-lg-5">
                            <select disabled name="role" class=" form-control selectpicker show-menu-arrow"  data-live-search="true">

                            <?php if(isset($roles) and sizeof($roles)>0):?>
                            <?php foreach($roles as $c):?>
                                @if(isset($user) and $user->role == $c)
                                      <option selected value="<?=$c?>"><?=$c?></option>
                                @else
                                     <option value="<?=$c?>"><?=$c?></option>
                                @endif
                            <?php endforeach;
                            else: ?>
                            <option value="">No Role Found</option>
                            <?php endif ?>

                            </select>
                            </div>

                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Full Name</label>
                            <div class="col-lg-5">
                                <input type="text" name='name' value="{{@$user->name}}" class="form-control" required>
                                @if($errors->has('email'))
                                      <span class="invalid-feedback" role="alert" style="color:red;position:absolute;display: block;">
                                          {{$errors->first('name')}}
                                      </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Phone</label>
                            <div class="col-lg-5">
                                <input type="text" name='phone' value="{{@$user->phone}}" class="form-control" required>
                                @if($errors->has('email'))
                                      <span class="invalid-feedback" role="alert" style="color:red;position:absolute;display: block;">
                                          {{$errors->first('phone')}}
                                      </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Email</label>
                            <div class="col-lg-5">
                                <input type="email" name='email' value="{{@$user->email}}" class="form-control" placeholder="Enter Email" required>
                                @if($errors->has('email'))
                                      <span class="invalid-feedback" role="alert" style="color:red;position:absolute;display: block;">
                                          {{$errors->first('email')}}
                                      </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Password</label>
                            <div class="col-lg-5">
                                <input type="password" name='password' class="form-control" @if(!isset($user)) required @endif>
                                @if($errors->has('email'))
                                      <span class="invalid-feedback" role="alert" style="color:red;position:absolute;display: block;">
                                          {{$errors->first('password')}}
                                      </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Select City</label>
                            <div class="col-lg-5">
                            <select name="city" class=" form-control selectpicker show-menu-arrow"  data-live-search="true">

                            <?php if(isset($cities) and sizeof($cities)>0):?>
                            <?php foreach($cities as $c):?>
                                @if(isset($user) and $user->city == $c)
                                      <option selected value="<?=$c?>"><?=$c?></option>
                                @else
                                     <option value="<?=$c?>"><?=$c?></option>
                                @endif
                            <?php endforeach;
                            else: ?>
                            <option value="">No City Found</option>
                            <?php endif ?>

                            </select>
                            </div>

                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Address</label>
                            <div class="col-lg-5">
                                <input type="text" value="{{@$user->address}}" name='address' class="form-control" required>
                                @if($errors->has('address'))
                                      <span class="invalid-feedback" role="alert" style="color:red;position:absolute;display: block;">
                                          {{$errors->first('address')}}
                                      </span>
                                @endif
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">Save Changes</button>
                            <!-- <button class="btn btn-shadow" type="reset">Reset</button> -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>




@stop
@section('footer_scripts')
@stop
