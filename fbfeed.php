<?php
 $group = array(
 	array('id'=>'333283916693071','name'=>'JIIT Programming Hub'),
 	array('id'=>'153631204680678' , 'name'=>'OSDC'),
 	array('id'=>'356477227769042' , 'name'=>'GDG JIIT Noida'),
 	array('id'=>'322995367761640' , 'name'=>'Microcontroller Based Systems & Robotics Hub "μCR"'),
 	array('id'=>'269867759705979' , 'name'=>'JIIT'),
 	array('id'=>'174831739229170' , 'name'=>'IEEE Student Branch, JIIT (STB01711)'),
 	array('id'=>'879218985500794' , 'name'=>'EcoQuence - The Environment Hub, JIIT, Noida'),
 	array('id'=>'165594146823198' , 'name'=>'CICE'),
 	array('id'=>'133571986812734' , 'name'=>'Parola - Literary HUB JIIT Noida'),
 	array('id'=>'296282770429637' , 'name'=>'Graphics & Animation Hub (JIIT)')
 	);
//$access_token = '890339714389290|a39CP-3HGFCaX8FCGIPvtCBma4M';
$access_token = 'EAACEdEose0cBALCao1bUtwWqoKyHEaROFbFNvIbUqjzHmfbTGki3lKQ8KoUyMUqSstIL5fJscXVdZCdmq0YEGRWvZAY9vkxZAUkEBVETzu3nZAoG5F1IWlKVhL0crwZBpE3GHsbx7MB6cBvGTcCBi49FnkYQ6niKY19Tf3rJoZAwZDZD';
$n = count($group);
$i = -1;


$n =9;

  while($n--)
  {
	    $i++;
		  $add = 'https://graph.facebook.com/'.$group[$i]['id'].'/feed?fields=id,name,story,message,updated_time&access_token='.$access_token;
		  //$add = preg_replace("/ /", "%20", $add);
      $json = file_get_contents($add);
  	 	$data = json_decode($json);
      $url = 'http://www.feedify.co.in/post_fb.php';
  		//echo "<pre>";
  		if($json)
  		{
     		//echo "<a href=https://facebook.com/".$group[$i]['id']." target=_blank ><h1>".$group[$i]['name']."</h1></a>";
	   		foreach($data->data as $item)
		  	{
          /*
  				  echo "POST : <a href=https://facebook.com/"  . $item->id . ' target=_blank> see post </a><br/>';
            echo 'From ID: <a href=https://facebook.com/' . $item->from->id . ' target=_blank >see profile</a><br />';
  				  echo 'From Name: ' . $item->from->name . '<br />';
  				  echo 'Timestamp: ' . $item->updated_time . '<br />';
            echo 'Message: ' . $item->message . '<br />';
            echo 'Story: '  .  $item->story . '<br/>';
            echo '<br /><br />';
          */
  				  $post_id = $item->id;
            $name = $item->name;
            $date = $item->updated_time;
            $story = $item->story;
            $message = $item->message;
/*
           $j = 10;
                    while($j--)
                    {
                        $name = str_replace("'", " ", $name);
                        $story = str_replace("'", " ", $story);
                        $message = str_replace("'", " ", $message);
                    }

            $query = array('id' => $post_id,'name' => $name, 'story' => $story, 'message' => $message, 'date' => $date, 'gid' => $group[$i]['id'], 'gname'=> $group[$i]['name'] );
            $options = array('http' => array(
                                          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                          'method'  => 'POST',
                                          'content' => http_build_query($query),
                                          ),
                          );
          $context  = stream_context_create($options);

          $result = file_get_contents($url, false, $context);
          //echo $post_id." ";
          echo $result."<br/>";
        //var_dump($result);
*/
  			}
  		}
    }
?>