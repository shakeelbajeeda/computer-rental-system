
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
	<b>{{$subject}}</b>
	</center>
	<p>
		<h3>Complaint Detail</h3>
		<hr>
		<br>
		<span>Customer Name:</span> {{$package->name}} <br>
		<span>Service Name:</span> {{$package->service->title}}  <br>
		<span>Customer Email:</span> {{$package->email}} <br>
		<span>Contact Number:</span> {{$package->phone}}  <br>
		<span>Description:</span> {{$package->description}} <br>
		<span>Image:</span> <a  download href="{{asset('public/images/complaints')}}/{{$package->image}}">Download</a> <br>
		

	</p>
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