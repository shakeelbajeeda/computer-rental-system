﻿@extends('layouts.website')
@section('content')
    <style>

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
                <div class="h1 text-center mt-3 text-dark">Order Details</div>
                <div class="row my-5">
                    <div class="col-md-6">
                        <div>
                            <img width="100%" class="rounded"
                                src="{{ asset(env('PUBLIC_URL') . 'website/assets/images/services_images/laptop.jpg') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" mb-4">
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b class="pr-5">Brand: </b>Apple</li>
                                    <li class="list-group-item"><b class="pr-5">Name: </b>Mac Book Pro</li>
                                    <li class="list-group-item"><b class="pr-5">Rate Per/Hour: </b>$10</li>
                                    <li class="list-group-item"><b class="pr-5">Security Deposit: </b>$5</li>
                                    <li class="list-group-item"><b class="pr-5">Select Hours: </b>
                                        <select class="form-control" aria-label="Default select example">
                                            <option selected>Select Hours</option>
                                            <option value="1">1 Hours</option>
                                            <option value="2">2 Hours</option>
                                            <option value="3">3 Hours</option>
                                            <option value="3">4 Hours</option>
                                            <option value="3">5 Hours</option>
                                        </select>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Add Insurance
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item"><b class="pr-5">Order Total Amount: </b>$50</li>
                                </ul>

                                <div class="text-center mt-4">
                                    <a href="" class="btn btn-primary">Reserve Now</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        </div>

    </section>