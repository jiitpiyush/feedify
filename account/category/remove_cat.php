
<?php
	$user = $_COOKIE['user'];
	include "../../login/check.php";
	include "../../file.php";
	if(!(empty($user)))
	{
		$user_check = "SELECT username from fd_users WHERE username = '$user'";
		$user_result = $con->query($user_check);
		if($user_result->num_rows > 0)
		{
			$user = "zzz01".$user;
			$cat = check($_POST['cat']);
			$sub = check($_POST['sub_cat']);
			$site = check($_POST['site']);
			$check_table = "SELECT * FROM ".$user." WHERE category='$cat' AND sub_cat='$sub' AND site='$site'";
			$table_result = $con->query($check_table);
			if($table_result->num_rows > 0)
			{
					$rm_cat = "DELETE FROM ".$user." WHERE category='$cat' AND sub_cat='$sub' AND site='$site'";
					$rm_result = $con->query($rm_cat);
					echo "category removed";
			}
			else
			{
				echo "This is not in your category list";
			}
					
		}
		else
		{
			echo "Please login again";
			die("");
		}
	}
	else
	{
		echo "Login First";
	}
?>

