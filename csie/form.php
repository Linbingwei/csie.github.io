<?php
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include_once("conn.php");
$username=$_POST['uid'];
$passwd=$_POST['pid'];
$gender=$_POST['gender'];
$city=$_POST['city'];
$interest1=$_POST['interest1'];
$interest2=$_POST['interest2'];
$interest3=$_POST['interest3'];
$msg=$_POST['gossip'];
$mydate=new DateTime();
$mydate2=$mydate->format('Y-m-d H:i:s');
$r="select count(*) from gb where username='$username'";
//echo "$r<br>";
$rs=$connect->query($r);
$rs2=$rs->fetchColumn();
if($rs2==0){
	echo "<center>";
	try{
		$sql="insert into gb(username,passwd,gender,city,interest1,interest2,interest3,msg,regtime) values('$username','$passwd','$gender','$city','$interest1','$interest2','$interest3','$msg','$mydate2')";
		echo $sql . "<br>\n";
		$msg='';
		$result=$connect->exec($sql);
		if(result!==false){
			$msg="successfully insert data to table gb. <br>\n";
			echo "<a href='query_gb.php'>會員查詢</a><p>";
		}else{
			$msg="Fail to insert data to table gb.";
		}
		if($msg !='') echo $msg;
		echo "帳號=" . $uid . "<br>";
		echo "密碼=" . $pid . "<br>";
		echo "性別=" . gen($gender) . "<br>";
		echo "縣市=" . tcity($city) . "<br>";
		echo "留言=" . $gossip . "<br>";
		echo "興趣1=" . $interest1 . "<br>";
		echo "興趣2=" . $interest2. "<br>";
		echo "興趣3=" . $interest3. "<br>";
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}
else{
	echo "<center>";
	echo"帳號已被註冊";
	echo "<br>";
	echo "<a href='	index.php'>回到首頁</a><p>";
}



//echo "帳號=$uid";
function gen($gender) {
	if($gender==1) {
		return "男";
	}
	else {
		return "女";
	}
}	
function tcity($city) {
 switch($city){
  case "01":
   return "台北市";
  case "02":
   return "桃園市";
  case "03":
   return"新竹縣";
  case "04":
   return "花蓮縣";
  case "05":
   return "宜蘭縣";
  case "06":
   return "苗栗縣";
  case "07":
   return "台中市";
  case "08":
   return "彰化縣";
  case "09":
   return"南投縣";
  case "10":
   return"嘉義縣";
  case "11":
   return"雲林縣";
  case "12":
   return"台南市";
  case "13":
   return"澎湖縣";
  case "14":
   return"高雄市";
  case "15":
   return"屏東縣";
  case "16":
   return"台東縣";
  case "17":
   return"金門縣";
  case "18":
   return"金門縣烏坵鄉";
  case "19":
   return"連江縣";
  default :
   return"請選擇";
 }
}			
?>