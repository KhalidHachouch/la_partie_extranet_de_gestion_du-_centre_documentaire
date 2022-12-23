<?php include('header.php'); ?>


<?php
session_start();
$str_rand = md5(rand());
$str = substr(str_rand, 0,6);
$_SESSION['captcha'] =$str;
$newImage = imagecreate(100, 30);
$col = imagecolorallocate($newImage, 0, 0, 0);
imagestring($newImage, 29, 10, 2, $str_rand, $col);
header('content:image/jpeg');
imagejpeg($newImage); 
?>