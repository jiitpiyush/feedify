<?php
 $query = $_GET['search_query'];
for($i=0;$i<strlen($query);$i++)
{
	if($query[$i]==' ')
		$query[$i] = '+';
}
 if($query)
 {
 	$add = 'https://www.youtube.com/results?search_query='.$query;
 }
 else
 {
 	$add = 'https://www.youtube.com/channels?search_query='.$query;
 }
 $file = file_get_contents($add);
 echo $file;
?>