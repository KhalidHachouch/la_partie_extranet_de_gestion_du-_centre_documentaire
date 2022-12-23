<?php
include('dbcon.php');
$id=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_GET['id']))));

mysqli_query($conn,"update member set etat_compte='desactiver' where member_id='$id'")or die(mysqli_error());

header('location:member.php');
?>