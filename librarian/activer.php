<?php
include('dbcon.php');
$id=$_GET['id'];

mysqli_query($conn,"update member set etat_compte='activer' where member_id='$id'")or die(mysqli_error());

header('location:member.php');
?>