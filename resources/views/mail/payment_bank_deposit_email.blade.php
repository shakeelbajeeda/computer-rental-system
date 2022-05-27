
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <title></title> -->
	</head>
	<body style="background: white;; background-color: white;; ">
	<div style="background-color:white;; font-family: Arial,Arial,Arial,Tahoma,Helvetica,sans-serif; font-size: 16px; width:80%; margin: 0 auto; max-width: 100%;">
	<table style="background-color:white;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef" align="center">
		<br>
		<center><img src="{{asset('public/angvo/assets/images/logo.png')}}"/>
	</center>
	<tbody>
	<tr>
	<td style="background-color:white;" width="100%" bgcolor="#efefef" align="center">
	<table style="background-color:white;" width="100%" cellspacing="0" cellpadding="0" border="0">

	<tbody>



	<tr>
	<td align="top" align="center">&nbsp;</td>
	</tr>




	<tr>
	<td  valign="top" align="center">
	<table  style="background-color:white;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

	<tbody>
	<td valign="top" align="center">
	<table style="background-color:white;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">

	<tbody><tr>
	<td valign="top" align="center">
	<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="font-family:Arial,Tahoma,Helvetica,sans-serif; color:#4c505d;">

	<tbody>

	<tr>
	<td align="center" style="font-size:16px;line-height:22px;font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;font-weight:300;text-align:left;letter-spacing:-0.1px; padding: 30px; margin-left:5px;margin-right: 5px;">
	
	<br>
	<center>
		<b>Order Placed Successfully!</b>
	</center>
	
	<p>
		<h3>Order Detail</h3>
		<hr>
		<br>
		<span>Customer Name:</span> {{$customer_name}} <br>
		<span>Order ID:</span> {{$ref_no}} <br>
		<span>Subtotal:</span> {{$subtotal}}  PKR<br>
		<span>Discount:</span> {{$coupon_discount}} PKR<br>
		<span>Total Payable Amount:</span> {{$total}}  PKR<br>
		<span>Payment Method:</span> {{$payment_method}} <br>
		<span>Status:</span> {{$status}} <br>

	</p>
	<p>
		You have bought following services
	</p>
	<table style="border-collapse: collapse; width: 100%;">
	<thead>
		<th style="border: 1px solid #000; padding: 5px">#</th>
		<th style="border: 1px solid #000; padding: 5px">Service</th>
		<th style="border: 1px solid #000; padding: 5px">Subscription</th>
		<th style="border: 1px solid #000; padding: 5px">Expiry</th>
		<th style="border: 1px solid #000; padding: 5px">Price</th>
	</thead>
	<tbody>
		<?php $count=1; ?>
		@foreach($packages as $key=>$p)
		<tr>
			<td style="border: 1px solid #000; padding: 5px">{{$count}}</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->title}} @if($p->sub_service_title != '') ( {{$p->sub_service_title}} ) @endif</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->package}}</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->expire_at}}</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->price}} PKR</td>
		</tr>
		<?php $count++ ?>
		@endforeach
		<tr>
			<td colspan="4" style="border: 1px solid #000; padding: 5px"><strong style="float: right;">Subtotal</strong></td>
			<td style="border: 1px solid #000; padding: 5px">
				{{number_format((float)$subtotal, 2, '.', '')}} PKR
				 
			</td>
		</tr>
		<tr>
			<td colspan="4" style="border: 1px solid #000; padding: 5px"><strong style="float: right;">Discount</strong></td>
			<td style="border: 1px solid #000; padding: 5px">
				{{number_format((float)$coupon_discount, 2, '.', '')}} PKR
				 
			</td>
		</tr>
		<tr>
			<td colspan="4" style="border: 1px solid #000; padding: 5px"><strong style="float: right;">Total Payable Amount</strong></td>
			<td style="border: 1px solid #000; padding: 5px">
				{{number_format((float)$total, 2, '.', '')}} PKR
				 
			</td>
		</tr>
	</tbody>
</table>

	<br>
	<a href="{{route('my_orders')}}" style="background: #7859fd 0 0 no-repeat padding-box;
    padding: 10px;
    border-radius: 10px;
    color: white;
    text-decoration: none;">View Your Order</a>
    <br><br>
    <p> Please deposit {{number_format((float)$total, 2, '.', '')}} PKR in any of the following bank accounts</p>
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
	<a href="{{route('verify_payment')}}" style="background: #7859fd 0 0 no-repeat padding-box;
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