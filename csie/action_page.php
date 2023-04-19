<?php
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once("conn.php");

$search=$_POST['search'];

$count=	"select count(distinct t.tid) from gb m left join ticket t on m.username = t.uid where m.username like '%$search%'";
//$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$rs=$connect->query($count);
$rs->setFetchMode(PDO::FETCH_BOTH);

//$uid=$_POST['id'];
//$r="select count(*) from ticket where uid='$uid'";
//$s=$connect->query($r);
$rs2=$rs->fetchColumn();

if($rs2>=1){
	$sql="select distinct t.* from gb m left join ticket t on m.username = t.uid where m.username like '%$search%'";
	$connect->setAttribute(PDO::ATTR_CASE,PDO::CASE_NATURAL);
	$connection=$connect->query($sql);
	$connection->setFetchMode(PDO::FETCH_BOTH);
echo "<center>";
            echo "<table border='1' width='100%'>";
            //echo "<tr>";
			//echo "<th>";
			//echo "<th>";
            echo "<th>序號";
            echo "<th>帳號";
            echo "<th>出發站";
            echo "<th>抵達站";
            echo "<th>張數";
            echo "<th>日期";
            echo "<th>車次";
            while($row=$connection->fetch()){
                echo "<tr>";
				//echo "<td><a href=ticket_update.php?tid=$row[tid]>修改</a>";
				//echo "<td><a href=ticket_delete.php?tid=$row[tid]>刪除</a>";
                echo "<td>" . $row[0];
                echo "<td>" . $row[1];
                echo "<td>" . tcity($row[2]);
                echo "<td>" . tcity($row[3]);
                echo "<td>" . $row[4];
                echo "<td>" . $row[5];
                echo "<td>" . $row[6];
	
			}
}
        else{
            echo '<p> </p><p> </p><a href="index.php">無此帳號訂票資料，按此返回</a>';
		}
		

function tcity($city) {
	switch($city){
		case "02":
			return "台北市";
		case "04":
			return "台中市";
		case "07":
			return "高雄市";
		default :
			return "請選擇";
	}
}
?>