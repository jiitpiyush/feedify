<?php
    include "../file.php";
    $user = $_COOKIE['user'];
    $pass = $_COOKIE['pass'];

    $sql = "SELECT username FROM fd_users WHERE username='$user' AND pass='$pass'";
    $res = $con->query($sql);

    if($res->num_rows > 0)
    {
        include "main_d.php";
    }
    else
    {
        include "../login/index.php";
    }
?>

