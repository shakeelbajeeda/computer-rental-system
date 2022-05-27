@extends('layouts/supper_admin')

<!--Start page content-->
@section('content')
<?php
use Carbon\Carbon;
 ?>
<style type="text/css">
p{color:black;font-size:17px;}
.doc_images
{
    height: 600px;
    width: 438px;
    border: 1px solid #2c304d;
    padding: 5px;
    border-radius: 10px;
}
</style>
<div class="container-fluid pt-24">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="widget widget-16 has-shadow">
                <div class="widget-body">
                    <div class="row ">

                        <div class="col-md-6">
                            <p ><strong>Name</strong> {{$user->name}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Role</strong> {{$user->role}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Email</strong> {{$user->email}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Phone</strong> {{$user->phone}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>City</strong> {{$user->city}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Address</strong> {{@$user->address}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Account Balance</strong> {{@$user->total_money}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Join Date</strong> {{date('d-M-Y', strtotime($user->created_at))}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
@stop

