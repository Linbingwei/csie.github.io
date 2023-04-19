
<?php
ini_set('display_errors','on');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once("../conn.php");
$sql="select * from gb";
$connect->setAttribute(PDO::ATTR_CASE,PDO::CASE_NATURAL);
$rs=$connect->query($sql);
$rs->setFetchMode(PDO::FETCH_BOTH);
include 'calendar.php';
$date=$_POST['date'];
$calendar = new Calendar($date);
$skip=0;
$regcount=1;
$finaldate;
while($row=$rs->fetch()){
    if($row!=''){
        if($skip==0){
            $tmp=substr($row[9],0,10);
            $skip=1;
        }
        if($tmp!=substr($row[9],0,10)){
            $calendar->add_event(strval($regcount).'個註冊',$tmp, 1, 'red');
            $tmp=substr($row[9],0,10);
            $regcount=1;
        }
        else{
            $regcount++;
        }
        $finaldate=substr($row[9],0,10);
    }
}
$calendar->add_event(strval($regcount).'個註冊',$finaldate, 1, 'red');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>行事曆</title>
        <style>
            * {
                box-sizing: border-box;
                font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
                font-size: 16px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            body {
                background-color:#F0F0F0;
                margin: 0;
            }
            .navtop {
                background-color:#000000;
                height: 60px;
                width: 100%;
                border: 0;
            }
            .navtop div {
                display: flex;
                margin: 0 auto;
                width: 800px;
                height: 100%;
            }
            .navtop div h1, .navtop div a {
                display: inline-flex;
                align-items: center;
            }
            .navtop div h1 {
                flex: 1;
                font-size: 24px;
                padding: 0;
                margin: 0;
                color: #FFFFFF;
                font-weight: bold;
            }
            .navtop div a {
                font-size:20;
                padding: 0 20px;
                text-decoration: none;
                color: #FFFFFF;
                font-weight: bold;
            }
            .navtop div a i {
                padding: 2px 8px 0 0;
            }
            .navtop div a:hover {
                font-size:25px;
            }
            .content {
                width: 800px;
                margin: 0 auto;
            }
            .content h2 {
                margin: 0;
                padding: 25px 0;
                font-size: 22px;
                border-bottom: 3px solid maroon;
                color: maroon;
            }
            form{
                margin:16;
            }
            
        </style>
	</head>
	<body>
	    <nav class="navtop">
	    	<div>
	    		<h1>行事曆</h1>
                    <form action="show_calendar.php" method="post">
                        <input type="date" name='date'>
                        <input type="submit" value="查詢">
                    </form>
                <a href="../index.php">回到首頁</a>
                <a href="../query_gb.php">會員查詢</a>
	    	</div>
	    </nav>
		<div class="content home">
			<?=$calendar?>
		</div>
	</body>
</html>