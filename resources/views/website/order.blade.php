@extends('layouts.website')
@section('content')
    <?php
    $discount = 0;
    $discount_amount = 0.0;
    $discount_title = 'Discount';
    if (auth()->user()->is_student == 1) {
        $discount = 10;
        $discount_title = 'Discount (10%)';
    }
    ?>
    <style>
        b {
            color: #223a66
        }

    </style>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">Order Details</h1>
                        <p class="h6">Your Account Balance <strong>
                                ${{ auth()->user()->total_money }} </strong></p>
                        <h3 class="text-white">{{ $computer->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== computerS PRICING PART START ======-->
    <section>
        <div>
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-6">
                        <div>
                            @if ($computer->is_rented == 1)
                                <span class="rent_out">Reserved</span>
                            @endif
                            <img width="100%" class="rounded"
                                src="{{asset(env('PUBLIC_URL').'public/images/service_images/')}}/{{ $computer->image}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="{{ route('confirm_order') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $computer->id }}">
                            <div class=" mb-4">
                                @if (session()->has('message'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b class="pr-5">Brand:
                                            </b>{{ $computer->brand }}</li>
                                        <li class="list-group-item"><b class="pr-5">Name:
                                            </b>{{ $computer->title }}</li>
                                        <li class="list-group-item"><b class="pr-5">Rate Per/Hour:
                                            </b>${{ $computer->per_hour_rate }}</li>
                                        <li class="list-group-item"><b class="pr-5">Security Deposit:
                                            </b>${{ $computer->security_deposit }}</li>
                                        <li class="list-group-item"><b class="pr-5">Select Hours: </b>
                                            <select name="hours" onchange="calulcate_order();" id="hours"
                                                class="form-control" aria-label="Default select example">
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
                                                <input name="insurance" class="form-check-input" type="checkbox" value="1"
                                                    id="insurance_amount">
                                                <label class="form-check-label" for="insurance_amount">
                                                    Add Insurance ${{ $computer->insurance_amount }}
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="pr-5">{{ $discount_title }}: </b> $<span
                                                id="discount_amount">{{ $discount_amount }}</span>
                                            <br>
                                            <span>Note: 10% discount will be given to only students</span>
                                        </li>

                                        <li class="list-group-item"><b class="pr-5">Order Total Amount: </b>
                                            $<span id="total_amount">0.00</span></li>
                                    </ul>

                                    <div class="text-center mt-4">
                                        @if($computer->is_rented == 1)
                                        <button type="button" class="btn btn-primary">Already Reserved</button>

                                        @else
                                        <button type="submit" class="btn btn-primary">Reserve Now</button>

                                        @endif
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

    <script>
        var per_hour_rate = '{{ $computer->per_hour_rate }}';

        function calulcate_order() {
            let hours = parseFloat($('#hours').val());
            let discount = 0;
            let insurance_amount = 0;
            if ($('#insurance_amount').is(':checked')) {
                insurance_amount = parseFloat('{{ $computer->insurance_amount }}');
            }
            let discount_percentage = parseInt('{{ $discount }}');
            if (discount_percentage > 0) {
                discount = hours * per_hour_rate * discount_percentage / 100
            }
            console.log(discount);
            $('#discount_amount').text(discount);
            let security = parseFloat('{{ $computer->security_deposit }}');
            let total = (hours * per_hour_rate) + security + insurance_amount - discount;
            $('#total_amount').text(total);

        }

        calulcate_order();
    </script>
@endsection
