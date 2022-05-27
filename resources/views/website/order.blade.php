@extends('layouts.website')
@section('content')
<?php
$discount = 0;
$discount_amount = 0.00;
$discount_title = "Discount";
if(auth()->user()->is_student == 1) {
    $discount = 10;
    $discount_title = "Discount (10%)";

}
?>
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
                <div class="h1 text-center mt-3 text-dark">Order Details
                    <p class="h6">Your Account Balance <strong class="text-dark"> ${{auth()->user()->total_money}} </strong></p>
                </div>
                <div class="row my-5">
                    <div class="col-md-6">
                        <div>
                            @if($service->is_rented ==1)
                            <span class="rent_out">Reserved</span>
                            @endif
                            <img width="100%" class="rounded"
                                src="{{ asset(env('PUBLIC_URL') . 'public/images/service_images/') }}/{{ $service->image }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="{{route('confirm_order')}}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$service->id}}">
                        <div class=" mb-4">
                            @if(session()->has('message'))
                        <div class="alert alert-danger" role="alert">
                            {{session()->get('message')}}
                            </div>
                            @endif
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b class="pr-5">Brand: </b>{{$service->brand}}</li>
                                    <li class="list-group-item"><b class="pr-5">Name: </b>{{$service->title}}</li>
                                    <li class="list-group-item"><b class="pr-5">Rate Per/Hour: </b>${{$service->per_hour_rate}}</li>
                                    <li class="list-group-item"><b class="pr-5">Security Deposit: </b>${{$service->security_deposit}}</li>
                                    <li class="list-group-item"><b class="pr-5">Select Hours: </b>
                                        <select name="hours" onchange="calulcate_order();" id="hours" class="form-control" aria-label="Default select example">
                                            <option value="1">1 Hour</option>
                                            <option value="1.5">1.5 Hours</option>
                                            <option value="2">2 Hours</option>
                                            <option value="2.5">2.5 Hours</option>
                                            <option value="3">3 Hours</option>
                                            <option value="3.5">3.5 Hours</option>
                                            <option value="4">4 Hours</option>
                                            <option value="4.5">4.5 Hours</option>
                                            <option value="5">5 Hours</option>
                                        </select>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check mt-2" onclick="calulcate_order()">
                                            <input name="insurance" class="form-check-input" type="checkbox" value="1" id="insurance_amount">
                                            <label class="form-check-label" for="insurance_amount">
                                                Add Insurance ${{$service->insurance_amount}}
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="pr-5">{{$discount_title}}:  </b> $<span id="discount_amount">{{$discount_amount}}</span>
                                        <br>
                                        <span>Note: 10% discount will be given to only students</span>
                                    </li>

                                    <li class="list-group-item"><b class="pr-5">Order Total Amount: </b> $<span id="total_amount">0.00</span></li>
                                </ul>

                                <div class="text-center mt-4">
                                    <button type="submit"  class="btn btn-primary">Reserve Now</button>
                                </div>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        </div>

    </section>

@section('footer_scripts')
<script>
var per_hour_rate = '{{$service->per_hour_rate}}';

    function calulcate_order() {
        let hours = parseFloat($('#hours').val());
        let discount = 0;
        let insurance_amount = 0;
        if($('#insurance_amount').is(':checked')){
            insurance_amount = parseFloat('{{$service->insurance_amount}}');
        }
        let discount_percentage =  parseInt('{{$discount}}');
        if(discount_percentage > 0) {
            discount =  hours * per_hour_rate * discount_percentage / 100
        }
        console.log(discount);
        $('#discount_amount').text(discount);
        let security = parseFloat('{{$service->security_deposit}}');
        let total = (hours * per_hour_rate) + security + insurance_amount - discount;
        $('#total_amount').text(total);

    }

    calulcate_order();
</script>
@endsection
