﻿@extends('layouts.website')
@section('content')
@include('website.include.errors')

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Our Rental</span>
            <h1 class="text-capitalize mb-5 text-lg">Computers</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="col-12 text-center h1 mt-5 text-danger">All Computers</div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($computers as $computer)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5">
                        <img width="200px" height="200px" src="{{asset(env('PUBLIC_URL').'public/images/service_images/')}}/{{ $computer->image}}" alt="">
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">{{ $computer->title }}</h4>
                            <p class="mb-4">Per/Hour Price: ${{ $computer->per_hour_rate }}</p>
                        </div>
                        <div>
                            <a href="{{route('order_page', [$computer->id])}}" class="btn btn-danger">Book Now</a>
                            <a href="{{route('computer_detail', [$computer->id])}}" class="btn btn-danger float-right">See Details</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
@endsection