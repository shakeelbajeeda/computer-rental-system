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
                    <h2 class="page-header-title">Services</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Recharge History</a></li>
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

                    <div class="widget-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="active_packages">
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Recharge into</th>
                                            <th>Amount</th>
                                            <th>Recharge By</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($recharges) and sizeof($recharges) > 0):?>
                                        <?php foreach ($recharges as $key => $p):?>
                                        <tr>
                                            <td>{{@$p->receiver->name}}</td>
                                            <td>${{$p->amount}}</td>
                                            <td>{{@$p->sender->name}}</td>
                                            <td>{{date('d-M-Y', strtotime($p->created_at))}}</td>

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
            if($(e).attr('id')=="active")
            {
                $('#expired_packages').hide();
                $('#active_packages').show();
            }
            else
            {
                $('#active_packages').hide();
                $('#expired_packages').show();

            }
            $(e).addClass('active');
        }

        function delete_item(e) {
            var data =
                {
                    'table': 'products',
                    'id': $(e).attr('id'),
                    '_token': '{{csrf_token()}}'
                }
            swal({
                title: "Are you sure?",
                text: "Are you really want to remove this Service?",
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
                                text: "Service has been deleted",
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

    <!-- <script src="{{asset('public/assets/vendors/js/datatables/datatables.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/jszip.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/buttons.html5.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/pdfmake.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/vfs_fonts.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/buttons.print.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/js/components/tables/tables.js') }}"></script> -->
    <!-- <script src="{{ asset('public/assets/vendors/js/datepicker/daterangepicker.js') }}"></script> -->
    <!-- <script src="{{ asset('public/assets/js/components/datepicker/datepicker.js') }}"></script> -->

@stop
