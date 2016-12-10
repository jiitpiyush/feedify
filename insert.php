<?php
	$site = $_POST['site'];
	$cat  = $_POST['cat'];
	$sub  = $_POST['sub'];
	$link = $_POST['link'];
	if($site && $cat && $link)
	{
		include "file.php";
		$con->select_db("u498139428_feedi");
		$sql = "INSERT INTO contents(site,cat,sub_cat,link) VALUES('$site','$cat','$sub','$link')";
		$result = $con->query($sql);
		if($result)
		{
			echo "<br/>Following Value Inserted Succesfully<br/>";
			echo $site."<br/>".$cat."<br/>".$sub."<br/>".$link;
		}

	}
?>
<html>
<head>
<script type="text/javascript" src="dr_dn.js"></script>
</head>
<body>
<form action="" name="formname" method="post">
<div>

<label>Category:</label>
<select name="cat" onchange=dropdownlist(this.options[this.selectedIndex].value)>
<option value=''>Select category</option>
<option value="city">Cities</option>
<option value="national">National</option>
<option value="International">International</option>
<option value="opinion">Opinions</option>
<option value="business">Business</option>
<option value="exams">Education/Exams</option> 
<option value="politics"> Politics </option>
<option value="sports">Sports</option>
<option value="internships">Internships</option>
</select>

<label>SubCat: </label>
<select name="sub">
<option>Select Sub-Category</option>
</select>

<label>Site:</label>
	<select name="site" value="">
	<option value=''>Select Site</option>
	<option value="toi">Times Of india </option>
	<option value="hindu">The Hindu</option>
	<option value="feedburner">FeedBurner</option>
	<option value="zeenews"> ZeeNews </option>
	<option value="reuters">Reuters</option>
	<option value="economic_times">Economic Times</option>
	<option value="ndtv_profit">NDTV Profit</option>
	<option value="money_control">Money Control</option>
	<option value="financial_express">Financial Express</option>
	<option value="financial_times">Financial Times</option>
	<option value="business_today">Business Today</option>
<option value="internshala">Internshala</option>
<option value="letsintern">Letsintern</option>
</select>

<label>link: </label><input type="text" name="link" value="">

<input type="submit" value="INSERT">
</div>
</form>