<?php
include('dbcon.php');
$id=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_GET['id']))));
$emailto = mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_GET['email']))));
$c=$emailto."A2021";
$a= sha1($c);
$message ="<button style='color: red;'> <a href='http://cdoc.emploi.gov.ma:8181/biblio/librarian/activation.php?stat=$a&user=$emailto&id=$id'>verifier</a> </button>";
$headers = "From: khalidhach65@gmail.com \r\n";
$headers .="MIME-Version:1.0" ."\r\n";
$headers .="Content-type:text/html;charset=UTF-8" ."\r\n";
$mm =mail($emailto,"message de validation du compte",$message,$headers);

if($mm){echo "ok";}else{echo "no?????";}

mysqli_query($conn,"update member set status='$a' where member_id='$id'")or die(mysqli_error());

header('location:member.php');
?>