<?php
			
    function check($str)
    {
    	$x = preg_match('/"/', $str);
		$y = preg_match("/'/", $str);
		$z = preg_match('/;/', $str);
		if($x || $y ||$z)
		{
			$str = '';
			return;
		}
		else
		{
			return $str;
		}
    }


    function validate_email($email)
    {
    	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    	{
    		return;
    	}
    	else
    	{
    		return $email;
    	}
    }
?>