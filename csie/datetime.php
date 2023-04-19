<?php
$mydate=new DateTime();
echo $mydate->format('Y-m-d H:i:s');
echo "<br>";

$mydateJP=new DateTime("now",new DateTimeZone('Asia/Tokyo'));
echo $mydate->format('Y-m-d H:i:s');
echo "<br>";

$mydate2=new DateTime('2021-01-01 01:02:03');
echo $mydate->format('Y-m-d H:i:s');
echo "<br>";
?>