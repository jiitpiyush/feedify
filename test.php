<?php
$str = fopen("fb_br.php", "r+");
//$st1 = htmlspecialchars($str);
//echo $str;
$handle = fopen("1.txt","w+");
while(($data = fgets($str)) !== false )
{
$st1 = htmlspecialchars_decode($data);
fwrite($handle, $st1);
}
fclose($handle);

fclose($str);
?>