
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <title></title> -->
	</head>
	<body style="background: white; background-color: white; ">
	<div style="background-color:white; font-family: Arial,Arial,Arial,Tahoma,Helvetica,sans-serif; font-size: 16px; width:80%; margin: 0 auto; max-width: 100%;">
	<table style="background-color:white" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef" align="center">
		<br>
		<center><img src="{{asset('public/angvo/assets/images/logo.png')}}"/>
	</center>
	<tbody>
	<tr>
	<td style="background-color:white" width="100%" bgcolor="#efefef" align="center">
	<table style="background-color:white" width="100%" cellspacing="0" cellpadding="0" border="0">

	<tbody>



	<tr>
	<td align="top" align="center">&nbsp;</td>
	</tr>




	<tr>
	<td  valign="top" align="center">
	<table  style="background-color:white" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

	<tbody>
	<td valign="top" align="center">
	<table style="background-color:white" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">

	<tbody><tr>
	<td valign="top" align="center">
	<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="font-family:Arial,Tahoma,Helvetica,sans-serif; color:#4c505d;">

	<tbody>

	<tr>
	<td align="center" style="font-size:16px;line-height:22px;font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;font-weight:300;text-align:left;letter-spacing:-0.1px; padding: 30px; margin-left:5px;margin-right: 5px;">
	
	<br>
	<center>
	<b>Package Renewal Request has sent successfully!</b>
	</center>
	<p>
		<h3>Order Detail</h3>
		<hr>
		<br>
		<span>Customer Name:</span> {{$customer_name}} <br>
		<span>Service Name:</span> {{$package->title}} @if(isset($pacakge->sub_service_title) and !empty($package->sub_service_title)) ({{$package->sub_service_title}}) @endif <br>
		<span>Subscription:</span> {{$package->package}} <br>
		{{--<span>Total Payable Amount:</span> {{$package->price}}  PKR<br>--}}

		@php
			$Setting = App\Setting::where('type','usd_to_pkr')->get()->first();
            $Settingvalue = $Setting['value'];
		@endphp

{{--		@if(isset($package->sub_service_title) and !empty($package->sub_service_title))--}}
            @if(isset($package->sub_service_id) and !empty($package->sub_service_id) and $package->sub_service_id > 0)

			@php

				$Sub_service = App\Sub_service::where('package_id', $package->package_id)->where('title', $package->sub_service_title)->get()->first();

                 // $Sub_service = App\Sub_service::where('package_id', $package->package_id)->where('id', $package->sub_service_id)->get()->first();

                    $one_month_discounted_price = $Sub_service['one_month_discounted_price'];
                    $six_month_discounted_price = $Sub_service['six_month_discounted_price'];
                    $twelve_month_discounted_price = $Sub_service['twelve_month_discounted_price'];



           // $Setting = App\Setting::where('type','usd_to_pkr')->get()->first();
           // $Settingvalue = $Setting['value'];

            $totalPrice = 0;

			@endphp

			@if($package->package == 'Monthly')

				@php    $totalPrice = $one_month_discounted_price*$Settingvalue; @endphp
				<span data-2x="Monthly">Total Payable Amount:</span> {{$totalPrice}}
				PKR<br>

			@elseif($package->package == '1 Year')

				@php    $totalPrice = $twelve_month_discounted_price*$Settingvalue; @endphp
				<span data-2x="1 Year">Total Payable Amount:</span> {{$totalPrice}}
				PKR<br>

			@elseif($package->package == '6 Month')

				@php    $totalPrice = $six_month_discounted_price*$Settingvalue; @endphp

				<span data-2x="6 Month">Total Payable Amount:</span> {{$totalPrice}}
				PKR<br>

			@else

				<span data-2x="here 6">Total Payable Amount:</span> {{$package->price}}
				PKR<br>

			@endif


		@elseif($package->sub_service_id == 0 && ($package->package_type == "sub_service" || $package->package_type == "subscription" ))

			@php

				$Packages = App\Package::where('id', $package->package_id)->get()->first();


                    $one_month_discounted_price = $Packages['one_month_discounted_price'];
                    $six_month_discounted_price = $Packages['six_month_discounted_price'];
                    $twelve_month_discounted_price = $Packages['twelve_month_discounted_price'];

			@endphp

			@if($package->package == 'Monthly')

				@php $totalPrice = $one_month_discounted_price*$Settingvalue; @endphp
				<span data-2x="Here">Total Payable Amount:</span> {{$totalPrice}}
				PKR<br>

			@elseif($package->package == '1 Year')

				@php    $totalPrice = $twelve_month_discounted_price*$Settingvalue; @endphp
				<span data-2x="Here 2">Total Payable Amount:</span> {{$totalPrice}}
				PKR<br>

			@elseif($package->package == '6 Month')

				@php    $totalPrice = $six_month_discounted_price*$Settingvalue; @endphp

				<span data-2x="Here 3">Total Payable Amount:</span> {{$totalPrice}}
				PKR<br>

			@else

				<span data-2x="Here 5">Total Payable Amount:</span> {{$package->price}}
				PKR<br>

			@endif


		@elseif($package->package == 'Forever')

			@php

				$Packages = App\Package::where('id', $package->package_id)->get()->first();

                $price = $Packages['price'];

			@endphp

			@php   $totalPrice = $price*$Settingvalue; @endphp

			<span data-2x="Here 3">Total Payable Amount:</span> {{$totalPrice}}



		@else
			@php $totalPrice = $package->price; @endphp

			<span data-2x="Here 4">Total Payable Amount:</span> {{$totalPrice}}
			PKR<br>

		@endif
		<span>Payment Method:</span> {{$payment_method}} <br>
		<span>Status:</span> {{$status}} <br>

	</p>
    <br><br>
    <p> Please deposit {{$totalPrice}} PKR in any of the following bank accounts</p>
    @if(isset($banks) and sizeof($banks)>0)
    	@foreach($banks as $b)
            <div>
                <p class="bank_detail">
                  <strong>Account Title: </strong>{{$b->account_title}}
                  <br>
                  <strong>Account Number: </strong> {{$b->account_no}}
                  <br>
                  <strong>Bank: </strong> {{$b->bank_name}}
                  <br>
                </p>
            </div>
            <br>
          @endforeach
    @else
    <p>No Bank Found</p>
    @endif

    <p> Please deposit fee and visit following link to verify your payment</p>
	<a href="{{route('upload_renewal_documents',[$package->id])}}" style="background: #7859fd 0 0 no-repeat padding-box;
    padding: 10px;
    border-radius: 10px;
    color: white;
    text-decoration: none;">Verify Payment</a>
    <br><br>
    <p>
    	<br>
    	<b>Angvo Team</b></p>
	</td>
	</tr>
	</tbody>
	</table>
	</td>
	</tr>

	</tbody></table>
	</td>
	</tr>								


	</tbody>
	</table>
	</td>
	</tr>	


	</tbody>
	</table>
	<br>
	<center style="color:black;">&#169; <b style="color:black;">Angvo</b></center>
	<br>
	</td>
	</tr>
	</tbody>
	</table>
	<!-- <br> -->
	</div>

	</body>
	</html>