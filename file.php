<?php
/*
		$servername = "mysql.hostinger.in";
		$db_username ="u498139428_feeds";
		$db_password ="feeds@jiit321";	
*/
		$servername = "localhost";
		$db_username ="root";
		$db_password ="password";	

		$db = "u498139428_feedi";
		
		//creating connection
			$con = new mysqli($servername, $db_username,$db_password,$db);

		//checking connection
			if($con->connect_error)
			{
						$db = 0;
				die("connection failed:" . $con->connect_error);
			}
			$db = 1;
?>