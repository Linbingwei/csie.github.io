<?php
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once("conn.php");
$sql="select * from gb";
$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$rs=$connect->query($sql);
$rs->setFetchMode(PDO::FETCH_BOTH);
echo "<table border='1'>";
echo "<tr>";
echo "<th>序號";
echo "<th>帳號";
echo "<th>密碼";
echo "<th>性別";
echo "<th>興趣1";
echo "<th>興趣2";
echo "<th>興趣3";

while($row=$rs->fetch()){
	echo "<tr>"; 
	echo "<td>" . $row[0]  ;
	echo "<td>" . $row[1]  ;
	echo "<td>" . $row[2]  ;
	echo "<td>" . $row[3]  ;
	echo "<td>" . $row[4]  ;
	echo "<td>" . $row[5]  ;
	echo "<td>" . $row[6]  ;
}	
?>