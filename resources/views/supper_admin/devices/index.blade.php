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
                    <h2 class="page-header-title">Rent Requests</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Rent Requests</a></li>
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
                                            <th>User</th>
                                            <th>Product</th>
                                            <th>Total Hours</th>
                                            <th>Security</th>
                                            <th>Insurance</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                            <th>Is Returned</th>
                                            <th>Rent Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($devices) and sizeof($devices) > 0):?>
                                        <?php foreach ($devices as $key => $p):?>
                                        <tr>
                                            <td>{{@$p->user->name}}</td>
                                            <td>{{@$p->product->title}}</td>
                                            <td>${{$p->total_hours}}</td>
                                            <td>${{@$p->security}}</td>
                                            <td>${{@$p->insurance_amount}}</td>
                                            <td>{{@$p->total_price}}</td>
                                            <td>{{@$p->status}}</td>
                                            <td>{{@$p->is_returned == 1 ? 'Yes' : 'No'}}</td>


                                            <td>{{date('d-M-Y', strtotime($p->booking_date))}}</td>

                                            <td class="td-actions">
                                                @if($p->status == 'Dispatched')
                                                   <a href="javascript:void(0)" onclick="open_modal('{{$p->id}}')">Return Device</a>
                                                @endif
                                            </td>
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


<div id="dispatch_modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Return Device</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('return_confirm')}}">
          @csrf
      <div class="modal-body">
        <div class="form-group">
            <input type="hidden" id="order_id" name="id">
            <label for="exampleInputEmail1">Return Date</label>
            <input required type="date" class="form-control" name="return_date">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Damage Amount (if any)</label>
            <input  type="number" class="form-control" name="damage_amount">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Late Fee (if any)</label>
            <input  type="number" class="form-control" name="late_fee">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Note (if any)</label>
            <input  type="textarea" class="form-control" name="note">
        </div>
        <p>Note: Security amount will be added back to customer account on return</p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Confirm Return</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
@stop

@section('footer_scripts')
    <!-- page level scripts -->

    <script type="text/javascript">
        function open_modal(id) {
            $('#order_id').val(id);
            $('#dispatch_modal').modal('show');
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
