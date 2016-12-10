<?php
	function GetFeed($url)
	{
        date_default_timezone_set('Asia/Kolkata');
        $feed = simplexml_load_file($url);
        $feed_array = array();
        foreach($feed->entry as $story)
        {
          
            $story_array = array (
                                  'title'=> $story->title,
                                  'updated' => $story->updated,
                                  'link' => $story->link['href'],
                                  'published' => $story->published
                                  );
          
            $title = $story_array['title'];
            $updated = trim($story_array['updated']);
            $link = $story_array['link'];
            $published = $story_array['published'];
           
               echo "<pre>";
               echo '"title"'." : ".$title."<br/>";
               echo '"link"'.' : '.$link."    | <a href=".$link." target='youtube'>see</a><br/>";
               echo '"updated"'.' : '.$updated. "<br/>";
               echo '"published"'." : ".$published."<br/>";
               echo "<br/></pre>";
            array_push($feed_array, $story_array);
        }
        return $feed_array;
    }


    $id = $_GET['id'];
   // if(empty($id))
    {
        //$url = 'https://www.youtube.com/feeds/videos.xml?channel_id=UCNJcSUSzUeFm8W9P7UUlSeQ';
        include "./results/youtube.php";
        for($j=0;$j<5;$j++)
        {
          GetFeed('https://www.youtube.com/feeds/videos.xml?channel_id='.$channel[$j]);
        }
    }
  /*  else
    {
      GetFeed($id);
    }
/*
    $id = $_GET['id'];
    if(empty($id))
    {
        $url = 'https://www.youtube.com/feeds/videos.xml?channel_id=UCNJcSUSzUeFm8W9P7UUlSeQ';
    }
    else
    {
      $url = 'https://www.youtube.com/feeds/videos.xml?channel_id='.$id;
    }
    GetFeed($url);
    */
?>