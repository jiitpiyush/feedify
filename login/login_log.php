<?php
	function login_log($user,$type)
	{
		include '../file.php';
		date_default_timezone_set('Asia/Kolkata');
		$time = date('Y-m-d H:i:s');
		$login_log = "INSERT INTO login_log VALUES('$user','$time','$type')";
		$log_res = $con->query($login_log);
		$con->close;
		if($log_res)
			return 1;
		else
			return 0;
	}
?>