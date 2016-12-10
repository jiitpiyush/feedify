<?php
        include "check.php";
        include "../file.php";
        include "login_log.php";
        $user = check(strtolower($_POST['user']));
        $pass = md5($_POST['pass']);
        
        $user1=$_COOKIE['user'];
        $pass1=$_COOKIE['pass'];

        $time = date('Y-m-d H:i:s');

        //$rdir = $_GET['next'];

        if($user1 && $pass1)
        {
          login_log($user1,'c');
          $con->close();
        }
        else
        {
           if($con->connect_error)
            {
        	  // die('Connection Failed');
              echo "connection failed";
            }

            $rdir = $_SERVER['HTTP_REFERER'];

           $sql = "SELECT * FROM fd_users where username='$user' AND pass='$pass'";
           $result = $con->query($sql);
          if ($result->num_rows > 0) 
           {
               setcookie("user", $user,time()+3600*24*30,"/",".feedify.co.in",false,1);
               setcookie("pass",$pass,time()+3600*24*30,"/",".feedify.co.in",false,1);
               login_log($user,'s');
               $con->close();
            }
            else
            {
              login_log($user,'n');
              $con->close();
              header("Location: /?login_attempt=1&&user=$user");
            }

        }

        if($rdir)
        {
          header("Location: $rdir");
        }
        else
        {
          header('Location: /read.php');
        }
?>