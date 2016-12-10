<?php
	$user = $_GET['user'];
	$channel_id = $_GET['channel'];
	if(empty($channel_id))
	{
		$url ='https://www.googleapis.com/youtube/v3/channels?part=id&forUsername='.$user.'&key=AIzaSyC0IuNcqElpic6E6-ykhSjC27wdf7WRCzs';
		$data = file_get_contents($url);
		$da = json_decode($data);
		//print($da->items[0]->id);
		$channel_id = $da->items[0]->id;
	}
	
	
	$url = 'https://www.googleapis.com/youtube/v3/subscriptions?part=snippet&channelId='.$channel_id.'&key=AIzaSyC0IuNcqElpic6E6-ykhSjC27wdf7WRCzs';
	$data = file_get_contents($url);
	$da = json_decode($data);
	//print_r($da);
	$channel = array();
	$i = 0;
	foreach ($da->items as $key) 
	{
		$channel[$i] = $key->snippet->resourceId->channelId.'<br/>';
		echo $channel[$i];
		$i++;
	}
?>