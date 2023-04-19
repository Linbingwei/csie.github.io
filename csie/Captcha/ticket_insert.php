<?php
if(!isset($_SESSION)){
	session_start();
}
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE &~E_WARNING);
include_once("../conn.php");
$uid=$_SESSION['id'];
$depart=$_POST['depart'];
$arrive=$_POST['arrive'];
$nono=$_POST['nono'];
$mydate=$POST['mydate'];
$trainno=$_POST['trainno'];

try{
	$sql="insert into ticket(uid,depart,arrive,nono,mydate,trainno) values('$uid','$depart','$arrive','$nono','$mydate','$trainno')";
	echo $spl."<br>\n";
	$msg='';
	$reslut=$connect->exec($sql);
	if($reslut!==false){
		$msg="Success insert data table ticket.<br>\n";
		
	}
	else{
		$msg="Fail to insert data to table ticket.";
	}
	if($msg!= '')
		echo $msg;
}
catch(PDOException $e){
	echo $e->getMessage();
}


?>