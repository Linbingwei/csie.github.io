<?php
if(!isset($_SESSION)){
    session_start();
    }  //判斷session是否已啟動
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE &~E_WARNING);
include_once("../conn.php");
if((!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))){  //判斷此兩個變數是否為空
    
    if($_SESSION['check_word'] == $_POST['checkword']){
        
         $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
         $uid=$_POST['id'];
         $mydate=$_POST['mydate'];
         $r="select count(*) from ticket where uid='$uid' and mydate='$mydate'";
         //echo "$r<br>";
         $rs=$connect->query($r);
         $rs2=$rs->fetchColumn();
		 
         if($rs2>=1){
			$_SESSION['id'] = $uid;
            $t="select * from ticket where uid='$uid' and mydate='$mydate'";
            $connect->setAttribute(PDO::ATTR_CASE,PDO::CASE_NATURAL);
            $rst=$connect->query($t);
            $rst->setFetchMode(PDO::FETCH_BOTH);
            echo "<center>";
            echo "<table border='1' width='100%'>";
            echo "<tr>";
			echo "<th>";
			echo "<th>";
            echo "<th>序號";
            echo "<th>帳號";
            echo "<th>出發站";
            echo "<th>抵達站";
            echo "<th>張數";
            echo "<th>日期";
            echo "<th>車次";
            while($row=$rst->fetch()){
                echo "<tr>";
				echo "<td><a href=ticket_update.php?tid=$row[tid]>修改</a>";
				echo "<td><a href=ticket_delete.php?tid=$row[tid]>刪除</a>";
                echo "<td>" . $row[0];
                echo "<td>" . $row[1];
                echo "<td>" . arrive($row[2]);
                echo "<td>" . arrive($row[3]);
                echo "<td>" . $row[4];
                echo "<td>" . $row[5];
                echo "<td>" . $row[6];
            }
        }
        else{
            echo '<p> </p><p> </p><a href="query_ticket.php">Error無訂票資料，按此返回</a>';
        }
    }else{
        echo '<p> </p><p> </p><a href="query_ticket.php">Error驗證碼輸入錯誤，按此返回</a>';
        }
}

function arrive($arrive) {
	switch($arrive){
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