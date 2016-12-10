<?php
			$user = $_COOKIE['user'];
			$pass = $_COOKIE['pass'];
				//$user = "jiitpiyush";
			if(!empty($user))
			{
				include "../file.php";
				$sql = "SELECT username from fd_users where username='$user' AND pass='$pass'";
				$result = $con->query($sql);
				//echo $sql;
				if($result->num_rows > 0)
				{
					$user = "zzz01".$user;
					$cat = $_GET['cat'];
					$sql = "SELECT DISTINCT sub_cat from $user WHERE category='$cat'";
					//echo $sql;

					$i=0;
					$sub_rslt = $con->query($sql);
					if($sub_rslt->num_rows > 0)
					{
						while($sub_row = $sub_rslt->fetch_assoc())
						{
							$sub_cat = $sub_row['sub_cat'];
							if($sub_cat == 'all')
								$query = "SELECT * FROM fd_rss WHERE category='$cat' AND site IN ";
							else
								$query = "SELECT * FROM fd_rss WHERE category='$cat' AND sub_category='$sub_cat' AND site IN ";

							$get_site = "SELECT site from $user WHERE category='$cat' AND sub_cat='$sub_cat'";
							$site_rslt = $con->query($get_site);
							if($site_rslt->num_rows > 0)
							{
								$query .= "(";
								$site_row = $site_rslt->fetch_assoc();
								$site = $site_row['site'];
								$query .= "'$site'";
								while($site_row = $site_rslt->fetch_assoc())
								{
									$site = $site_row['site'];
									$query .= ", '$site'";
								}
								$query .= ")";
							}
							else
							{
								echo "<script type='text/javascript' language='javascript'>
										alert('You Don't Have added a category yet');
										</script>";
							}
							$query .= " ORDER BY u_date DESC LIMIT 80";
							//echo "<script type='text/javascript' language='javascript'> alert(".$query."); </script><br/>";
							$data_result = $con->query($query);
							if($data_result->num_rows > 0)
							{
								while ($data_row = $data_result->fetch_assoc()) 
								{
									//echo $data_row['category']." ".$data_row['sub_category']." ".$data_row['site']." ".$data_row['u_date']."<br/>";
									echo "<div class='panel panel-default'>
      									<div class='panel-heading' data-toggle='collapse'>
       									<a data-toggle='collapse' style='text-decoration: none;' data-parent='#accordion' href='#collapse".$i."'>
           								<h4 class='panel-title'> ".$data_row['headline'] ."</h4><span class='data'> ".$data_row['u_date'].' '. $data_row['time']."</span>
           								</a>
								        </div>
      									<div id='collapse".$i."' class='panel-collapse collapse'>
        									<div class='panel-body'>".$data_row['short_desc'] ."<br/>
        									Read more at <a class='data1' target='_news' href=".$data_row['link'].">".$data_row['site']."</a></div>
        								</div>
        							</div>";
        							$i++;
								}
							}
							else
							{
								//echo "<script type='text/javascript' language='javascript'>alert('No data Fetched')</script>";
								echo "<script type='text/javascript' language='javascript'>
										alert('Sorry no news');
										window.location = '/account/';
										</script>";
							}
						}
					}
					else if($cat == 'jiit feeds')
					{
						$sql = "SELECT * FROM fd_facebook ORDER BY f_pdate DESC  LIMIT 100 ";
						$f_rslt = $con->query($sql);
						if($f_rslt->num_rows > 0)
						{
							while($data_row= $f_rslt->fetch_assoc())
							{
								$id = $data_row['group_id'];

								$title = trim($data_row['f_pname']);
								if($title == '')
								{
									$title = "View Post";
								}

								$story = trim($data_row['f_story']);
								if($story == 'Array' OR empty($story))
								{
									$story = '';
								}
								else
								{
									$story = "<br/><strong>desc: </strong>".$story;
								}
                        		$gid_query = "SELECT group_name FROM fb_feeds_gid where group_id='$id'";
                        		$gid_result = $con->query($gid_query);
                        		$gid_name = $gid_result->fetch_assoc();
								echo "<div class='panel panel-default'>
      									<div class='panel-heading' data-toggle='collapse'>
	       									<a data-toggle='collapse' style='text-decoration: none;' data-parent='#accordion' href='#collapse".$i."'>
    	       								<h4 class='panel-title'> ".$title."</h4><span class='data'> ".$data_row['f_pdate'].' '. $data_row['f_ptime']."</span>
        	   								</a>
								        </div>
      									<div id='collapse".$i."' class='panel-collapse collapse'>
        									<div class='panel-body'><strong>message:</strong> ".$data_row['f_msg'].$story."<br/>
        									Read more at <a class='data1' href=https://www.facebook.com/".trim($data_row['f_post_id'])." target='_new'>". $gid_name ['group_name']."</a></div>
        								</div>
        							</div>";
        							$i++;
        					}
						}
					}
					else
					{
						echo "<script type='text/javascript' language='javascript'>
								alert('Add Some Category First');
								window.location='/account/category/';
							  </script>";
					}
					
				}
				else
				{
					echo "<script type='text/javascript' language='javascript'>
							alert('Login Again');
							window.location='/account/';
						</script>";
				}
			}
			else
			{
				echo "<script type='text/javascript' language='javascript'>
						alert('Login First');
						window.location='/account/';
						</script>";
			}
?>