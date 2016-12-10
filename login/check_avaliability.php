<?php
	include "check.php";
	
	$user = strtolower($_POST['user']);
	if($user)
	{
		if (preg_match('/[^A-Za-z0-9]/', $user))
		{
			$user = '';
		}
		$user = check($user);
		if(empty($user))
		{
			echo "<span style='color:red'>Invalid Data ".$str."</span>";
		}
	}

	
	$email = $_POST['email'];
	if(!empty($email))
	{
		$email = check($email);
		if(empty($email))
		{
			echo "<span style='color:red'>Invalid Data ".$str."</span>";
		}
		else
		{
			$email = validate_email($email);
			if(empty($email))
			{
				echo "<span style='color:red'> Invalid Email.</span> ";
			}
		}
	}

if(!empty($user) || !empty($email))
{
	include "../file.php";
	$sql = "SELECT email from fd_users where email='$email'";
	$sql1 = "SELECT username from fd_users where username='$user'";
	if(!($email))
	{
		$sql = $sql1;
	}
	$result = $con->query($sql);
	if($result->num_rows > 0)
	{
		echo "<p style='color:red'> not available</p>";
	}
	else
	{
		echo "<p style='color:green'> available</p>";
	}
}
?>