@extends('layouts.website')
@section('content')
    <style>
  .rent_out{
      left: 40% !important;
  }
    </style>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover"
        style="height:400px;background-image: url('{{ asset(env('PUBLIC_URL') . 'website/assets/images/slider_images/slider_2.jpg') }}')">
        <div class="banner-bg">

        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SERVICES PRICING PART START ======-->
    <section>
        <div>
            <div class="container">
                <div class="text-center h1 my-3 text-dark">Service Details</div>
                <div class="row my-5">
                    <div class="col-md-6">
                        <div>
                            @if($service->is_rented ==1)
                            <span class="rent_out">Reserved</span>
                            @endif
                            <img width="100%" height="500px" class="rounded"
                                src="{{ asset(env('PUBLIC_URL') . 'public/images/service_images/') }}/{{ $service->image }}">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b class="pr-5">Brand: </b>{{$service->brand}}</li>
                                <li class="list-group-item"><b class="pr-5">Name: </b>{{$service->title}}</li>
                                <li class="list-group-item"><b class="pr-5">Rate Per/Hour: </b> ${{$service->per_hour_rate}}</li>
                                <li class="list-group-item"><b class="pr-5">Operating System </b>{{$service->os}}</li>
                                <li class="list-group-item"><b class="pr-5">Display Size: </b>{{$service->display_size}}</li>
                                <li class="list-group-item"><b class="pr-5">Ram: </b>{{$service->ram}}</li>
                                <li class="list-group-item"><b class="pr-5">Number of USB Ports: </b>{{$service->no_of_usb_ports}}</li>
                                <li class="list-group-item"><b class="pr-5">Number of HDMI Ports: </b>{{$service->no_of_hdmi_ports}}</li>
                                <li class="list-group-item"><b class="pr-5">Category: </b>{{$service->category}}</li>
                                <li class="list-group-item"><b class="pr-5">Security Deposit: </b>${{$service->security_deposit}}</li>
                                <li class="list-group-item"><b class="pr-5">Insurance Amount: </b>${{$service->insurance_amount}}</li>
                                <div class="text-center">
                                    <a href="{{route ('checkout_page', [$service->id])}}" class="btn btn-primary px-4 mt-3">Rent it</a>

                                </div>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
