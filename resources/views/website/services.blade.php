@extends('layouts.website')
@section('content')
    <style>
        .c_title {
            height: 71px;
            overflow: hidden;
        }

        .pagination {
            justify-content: center;
        }

    </style>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover"
        style="background-image: url('{{ asset(env('PUBLIC_URL') . 'website/assets/images/slider_images/slider_2.jpg') }}')">
        <div class="banner-bg">

        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SERVICES PRICING PART START ======-->

    <section class="services-pricing-area pt-5 priceing-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <form action="">
                            <div class="input-group mb-3">
                                
                                <input type="text" class="form-control" value="{{@request()->get('search')}}" name="search" placeholder="Search Rental Services">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <h2 class="title" style="color: white;">View All Services</h2>
                    </div>
                </div>
            </div>
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        @foreach ($services as $product)
                            <div class="col-md-3 mb-5">
                                <div class="card">
                                    @if ($product->is_rented == 1)
                                        <span class="rent_out">Reserved</span>
                                    @endif
                                    <img height="230px"
                                        src="{{ asset(env('PUBLIC_URL') . 'public/images/service_images/') }}/{{ $product->image }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $product->title }}</h5>
                                        <p class="card-text">${{ $product->per_hour_rate }} Per/Hour</p>
                                    </div>
                                    <div class="card-body text-center">
                                        <a href="{{ route('checkout_page', [$product->id]) }}"
                                            class="card-link btn btn-primary">Rent it</a>
                                        <a href="{{ route('single', [$product->id]) }}"
                                            class="card-link btn btn-primary float-end">View
                                            Detail</a>
                            </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== SERVICES PRICING PART ENDS ======-->
@endsection
