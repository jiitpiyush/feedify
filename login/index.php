<html>
<head>

		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
		<meta http-equiv='cache-control' content='no-cache' />
		<meta http-equiv='expires' content='Tue, 01 Jan 1980 1:00:00 GMT' />
		<meta http-equiv='pragma' content='no-cache' />
		<meta name='description' content=''>
		<title>Feedify | Log in</title>
		<link href='/login/css/bootstrap.css' rel='stylesheet'>
		<style type='text/css'>
		body{padding: 70px;}
		.attempt{
				color:;
				background: #ffebe8;
				border: 1px solid #dd3c10;
				padding: 10px;
				text-align: center;
				font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
				font-size: 11px;
			}
			.log
			{
				color:;
				background: #FFF9D7;
				border: 1px solid #E2C822;
				padding: 10px;
				text-align: center;
				font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
				font-size: 11px;
			}
		</style>
</head>
<?php

$attempt = $_GET['login_attempt'];
$user  = $_COOKIE['user'];
if(!$user)
{
	$user = $_GET['user'];
}
else
{
	$pass  = $_COOKIE['pass'];
}

$rdir = $_GET['next'];

$x = preg_match('/"/', $user);
$y = preg_match("/'/", $user);
if($x || $y)
{
	$user = "";
}

//$user = htmlspecialchars($user, ENT_QUOTES);

if(!($user && $pass))
{
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

echo "
	<body>
		<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
			<div class='container'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
						<span class='sr-only'>Toggle navigation</span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					<a class='navbar-brand' href='/'><img src='/css/logo.png'/></a>
				</div>
				<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
					<ul class='nav navbar-nav navbar-right'>
						<li><a href='/login/signup.php'>Sign Up</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<center>
				<div class='container' style='max-width:300px;position: absolute; left: 50%;'>
					<div style='position: relative; left: -50%;'>
						<form class='form-signin' action='/login/login.php?next=$rdir' method=post>
							<h2 class='form-signin-heading'>Log in</h2><br>";
                                                         
                                                         
                                                               if($attempt==1){
                                                               	echo "<p class=attempt>
                                                                 Invalid Email or Password. Try again
                                                               </p>
                                                               ";
                                                               }
                                                               else if($attempt==2)
                                                               {
                                                               	echo "<p class=log>
                                                                 You must Login to continue
                                                               </p>
                                                               ";
                                                               }
                                                               
                                                        

						echo "<input id='inputEmail' class='form-control' placeholder='Username' required name='user' type='text' value=" .$user . "><br>
							<input id='inputPassword' class='form-control' placeholder='Password' required name='pass' type='password'><br>
							<div class=''>
								
									<a href='/login/forgot_pass.php'> forgot password?</a>
								
							</div><br>
							<button class='btn btn-lg btn-primary btn-block' type='submit'>Log In</button>
						</form>
					   <a href='/login/signup.php'><button class='.btn btn-lg btn-block' style='margin-bottom:100px;float:left;background-color:lightgreen'>  Register </button></a>
					</div>
					</div>
			</center>
		<script src='css/jquery-2.js'></script>
		<script src='css/bootstrap.js'></script>
	</body>
</html> ";
}
else
{
	header('Location: http://feedify.co.in/login/login.php');
}

?>
		<script type="text/javascript">
			var user = document.getElementById('inputEmail').value;
			if(user)
			{
				document.getElementById('inputPassword').focus();
			}
			else
			{
				document.getElementById('inputEmail').focus();
			}
		</script>
</body>
</html>