<?php

$a = new SimpleXMLElement('<a href="www.something.com">Click here</a>');
echo $a['href']; // will echo www.something.com

?>