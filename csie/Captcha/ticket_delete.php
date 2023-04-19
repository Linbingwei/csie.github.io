<a href="../index.php">回首頁</a>
&nbsp;&nbsp;
<a href="query_ticket.php">訂票查詢</a>
<?php
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include_once("../conn.php");
$tid=$_GET['tid'];
try{
	$sql = "delete from ticket where tid=$tid";
	$msg='';
	$result =$connect->exec($sql);
	if($result == false){
		$msg="fall delete. <br>\n";
	}else{
		$msg="successful delete. <br>\n";
	} 
	if($msg != '') echo $msg;
}catch (PDOException $e){
	echo $e->getMessage() . "<br>\n";
}
?>