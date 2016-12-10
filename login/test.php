<?php
		$pass = $_GET['pass'];
		$options = ['cost' => 12,];
        $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
        echo $pass;
 ?>