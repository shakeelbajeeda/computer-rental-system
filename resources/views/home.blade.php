@extends('layouts.supper_admin')

@section('content')
<div class="row">
 <div class="container-fluid">
            <div class="row">
              <div class="col-xl-6 col-md-12 box-col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Customers</h5>
                  </div>
                  <div class="card-body chart-block">
                    <canvas id="myBarGraph" width="502" height="251" style="width: 502px; height: 251px;"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-md-12 box-col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Orders</h5>
                  </div>
                  <div class="card-body chart-block">
                    <canvas id="myGraph" width="502" height="251" style="width: 502px; height: 251px;"></canvas>
                  </div>
                </div>
              </div>

              </div>
              <div class="col-xl-6 col-md-12 box-col-12" style="display: none;">
                <div class="card">
                  <div class="card-header">
                    <h5>expenses Chart</h5>
                  </div>
                  <div class="card-body chart-block chart-vertical-center">
                    <canvas id="myPolarGraph" width="502" height="251" style="width: 502px; height: 251px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 col-sm-12 box-col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Expenses</h5>
                  </div>
                  <div class="card-body chart-block">
                    <div class="flot-chart-container">
                      <div class="flot-chart-placeholder" id="morris-line-chart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 box-col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Updating Data</h5>
                  </div>
                  <div class="card-body chart-block">
                    <div class="flot-chart-container">
                      <div class="flot-chart-placeholder" id="updating-data-morris-chart"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-sm-12 box-col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Profit </h5>
                  </div>
                  <div class="card-body chart-block">
                    <div class="flot-chart-container">
                      <div class="flot-chart-placeholder" id="bar-line-chart-morris"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 box-col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Loss</h5>
                  </div>
                  <div class="card-body chart-block">
                    <div class="flot-chart-container">
                      <div class="flot-chart-placeholder" id="x-lable-morris-chart"></div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-lg-6 col-sm-12 box-col-12" style="display: none;">
                <div class="card">
                  <div class="card-header">
                    <h5>Simple Bar Charts</h5>
                  </div>
                  <div class="card-body chart-block">
                    <div class="flot-chart-container">
                      <div class="flot-chart-placeholder" id="morris-simple-bar-chart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 box-col-12" style="display: none;">
                <div class="card">
                  <div class="card-header">
                    <h5>Area charts behaving like line Charts</h5>
                  </div>
                  <div class="card-body chart-block">
                    <div class="flot-chart-container">
                      <div class="flot-chart-placeholder" id="graph123"></div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- Container-fluid Ends-->


</div>

@endsection
