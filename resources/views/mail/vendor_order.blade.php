
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
	<b>{{$general_msg}}</b>
	</center>
	<p>
		<h3>Order Detail</h3>
		<hr>
		<br>
		<span>Vendor Name:</span> {{$vendor_name}} <br>
		<span>Customer Name:</span> {{$customer_name}} <br>
		<span>Order ID:</span> {{$order->ref_no}} <br>
		<span>Payment Method:</span> {{$order->payment_method}} <br>
		<span>Status:</span> {{$order->status}} <br>

	</p>
	<p>
		You have to serve following services
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
		<?php $count=1;
			$total=0;
		 ?>
		@foreach($packages as $key=>$p)
		<tr>
			<td style="border: 1px solid #000; padding: 5px">{{$count}}</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->title}} @if($p->sub_service_title != '') ( {{$p->sub_service_title}} ) @endif</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->package}}</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->expire_at}}</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->price}} PKR</td>
		</tr>
		<?php 
			$count++;
			$total=$total+$p->price
		 ?>
		@endforeach
		<tr>
			<td colspan="4" style="border: 1px solid #000; padding: 5px"><strong style="float: right;">Total Paid Amount</strong></td>
			<td style="border: 1px solid #000; padding: 5px">
				{{number_format((float)$total, 2, '.', '')}} PKR
				 
			</td>
		</tr>
	</tbody>
</table>
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