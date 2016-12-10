<?php
	function GetFeed($url)
	{
        date_default_timezone_set('Asia/Kolkata');
        $feed = simplexml_load_file($url);
        $feed_array = array();
//        $feed=preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $feed);
        foreach($feed->entry->item as $story)
        {
          
            $story_array = array (
                                  'title'=> $story->title,
                                  'desc' => $story->description,
                                  'link' => $story->link,
                                  'date' => $story->pubDate
                                  );
            
            /*
            $story_array = array (
                                  'title'=> $story->name,
                                  'link' => $story->uri,
                                  'date' => $story->published
                                  );
            */
            $title = $story_array['title'];
            $desc = trim($story_array['desc']);
            $link = $story_array['link'];
            $date = $story_array['date'];
            /*
            echo "<h4>". $title ."</h4>".
            	 "<p>" . $desc  ."</p>" .
            	 "<a target=\"_blank\" href=\"" . $link . "\"> see full news </a>".
            	 "<br/>". $date ."<br/>";
               */
               echo "<pre>";
               echo '"title"'." : ";
               echo $title."<br/>";
               echo '"link"'.' : ' ;
               echo $link."<br/>";
               echo '"desc"'.' : ';
               echo $desc. "<br/>";
               echo '"date"'." : ";
               echo $date."<br/>";
               echo "<br/>";
               echo "</pre>";
            array_push($feed_array, $story_array);
        }
        return $feed_array;
    }
    $url = 'https://www.youtube.com/feeds/videos.xml?channel_id=UCNJcSUSzUeFm8W9P7UUlSeQ';
//  $url =$_GET['url'];
    GetFeed($url);
?>