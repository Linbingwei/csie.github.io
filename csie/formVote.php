<?php
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include_once("conn.php");
$username=$_POST['username'];
$candidate=$_POST['candidate'];
$vtime2=new DateTime();
$vtime=$vtime2->format('Y-m-d H:i:s');
$r="select count(*) from vote where username='$username'";
echo "$r<br>";
$rs=$connect->query($r);
$rs2=$rs->fetchColumn();

if($rs2==0){
	try{
		$sql="insert into vote(username,candidate,votetime) values('$username',$candidate,'$vtime')";
		echo $sql . "<br>\n";
		$msg='';
		$result=$connect->prepare($sql);
		$result->execute();
		$conunt=$result->rowCount();
		
		if($count==1){
			$msg="投票成功<br>";
		}else{
			$msg="投票失敗";
		}
		
		if(result!==false){
			$msg="successfully insert data to table gb. <br>\n";
			echo "<a href='query_vote.php'>查詢投票結果</a><p>";
		}else{
			$msg="Fail to insert data to table gb.";
		}
		if($msg !='') echo $msg;
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
		echo "投票人=" . $username . "<br>";
		echo "候選人=" . $candidate . "<br>";
		echo "投票時間=" . $vtime . "<br>";
	}
else{
	echo"無法重複投票，你已投票完成";
}

?>