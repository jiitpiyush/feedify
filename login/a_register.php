<?php
			include "check.php";
			$fail = 0;
			$email = check($_POST['email']);
			$pass  = check($_POST['password']);
			$fname = check($_POST['fname']);
			$lname =check($_POST['lname']);
			$user = check($_POST['username']);
			date_default_timezone_set('Asia/Kolkata');
			$date  = date('Y-m-d');
			$time  = date('H:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];
			$cip = $_SERVER['HTTP_CLIENT_IP'];
			if(!$cip)
			{
				$cip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}

			if($email && $fname && $lname && $pass)
			{
				if(strlen($pass) < 8)
				{
					echo "password";
				}
				else
				{
					$pass = md5($pass);
					include '../file.php';
				
					$check = "SELECT email FROM fd_users WHERE email = '$email'";
					$check = $con->query($check);
					if($check->num_rows > 0)
					{
						echo "email";
						$fail = 1;
					}

					$check = "SELECT username from fd_users WHERE username = '$user'";
					$check = $con->query($check);
					if($check->num_rows > 0)
					{
						echo "username";
						$fail = 1;
					}	

					if(!$fail)
					{
						$sql = "INSERT INTO fd_users(username,fname,lname,sex,email,mobile,ip,f_ip,pass,reg_date,reg_time) VALUES('$user','$fname','$lname','$sex','$email','$mobile','$ip','$cip','$pass','$date','$time')";
						$result = $con->query($sql);
						if($result)
						{
							echo "successfull";
						}
						else
						{
							echo "unsuccessfull";
						}
						$con->close();
					}
				}
			else
			{
				echo "invalid";
			}       
?>