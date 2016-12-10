<?php
function check_fb($str)
{
	while(strpos($str, "'"))
	{
		$str = str_replace("'", " ", $str);
	}
	return $str;
}
			$id= check_fb($_POST['id']);
			$story = check_fb($_POST['story']);
			$message = check_fb($_POST['message']);
			$dt = $_POST['date'];
			$pname = $_POST['name'];
			$gid  = $_POST['gid'];
			$gname= $_POST['gname'];
			date_default_timezone_set('Asia/Kolkata');
			$time_now = date('Y-m-d H:i:s');
			
			for($i=0;$i<10;$i++)
 			{
 				$date .= $dt[$i];
 			}
			for($i++;$i<19;$i++)
 			{
 				$time .= $dt[$i];
 			}

 			if($id)
 			{
 				include 'file.php';
 				$get_last_date = "SELECT update_time from f_update_time";
 				$last_result = $con->query($get_last_date);
 				if($last_result->num_rows > 0)
 				{
 					$last_date = $last_result->fetch_assoc();
 					$f_update_time = $last_date['update_time'];
 				}
 				else
 				{
 					die("connection error");
 				}
 				$post_time = $date." ".$time;
 				if($post_time > $f_update_time)
 				{
	 				$query = "INSERT INTO fd_facebook(f_post_id,f_pname,f_story,f_msg,f_pdate,f_ptime,group_id) VALUES('$id','$pname','$story','$message','$date','$time','$gid')";
 					$result = $con->query($query);
 					if(!($con->error))
 					{
 						echo "Successfully Inserted Data.<br/>";
	 				}
 					else
 					{
 						echo $con->error;
 					}
	 				$update_time_query = "DELETE FROM f_update_time WHERE 1";
		  			$con->query($update_time_query);
		  			$sql = "INSERT INTO f_update_time VALUES('$time_now')";
		  			$con->query($sql);
		  			$con->close();
	 			}
	 			else
	 			{
	 				echo $id." already updated";
	 			}
 			}
 			else
 			{
 				echo "error";
 			}
 ?>