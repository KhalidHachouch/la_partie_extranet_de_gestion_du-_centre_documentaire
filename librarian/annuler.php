<?php
include('dbcon.php');
$id=$_GET['id'];
mysqli_query($conn,"delete from demande where id_demande='$id'") or die(mysqli_error());
//mysqli_query($conn,"update demande set observation='La demande a été supprimer par le client where id_demande='$id'") or die(mysqli_error());
header('location:dashboardcl.php');
?>