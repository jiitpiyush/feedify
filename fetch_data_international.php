<?php
        include "file.php";
        $con->select_db("u498139428_feedi");

        date_default_timezone_set('Asia/Kolkata');
        $time_now = date('Y-m-d H:i:s');

        $sql = "SELECT update_time from update_time";
        $result = $con->query($sql);

        $row = $result->fetch_assoc();
        $time_pre = $row['update_time']; 

        $sql = "SELECT * from contents where cat='international'";
        echo $sql."<br/>";
        $result = $con->query($sql);
        if($result->num_rows > 0)
        {   
            while($row = $result->fetch_assoc())
            {
                $site = $row['site'];
                $cat  = $row['cat'];
                $sub  = $row['sub_cat'];
                $url = $row['link'];

                $feed = simplexml_load_file($url);
                $feed_array = array();
                foreach($feed->channel->item as $story)
                {
                    $title = $story->title;
                    $desc  = trim($story->description);
                    $link  = $story->link;
                    $date  = $story->pubDate;
                    if($site != 'india tv')
                    {
                        $d = 5;
                        $date = str_split($date);
                        $day = $date[$d].$date[$d+1];
                        if($site=='hindu')
                        {
                            $d = 4;
                            $day = "0".$date[$d+1];
                        }
                        $month = $date[$d+3].$date[$d+4].$date[$d+5];
                        switch ($month) {
                            case 'Jan':
                                $month = "01";
                                break;

                            case 'Feb':
                                $month = "02";
                                break;
                            
                            case 'Mar':
                                $month = "03";
                                break;

                            case 'Apr':
                                $month = "04";
                                break;

                            case 'May':
                                $month = "05";
                                break;

                            case 'Jun':
                                $month = "06";
                                break;

                            case 'Jul':
                                $month = "07";
                                break;

                            case 'Aug':
                                $month = "08";
                                break;

                            case 'Sep':
                                $month = "09";
                                break;

                            case 'Oct':
                                $month = "10";
                                break;

                            case 'Nov':
                                $month = "11";
                                break;

                            case 'Dec':
                                $month = "12";
                                break;
                        }
                        $year = $date[$d+7].$date[$d+8].$date[$d+9].$date[$d+10];
                        $d = $d+12;
                        $time='';
                        while($d<25)
                        {
                            $time .= $date[$d];
                            $d++;
                        }
                        $date = $year."-".$month."-".$day;
                        $u_date = $date." ".$time;
                    }
                    if($site=='economic_times')
                    {
                        $i=0;
                        $pos = strpos($desc,"</a>");
                        $desc = str_replace(substr($desc, 0, $pos), '', $desc)."<br/>";
                        echo $desc."<br/>";
                    }
                    $j = 10;
                    while($j--)
                    {
                        $title = str_replace("'", " ", $title);
                        $desc = str_replace("'", " ", $desc);
                        $link = str_replace("'", " ", $link);
                    }
                    /*
                    while(strpos($desc,"'"))
                    {
                        str_replace("'", ' ', $desc);
                    }
                    while(strpos($link,"'"))
                    {
                        str_replace("'", ' ', $link);
                    }
                    */

                   // if($u_date > $time_pre)
                    {
                        $sql = "INSERT INTO fd_rss(site,category,sub_category,headline,short_desc,link,u_date,time) VALUES('$site','$cat','$sub','$title','$desc','$link','$date','$time')";
                        echo $sql."<br/>";
                        $con->query($sql);
                    }

                }
            }
        
            $sql = "DELETE FROM update_time WHERE 1";
            $con->query($sql);
            $sql = "INSERT INTO update_time VALUES('$time_now')";
            $con->query($sql);
            $con->close();
        }
?>