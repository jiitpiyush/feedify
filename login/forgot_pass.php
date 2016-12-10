<?php
 $email = $_POST['email'];
 $pin = $_POST['pin'];
?>
<html>
<head>

		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
		<meta http-equiv='cache-control' content='no-cache' />
		<meta http-equiv='expires' content='Tue, 01 Jan 1980 1:00:00 GMT' />
		<meta http-equiv='pragma' content='no-cache' />
		<meta name='description' content=''>
		<title>Feedify | Forgot Password</title>
		<link href='/login/css/bootstrap.css' rel='stylesheet'>
		<style type='text/css'>
		body{padding: 70px;}
		.red
		{
			color:;
			background: #ffebe8;
			border: 1px solid #dd3c10;
		}
		.yellow
		{
			background: #FFF9D7;
			border: 1px solid #E2C822;		
		} 
		.box
		{
			padding: 10px;
			text-align: center;
			font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
			font-size: 11px;
		}
		</style>
</head>
	<body>
		<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
			<div class='container'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
						<span class='sr-only'></span>
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
						<form class='form-signin' action='/login/forgot_pass.php' method=post>
							<h2 class='form-signin-heading'>Forgot Password</h2><br>
						<?php
							include "check.php";
							date_default_timezone_set('Asia/Kolkata');
							if(!empty($email))
							{
								$email = check($email);
								if(!empty($email))
								{
									$email = validate_email($email);
									if(!empty($email))
									{
										//check in db email
										include "../file.php";
										$e_query = "SELECT email from fd_users WHERE email='$email'";
										$e_result = $con->query($e_query);
										if($e_result->num_rows > 0)
										{
											$e_available = 1;
										}
										else
										{
											$e_available = 0;
										}

										if($e_available)//
										{

											//$db_pin = get db pin;
											$time = date('Y-m-d H:i:s');
											//echo $time;
											$pin_query = "SELECT pin,f_attempt FROM forgot_pass_op WHERE email='$email' AND pin_time > '$time'";
											$pin_result = $con->query($pin_query);
											if($pin_result->num_rows > 0)
											{
												$pin_row = $pin_result->fetch_assoc();
												$db_pin = $pin_row['pin'];
												//$attempt = get attempt
												$attempt = $pin_row['f_attempt'];
											}
											else
											{
												$db_pin = '';
												$attempt = '';
											}
											
											if(!empty($db_pin) && $attempt < 11)
											{
												
												if(empty($pin))
												{
													echo "<input id='inputEmail' class='form-control' placeholder='Enter email' name='email' type='hidden' value=".$email." required autocomplete='false'><br>
															<input id='inputPin' class='form-control' placeholder='Enter Pin' name='pin' type='tel' required autocomplete='false'><br>
															<input id='inputPass' class='form-control' placeholder='Enter New Password' name='pass' type='password' required autocomplete='false'><br>
															<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
												}
												else
												{
													if($db_pin == $pin)
													{

 														$password = $_POST['pass'];
														if(strlen($password) > 7 )
														{
															//Change Password
 															$pass = md5($password);
															//$options = array('cost' => 12);
															//$pass = password_hash($pass, PASSWORD_BCRYPT, $options);

															$pass_query = "UPDATE fd_users set pass='$pass' , pass_real='$password' WHERE email='$email'";
															$pass_result = $con->query($pass_query);
															if($pass_result)
															{
																$sql_rm = "DELETE FROM forgot_pass_op WHERE email='$email'";
																$rm_result = $con->query($sql_rm);
																//Password Changed Successfully
																echo "<p class='yellow box'>Password Changed Successfully<br/></p>";
																//Login
																echo "</form>
																		<a href='/login/'><button class='btn btn-lg btn-primary btn-block' type='submit'>Login</button></a>";
															}
															else
															{
																echo "<p class='yellow box'>Error occured Please try again</p>";
																echo "<input id='inputEmail' class='form-control' placeholder='Enter email' name='email' type='hidden' value=".$email." required autocomplete='false'><br>
																		<input id='inputPin' class='form-control' placeholder='Enter Pin' name='pin' type='hidden' value=".$pin." required autocomplete='false'><br>
																		<input id='inputPass' class='form-control' placeholder='Enter New Password' name='pass' type='password' required autocomplete='false'><br>
																		<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
															}
														}
														else
														{
															echo "<p class='red box'>Password should be of minimum length 8 </p></br>";
															echo "<input id='inputEmail' class='form-control' placeholder='Enter email' name='email' type='hidden' value=".$email." required autocomplete='false'><br>
																	<input id='inputPin' class='form-control' placeholder='Enter Pin' name='pin' type='hidden' value=".$pin." required autocomplete='false'><br>
																	<input id='inputPass' class='form-control' placeholder='Enter New Password' name='pass' type='password' required autocomplete='false'><br>
																	<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
														}
													}
													else
													{
														$attempt++;
														$at_query = "UPDATE forgot_pass_op set f_attempt='$attempt' WHERE email='$email'";
														$at_result = $con->query($at_query);

														$left = 10 - $attempt;
														echo "<p class='red box'>Wrong Pin <br/><b font-size='50px'>". $left ."</b> attempts Left . You will be blocked for 10 min</p><br/>";
														if($attempt < 10)
														{
															echo "<input id='inputEmail' class='form-control' placeholder='Enter email' name='email' type='hidden' value=".$email." required autocomplete='false'><br>
																<input id='inputPin' class='form-control' placeholder='Enter Pin' name='pin' type='tel' required autocomplete='false'><br>
																<input id='inputPass' class='form-control' placeholder='Enter New Password' name='pass' type='password' required autocomplete='false'><br>
																<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
														}
														else
														{
															//*//Block User
															//*//Blocked For 00:05:00 - {$time_now()-$time_db} 
															
															//remove pin
															$rm_pin_query = "DELETE FROM forgot_pass_op WHERE email='$email'";
															$rm_pin_result = $con->query($rm_pin_query);
															//Please Try Again
															echo "<input id='inputEmail' class='form-control' placeholder='Registered Email' name='email' type='text' required autocomplete='on'><br>
																  	<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";

														}
													}
												}
											}
											else if(!empty($db_pin) && $attempt > 10)
											{
												echo "<p class='red box'> Please try again</p></br/>";
												echo "<input id='inputEmail' class='form-control' placeholder='Registered Email' name='email' type='text' required autocomplete='on'><br>
														<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
											}
											else if(empty($db_pin))
											{
												//generate_pin();
												$n_pin = rand(100000,999999);
												$d_time = date('Y-m-d H:i:s',strtotime('+5 minutes'));
												//echo $pin;
												//store_pin & time;
												$del_query = "DELETE from forgot_pass_op where email='$email'";
												$con->query($del_query);
												$store_pin_query = "INSERT INTO forgot_pass_op VALUES('$email','$n_pin','$d_time','0')";
												$store_pin_result = $con->query($store_pin_query);
												if($store_pin_result)
												{
													//send_pin();
													$to = $email;
													$msg = 'Your Verification Code For Feedify is '. $n_pin;
													$sub = 'Forgot Password';
													
													$url = "http://www.linkbazaar.com/feedify.php";
													$query = array('to' => $to,'msg' => $msg, 'sub' => $sub);
													$options = array('http' => array(
																					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
																					'method'  => 'POST',
																					'content' => http_build_query($query),
																					),
																	);
													$context  = stream_context_create($options);
													$result = file_get_contents($url, false, $context);
													echo "<p class='yellow box'>Pin send successfully to your mail account at " . $email."</p><br/>";
												}
												echo "<input id='inputEmail' class='form-control' placeholder='Enter email' name='email' type='hidden' value=".$email." required autocomplete='false'><br>
														<input id='inputPin' class='form-control' placeholder='Enter Pin' name='pin' type='tel' required autocomplete='false'><br>
														<input id='inputPass' class='form-control' placeholder='Enter New Password' name='pass' type='password' required autocomplete='false'><br>
														<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
											}
										}
										else
										{
											echo "<p class='red box'>Email ".$email ." does not exist in our database</p><br/>";
											echo "<input id='inputEmail' class='form-control' placeholder='Registered Email' name='email' type='text' required autocomplete='on'><br>
									  				<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
										}
									}
									else
									{
										echo "<p class='red box'>Please enter in valid format</p><br/>";
										echo "<input id='inputEmail' class='form-control' placeholder='Registered Email' name='email' type='text' required autocomplete='on'><br>
									  			<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
									}
								}
								else
								{
									echo "<p class='red box'>Please enter in valid format</p><br/>";
									echo "<input id='inputEmail' class='form-control' placeholder='Registered Email' name='email' type='text' required autocomplete='on'><br>
									  		<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
								}
							}
							else
							{
								echo "<input id='inputEmail' class='form-control' placeholder='Registered Email' name='email' type='text' required autocomplete='on'><br>
									  	<button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>";
							}
						?>
							</form>
						</div>
					</div>
			</center> 
		<script src='css/jquery-2.js'></script>
		<script src='css/bootstrap.js'></script>
	</body>
</html>