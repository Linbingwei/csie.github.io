<?php
$mydate=new DateTime();
$mydate->format('N');
		echo "<video width='560' height='315' controls autoplay muted loop>";
switch($mydate->format('N')){
	case 4:
		echo "<source src='mp4/1.mp4' type='video/mp4'>";
		break;
	case 5:	
		echo "<source src='mp4/1.mp4' type='video/mp4'>";
		break;
}
echo "</video>";
?>