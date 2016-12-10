<?php
        include "check.php";

        $user = check($_POST['username']);
        $pass = md5($_POST['password']);
        if(!empty($user) && !empty($pass))
        {
           include "../file.php";
           if($con->connect_error)
            {
        	   die('Connection Failed');
            }


           $sql = "SELECT * FROM fd_users where username='$user' AND pass='$pass'";
           $result = $con->query($sql);
            if ($result->num_rows > 0) 
            {
               echo "successful";
            }
            else
            {
                echo "unsuccessful";
            }

           $con->close();
        }
?>