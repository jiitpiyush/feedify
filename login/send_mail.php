<?php
	$p = $_GET['per'];
	if($p=='yes')
	{
	$user = $_COOKIE['user'];
	include "../file.php";
	$email = 'jiitpiyush@gmail.com';
	$query = "SELECT username from fd_users WHERE email='$email' AND username='$user'";
	$res = $con->query($query);
	if($res->num_rows > 0)
	{
		$all_mails = "SELECT email from fd_users where 1";
		$mail_res = $con->query($all_mails);

		if($mail_res->num_rows > 0)
		{
			while($mail_row = $mail_res->fetch_assoc())
			{
				$to = $mail_row['email'];
				$msg = 'Hello \r\n We have updated our systems and make it more secure from hashed password to  encyted Hashed ,\r\n So we request you to Please Change Your Password.';
				$sub = 'Request for change Password';
				$url = "http://udharimanager.in/piyush.php";
				$query = array('to' => $to,'msg' => $msg, 'sub' => $sub);
				$options = array('http' => array(
												'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
												'method'  => 'POST',
												'content' => http_build_query($query),
												),
								);
				$context  = stream_context_create($options);
				$result = file_get_contents($url, false, $context);
				echo "<p class='yellow box'> send successfully to mail account at " . $to."</p><br/>";
			}									
		}
	}
	}
?>