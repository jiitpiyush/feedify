
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
			$check_table = "SELECT * FROM ".$user;
			$table_result = $con->query($check_table);
			if($con->error)
			{
				$create_table = "CREATE TABLE ".$user. " (category varchar(20), sub_cat varchar(25), site varchar(20), PRIMARY KEY (category, sub_cat, site))";
				$table_result = $con->query($create_table);
				if($table_result)
				{
				}
				else
				{
					echo "Error in creating please try again after some time";
					die();
				}
			}
			
			/*
			$check_cat = "SELECT * FROM ".$user. " WHERE category = '$cat' AND sub_cat = 'sub' AND site='$site'";
			$cat_result = $con->query($check_cat);
			if($cat_result->num_rows > 0)
			{
				echo "already added category";
			}
			else
			{
			*/
				$a = "all";
				
				if(!(strcmp($sub, $a)))
				{
					$rm_cat = "DELETE FROM ".$user." WHERE category='$cat' AND site='$site'";
					$rm_result = $con->query($rm_cat);
					$add_cat = "INSERT INTO ".$user." VALUES('$cat','$sub','$site')";
					$add_result = $con->query($add_cat);
					if(!($con->error))
					{
						echo "category added successfully";
					}
					else
					{
						echo "Category ".$cat.', '.$sub.', '.$site." Already Added in your favourite list";
					}
				}
				else
				{
					
					$check_cat = "SELECT * FROM ".$user." WHERE category='$cat' AND sub_cat='$a' AND site='$site'";
					$cat_result = $con->query($check_cat);
					if($cat_result->num_rows > 0)
					{
						echo "All categories of this category is already added";
					}
					else
					{
						$add_cat = "INSERT INTO ".$user." VALUES('$cat','$sub','$site')";
						$add_result = $con->query($add_cat);
						if(!($con->error))
						{
							echo "category added successfully";
						}
						else
						{
						echo "Category ".$cat.', '.$sub.', '.$site." Already Added in your favourite list";
						}
					}
				}
		}
		else
		{
			echo "Please login again";
			die();
		}

	}
	else
	{
		echo "Login First";
	}
?>

