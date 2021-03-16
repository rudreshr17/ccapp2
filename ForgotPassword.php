<?php

$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$headers = "From: siddhant.shaha@somaiya.edu";

// send email
mail("siddhantshah288@gmail.com","OTP Message",$msg,$headers);

?>
