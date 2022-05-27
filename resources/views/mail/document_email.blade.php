
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
		<center><img  style="height:82px;width:400px;" src="{{asset('public/angvo/assets/images/logo.png')}}"/>
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
	<b>New Documents Received!</b>
	<p>
		You have received following documents
	</p>
	<table style="border-collapse: collapse; width: 100%;">
	<thead>
		<th style="border: 1px solid #000; padding: 5px">#</th>
		<th style="border: 1px solid #000; padding: 5px">Title</th>
		<th style="border: 1px solid #000; padding: 5px">date</th>
		<th style="border: 1px solid #000; padding: 5px">Action</th>
	</thead>
	<tbody>
		<?php $count=1; ?>
		@foreach($documents as $key=>$p)
		<tr>
			<td style="border: 1px solid #000; padding: 5px">{{$count}}</td>
			<td style="border: 1px solid #000; padding: 5px">{{$p->title}}</td>
			
			<td style="border: 1px solid #000; padding: 5px">{{date('m-d-Y',strtotime($p->created_at))}} </td>
			<td style="border: 1px solid #000; padding: 5px">
				<a style="    background: #ff5722 0 0 no-repeat padding-box;
    padding: 4px 10px 4px 10px;
    border-radius: 10px;
    color: white;
    text-decoration: none;" href="{{route('my_documents')}}" download>
               Download
            </a>
			</td>
		</tr>
		<?php $count++ ?>
		@endforeach
	</tbody>
</table>
	<p>
		Please login and view your documents
	</p>
	<br>
	<a href="{{route('my_documents')}}" style="background: #7859fd 0 0 no-repeat padding-box;
    padding: 10px;
    border-radius: 10px;
    color: white;
    text-decoration: none;">View Your Documents</a>
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