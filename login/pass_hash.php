<?php
 function my_hash($pass)
 {
 	$options = [
    'cost' => 12,
    ];
	$h_pass = password_hash($pass, PASSWORD_BCRYPT, $options);
	return $h_pass;
 }
?>