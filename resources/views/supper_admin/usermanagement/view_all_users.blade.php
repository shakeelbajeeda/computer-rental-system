@extends('layouts/supper_admin')
{{-- page level styles --}}
@section('header_styles')
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation:         chartjs-render-animation 0.001s;
        }
    </style>

    <!-- Add Page Styles here -->
@stop
<!--Start page content-->
@section('content')

    <style type="text/css">
        .count_design {
            width:         32px;
            height:        32px;
            background:    #2ca8ff;
            background:    2 ca8ff;
            color:         white;
            /* background: #a7800cb3; */
            border-radius: 100%;
            text-align:    center;
            padding:       6px;
        }
    </style>


    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">{{$title}} List</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">User Management</a></li>
                            <!-- <li class="breadcrumb-item active">Pending</li> -->
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
                        <ul class="nav nav-pills">
                            <li>
                                <a href="#rental_properties" data-toggle="tab" class="active show">
                                    <button type="button" class="btn btn-outline-success mr-1 mb-2 remove_active active" onclick="add_class_active(this);">Active {{$title}} ({{count($active_users)}})</button>
                                </a>
                            </li>
                            <li>
                                <a href="#properties_for_sell" data-toggle="tab">
                                    <button type="button" class="btn btn-outline-danger mr-1 mb-2 remove_active" onclick="add_class_active(this);">Blocked {{$title}} ({{count($blocked_users)}})</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="rental_properties">
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Account Balance</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($active_users) and sizeof($active_users) > 0):?>
                                        <?php foreach ($active_users as $key => $p):?>
                                        <tr>
                                            <td><?=$p->name?></td>
                                            <td class="td-actions"><?=$p->email?></td>
                                            <td>{{$p->role}}</td>
                                            <td>{{$p->phone}}</td>
                                            <td>{{$p->total_money}}</td>
                                            <td>
                                                <?php if($p->is_active == 1):?>
                                                <p class="badge badge-pill badge-success" style="vertical-align: middle;font-size: 15px;font-weight: 500;cursor: pointer;" id="{{$p->id}}" table="users" tbl_field="is_active" status="0" operation="Block" onclick="change_status(this);">Activated</p>
                                                <?php endif ?>
                                            </td>
                                            <td class="td-actions">
                                                <a href="{{route('users.show',[$p->id])}}"><i class="la la-eye edit" title="View User Detail"></i></a>
                                                <a href="{{route('users.edit',[$p->id])}}"><i class="la la-edit delete" title="Edit User"></i></a>
                                                <a href="javascript:void(0);" id="{{$p->id}}" onclick="delete_item(this);"><i class="la la-close delete" title="Delete User"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="properties_for_sell">
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                           <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Account Balance</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($blocked_users) and sizeof($blocked_users) > 0):?>
                                        <?php foreach ($blocked_users as $key => $p):?>
                                            <tr>
                                            <td><?=$p->name?></td>
                                            <td class="td-actions"><?=$p->email?></td>
                                            <td>{{$p->role}}</td>
                                            <td>{{$p->phone}}</td>
                                            <td>{{$p->total_money}}</td>
                                            <td>
                                                <?php if($p->is_active == 0):?>
                                                <p class="badge badge-pill badge-danger" style="vertical-align: middle;font-size: 15px;font-weight: 500;cursor: pointer;" id="{{$p->id}}" table="users" tbl_field="is_active" operation="Activate" status="1" onclick="change_status(this);">Blocked</p>
                                                <?php endif ?>
                                            </td>
                                            <td class="td-actions">
                                                <a href="{{route('users.show',[$p->id])}}"><i class="la la-eye edit" title="View User Detail"></i></a>
                                                <a href="{{route('users.edit',[$p->id])}}"><i class="la la-edit delete" title="Edit User"></i></a>
                                                <a href="javascript:void(0);" id="{{$p->id}}" onclick="delete_item(this);"><i class="la la-close delete" title="Delete User"></i></a></td>
                                        </tr>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>

@stop

@section('footer_scripts')
    <!-- page level scripts -->

    <script type="text/javascript">
        function add_class_active(e) {
            $('.remove_active').removeClass('active');
            $(e).addClass('active');
        }

        function delete_item(e) {
            var data =
                {
                    'table': 'users',
                    'id': $(e).attr('id'),
                    '_token': '{{csrf_token()}}'
                }
            swal({
                title: "Are you sure?",
                text: "Are you really want to remove this User?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                confirmButtonClass: 'btn btn-success',
                cancel: true,
                buttonsStyling: false
            }).then((result) => {
                if (result) {
                    generalAjax(data, '{{route("general_delete")}}', function (res) {
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

    </script>
<!--
    <script src="{{asset('public/assets/vendors/js/datatables/datatables.min.js') }}"></script>
    <script src="{{asset('public/assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('public/assets/vendors/js/datatables/jszip.min.js') }}"></script>
    <script src="{{asset('public/assets/vendors/js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{asset('public/assets/vendors/js/datatables/pdfmake.min.js') }}"></script>
    <script src="{{asset('public/assets/vendors/js/datatables/vfs_fonts.js') }}"></script>
    <script src="{{asset('public/assets/vendors/js/datatables/buttons.print.min.js') }}"></script>
    <script src="{{asset('public/assets/js/components/tables/tables.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/js/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('public/assets/js/components/datepicker/datepicker.js') }}"></script> -->

@stop
