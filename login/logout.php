<?php
  $user = $_COOKIE['user'];
  $pass = $_COOKIE['pass'];
  if($user && $pass)
  {
   setcookie("user","",time()-3600*24*30,"/",".feedify.co.in",0);
   setcookie("pass","",time()-3600*24*30,"/",".feedify.co.in",0);
  } 
  header('Location: http://feedify.co.in/account/');
  
?>