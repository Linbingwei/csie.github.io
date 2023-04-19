<?php
if(!isset($_SESSION)){
    session_start();
    }  //判斷session是否已啟動
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE);
include_once("../conn.php");
if((!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))){  //判斷此兩個變數是否為空
    
     if($_SESSION['check_word'] == $_POST['checkword']){
         
          $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
          //比對帳密開始
		  $id=$_POST['id'];
		  $pw=$_POST['pw'];
		  
		  $r="select count(*) from gb where username='$id' and passwd='$pw'";
		  echo "$r<br>";
		  $rs=$connect->query($r);
		  $rs2=$rs->fetchColumn();
		  if($rs2==1){//比對帳密正確
			header('content-Type: text/html; charset=utf-8');
         
			echo '<p> </p><p> </p><a href="./ticket.php">OK輸入正確，將於3秒後跳轉(按此也可返回)</a>';
			echo '<meta http-equiv="refresh" content="3; url=./ticket.php">';         
            exit();
		  }//else{
			//echo '<p> </p><p> </p><a href="./chptcha_index.php">Error輸入錯誤，將於5秒後跳轉(按此也可返回)</a>';
			//echo '<meta http-equiv="refresh" content="5; url=./captcha_index.php">';
		 // }
	}
}//else{
			//echo '<p> </p><p> </p><a href="./chptcha_index.php">Error輸入錯誤，將於5秒後跳轉(按此也可返回)</a>';
			//echo '<meta http-equiv="refresh" content="5; url=./captcha_index.php">';
		 // }
		  
if($_SESSION['check_word'] != $_POST['checkword'] &&$rs2!=1 ){
		echo '<p> </p><p> </p><a href="./chptcha_index.php">Error輸入錯誤，將於1秒後跳轉(按此也可返回)</a>';
		echo '<meta http-equiv="refresh" content="1; url=./captcha_index.php">';
}

if($_SESSION['check_word'] == $_POST['checkword'] &&$rs2!=1 ){
	echo '<p> </p><p> </p><a href="./chptcha_index.php">Error輸入錯誤，將於1秒後跳轉(按此也可返回)</a>';
	echo '<meta http-equiv="refresh" content="1; url=./captcha_index.php">';
}
if($_SESSION['check_word'] != $_POST['checkword'] &&$rs2==1 ){
	echo '<p> </p><p> </p><a href="./chptcha_index.php">Error輸入錯誤，將於1秒後跳轉(按此也可返回)</a>';
	echo '<meta http-equiv="refresh" content="1; url=./captcha_index.php">';
}
?>