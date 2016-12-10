<?php
	include "check.php";
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">    
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Feedify | Sign UP </title>
		<link rel="stylesheet" href="/css/custom.css">
		<link rel="stylesheet" href="/css/header.css">
		<link href="css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			body
				{
				background-color: #eee;
				}
			.attempt{
				color:;
				background: #ffebe8;
				border: 1px solid #dd3c10;
				padding-top: 10px;
				padding-left: 5px;
				padding-right: 5px;
				padding-bottom: -15px;
				text-align: center;
				font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
				font-size: 11px;
			}
			</style> 
	</head>
	<body>
		<div class="body">
		<?php
		include "../header.php";
		?>
		</div>
		<center>
				<div class="container" style="max-width:300px;position: absolute; left: 50%;">
					<div style="position: relative; left: -50%;">
						<form class="form-signin" onsubmit="return validateMyForm();" action='register.php' method=post>
							<h4 class="form-signin-heading">Register For Free</h4><br>
							<!--
							<input id="inputName" class="form-control" placeholder="First Name" required autofocus="" name="fname" type="text" value="" >
							<input id="inputName" class="form-control" placeholder="Last Name" required autofocus="" name="lname" type="text" value="" ><br>
							<input id="inputSex" class="" type="radio" required name="sex" value="M">Male
							<input id="inputSex" style="margin-left:25px;" type="radio" required name="sex" value="F">Female<br/><br/>
							<input id="inputMobile" class="form-control" placeholder="Mobile" required autofocus="" name="mobile" type="tel" value="" ><br>
							<input id="inputFbid" class="form-control" placeholder="Link of Facebook profile" autofocus="" name="fbid" type="text" value="" ><br>
							<input id="inputPlace" class="form-control" placeholder="Current City" autofocus="" name="city" type="text"><br>
							-->
							<input id="inputEmail" class="form-control" placeholder="Email" onblur="check_email()" required autofocus="" name="email" type="email" value="" ><p><img src="/images/loader.gif" id="loaderIcon" style="display:none" /><span id="email-availability-status"></span></p>
							<input id="inputUsername" class="form-control" placeholder="Desired Username" required onblur="check_user()" autofocus="" name="user" type="text" value=""><p><img src="/images/loader.gif" id="loaderIcon1" style="display:none" /><span id="user-availability-status"></span></p>
							<input id="inputPassword" class="form-control" placeholder="Password" required  autofocus="" name="pass" type="password" value=""><br>
							<button id="submit" class="btn btn-lg btn-primary btn-block" onclick="return validateMyForm()" type="submit">Register</button>
						</form>
						<a href="/login/"><button class=".btn btn-lg btn-block" style="margin-bottom:100px;background-color:lightgreen">  Login </button></a>
					</div>
				</div>
			</center>

		<script src="css/jquery-2.js"></script>
		<script src="css/bootstrap.js"></script>
	</body>
</html>

<script type="text/javascript">
	function check_user() 
	{
		$("#loaderIcon1").show();
		jQuery.ajax(
		{
			url: "check_avaliability.php",
			data:'user='+$("#inputUsername").val(),
			type: "POST",
			success:function(data)
			{
				$("#user-availability-status").html(data);
				$("#loaderIcon1").hide();
			},
			error:function (){}
		});
	}

	function check_email() 
	{
		$("#loaderIcon").show();
		jQuery.ajax(
		{
			url: "check_avaliability.php",
			data:'email='+$("#inputEmail").val(),
			type: "POST",
			success:function(data)
			{
				$("#email-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error:function (){}
		});
	}

	function validateMyForm()
	{
		var e = $("#email-availability-status");
		var u = $("#user-availability-status");
		var email = e.html();
		var user = u.html();
		var pass = $("#inputPassword").val();
		var l = pass.length;

		if(email.toLowerCase().indexOf("valid") >= 0 )
		{
			e.html("<span style='color:red'>Please enter valid email.</span>");
			return false;
		}

		else if(email.toLowerCase().indexOf("not") >= 0 )
		{
			e.html("<span style='color:red'>Please choose another email.</span>");
			return false;
		}

		else if(user.toLowerCase().indexOf("not") >= 0 )
		{
			u.html("<span style='color:red'>Please choose another username</span>");
			return false;
		}
		else if(user.toLowerCase().indexOf("invalid") >= 0 )
		{
			u.html("<span style='color:red'>Please Enter valid username</span>");
			return false;
		}
		
		else if(pass.length < 8)
		{
			alert("password should be of length 8 characters.");
			return false;		
		}
		else
		{
			return true;
		}
	}
</script>