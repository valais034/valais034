<?php
$name="mohammad";
$number=strlen($name)-1;
$reverse="";
for($i=$number;$i>=0;$i--)
{
$reverse.= substr($name,$i,1);
}
echo $reverse;
?>