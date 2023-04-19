<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/css5.css"/>
<link rel="stylesheet" type="text/css" href="css/css3.css"/>
<script type="text/javascript" src="js/myimg.js"></script>

</head>
<body onload="playimg();">
    <!--<div class="bg">
        <img src="images/BG.jpg">
    </div>
	<style>
        .bg {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: -999;
        }
        .bg img {
            min-height: 100%;
            width: 100%;
        }
    </style>
	-->
<div id="banner"style="text-align: center;">

<div id="mydiv"></div>
<span style="font-size:200%;">
<center><div id="nextpic"><a href="#00" class="previous round">&#8249;</a></div></center>
<center><div id="lastpic"><a href="#00" class="next round">&#8250;</a></div></center>
</span>

<style>
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}



.round {
  border-radius: 100%;
}
</style>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script>

<!--
<center><div id="nextpic"><img src="images/06.png"></div></center>      
<center><div id="lastpic"><img src="images/07.png"></div></center> 
-->

</div>   
<script>
document.getElementById("nextpic").onclick = function() {npFunction()}; 
document.getElementById("lastpic").onclick = function() {lpFunction()}; 
</script>

<div id="top">
	<ul id="menu">
		<li class="dropdown">
			<a href="index.php" class="dropbtn">資工一乙林秉緯的首頁</a>
			<div class="dropdown-content">
				<a href="https://www.instagram.com/linbingwei0103/?hl=zh-tw">About</a>
			<!--<a href="#">Link 2</a>
				<a href="#">Link 3</a>
			-->
			</div>
		</li>
			<li><a href="form.htm">會員申請</a><li>
			<li><a href="query_gb.php">會員查詢</a></li>
			<li><a href="formVote.htm">投票</a></li>
			<li><a href="query_vote.php">投票查詢</a></li>
			<li><a href="Captcha/captcha_index.php">訂票登入</a><li>
			<li><a href="Captcha/query_ticket.php">訂票查詢</a><li>  			
			<li><a href="calendar/show_calendar.php">行事曆</a></li>		
			<li><a href="send_mail.html">寄送郵件</a></li>
			<li><a href="id_card_exam.html">驗證身分證</a></li>
            
				
				<form action="action_page.php" method="post">
				<input type="text" placeholder="Search.." name="search">
				<button type="submit"><i class="fa fa-search"></i></button>
				</form>
				

	</ul>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}

#footer{
 width:100%;
    height:35%;
    background:#6FB7B7;
 font-size: 30%;
 font-weight:200;
 text-align: center;
    line-height: 1.5cm;
   
}

#clear{
    clear:both;
}
</style>

<center>
<iframe width="560" height="315" src="https://www.youtube.com/embed/WFw0Y9X90Tc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br>
<br>
<video width="560" height="315" controls autoplay muted loop>
	<source src="mp4/2.mp4" type="video/mp4">
</video>
<?php
$mydate=new DateTime();
$mydate->format('N');
		echo "<video width='560' height='315' controls autoplay muted loop>";
switch($mydate->format('N')){
	case 1:	
		echo "<source src='mp4/3.mp4' type='video/mp4'>";
		break;
	case 2:	
		echo "<source src='mp4/3.mp4' type='video/mp4'>";
		break;
	case 3:
		echo "<source src='mp4/3.mp4' type='video/mp4'>";
	case 4:
		echo "<source src='mp4/3.mp4' type='video/mp4'>";
		break;
	case 5:	
		echo "<source src='mp4/3.mp4' type='video/mp4'>";
		break;
}
echo "</video>";
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v14.0" nonce="9y64y45O"></script>

</center>
    <div id="clear"></div>
    <div id="footer">
    <font color="white"><p>聯絡方式:willie8913@gmail.com<p></font>
    <font color="white"><p> 地址：950台東縣台東市大學路二段369號<p></font>
   <div class="fb-like" data-href="https://web.nttu.edu.tw/s25/index.php" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
    <?php
    ini_set('display_errors','on');
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    include_once("conn.php");

    try{
        $sql = "update visitor set visit=visit+1 where vid=1";
        echo "\n";
        $msg='';

        $result =$connect->exec($sql);
        if($result === false){
            $msg="fail update. <br>\n";
        } 
        if($msg != '') echo $msg;
    }catch(PDOException $e){
        echo $e->getMessage() . "<br>\n";
    }
    $sql2="select * from visitor where vid=1";
    $connect->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
    $rs2=$connect->query($sql2);
    $rs2->setFetchMode(PDO::FETCH_BOTH);
    $row2=$rs2->fetch();
    echo "<strong>瀏覽人數:</strong>";
    $len= strlen($row2[visit]);
    $s=strval($row2[visit]);
    for($i=0;$i<$len;$i++){
        if(substr($s,$i,1)=='0')
            echo "<img src='visit/images/0.png'>";
        else if(substr($s,$i,1)=='1')
            echo "<img src='visit/images/1.png'>";
        else if(substr($s,$i,1)=='2')
            echo "<img src='visit/images/2.png'>";
        else if(substr($s,$i,1)=='3')
            echo "<img src='visit/images/3.png'>";
        else if(substr($s,$i,1)=='4')
            echo "<img src='visit/images/4.png'>";
        else if(substr($s,$i,1)=='5')
            echo "<img src='visit/images/5.png'>";
        else if(substr($s,$i,1)=='6')
            echo "<img src='visit/images/6.png'>";
        else if(substr($s,$i,1)=='7')
            echo "<img src='visit/images/7.png'>";
        else if(substr($s,$i,1)=='8')
            echo "<img src='visit/images/8.png'>";
        else if(substr($s,$i,1)=='9')
            echo "<img src='visit/images/9.png'>";
    }
    echo "<br>";
?>  
   </div>	
</body>
</html>