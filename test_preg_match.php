<?php
$string = $_GET['s'];
//if(preg_match('/[a-z_\-0-9]/i', $string))
if (!preg_match('/[^A-Za-z0-9]/', $string))
{
  echo preg_match('/[^A-Za-z0-9]/', $string);
}
else
{
	echo "not valid string";
}
?>