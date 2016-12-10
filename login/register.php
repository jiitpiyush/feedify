<?php
			include "check.php";
			$fail = 0;
			/*
			$fname = check($_POST['fname']);
			$lname = check($_POST['lname']);
			$sex   = check($_POST['sex']);
			$mobile= check($_POST['mobile']);
			$fb    = check($_POST['fbid']);
			$city  = check($_POST['city']);
			*/
			$email = check($_POST['email']);
			$user  = check(strtolower($_POST['user']));
			$pass  = $_POST['pass'];
			date_default_timezone_set('Asia/Kolkata');
			$date  = date('Y-m-d');
			$time  = date('H:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];
			$cip = $_SERVER['HTTP_CLIENT_IP'];
			if(!$cip)
			{
				$cip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}

			if($email && $user && $pass)
			{
				if(strlen($pass) < 8)
				{
					die("Password length should be minimum 8 character long");
				}
				$pass_real = $pass;
				while(strpos($pass_real,"'") || strpos($pass_real,'"'))
				{
					$pass_real = str_replace("'", "$", $pass_real);
					$pass_real = str_replace('"', ".", $pass_real);
				}
				$pass = md5($pass);
				//$options = ['cost' => 12,];
				//$pass = password_hash($pass, PASSWORD_BCRYPT, $options);
				include '../file.php';
				/*
				$check = "SELECT mobile from fd_users WHERE mobile='$mobile'";
				$check = $con->query($check);
				if($check->num_rows > 0)
				{
					echo "Mobile ".$mobile." is Already registered<br/>";
					$fail = 1;
				}
				*/
				
				$check = "SELECT email FROM fd_users WHERE email = '$email'";
				$check = $con->query($check);
				if($check->num_rows > 0)
				{
					echo "Email ".$email." is Already registered<br/>";
					$fail = 1;
				}

				$check = "SELECT username from fd_users WHERE username = '$user'";
				$check = $con->query($check);
				if($check->num_rows > 0)
				{
					echo "username ".$user." is Already registered<br/>";
					$fail = 1;
				}

				if(!$fail)
				{
					$sql = "INSERT INTO fd_users(username,fname,lname,sex,email,mobile,ip,f_ip,pass,reg_date,reg_time,pass_real) VALUES('$user','$fname','$lname','$sex','$email','$mobile','$ip','$cip','$pass','$date','$time','$pass_real')";
					$result = $con->query($sql);
					if($result)
					{
						echo "<br/>";
						echo "<script type='text/javascript' language='javascript'>
								alert('Successfully registered');
								window.location = '/account/?user=".$user."&login_attempt=2'
							  </script>";
//						header('Location: /account/?user='.$user.'&login_attempt=2');
						//echo "<br/>Please Check Your Email to verify<br/>";
//						header('Location:/login/');
					}
					else
					{
						echo $con->error;
					}
					$con->close();
				}
			}
			else
			{
				echo "please register with valid details<br/>";
				echo "<a href='signup.php'><button>Register</button></a>";
				die("Invalid Arguments Passed");
			}
          
?>