<?php
$email = $_POST["email"];
$headers = 'From: 11011201@pc170-249.nttu.edu.tw';

// the message
$msg = "Test Message";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);



// send email
mail($email,"TEST MAIL",$msg, $headers);
echo "已寄出郵件";
?>