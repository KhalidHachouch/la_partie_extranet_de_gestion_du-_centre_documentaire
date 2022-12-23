<?php
include('session.php'); 
include('dbcon.php');
$id=$_GET['id'];
$user_id  = $_SESSION['id'];
date_default_timezone_set('Africa/Casablanca');
$dd = date('Y-m-d H:i:s');

$requette = "update demande set status_demande='valider', observation='Votre demande a été acceptée, merci de vous rejoine au ministère pour recevoir le livre', user_id='$user_id',date_traitement='$dd' where id_demande='$id'";
mysqli_query($conn,$requette)or die(mysqli_error());
$req= "insert into log values (0,'".$_SESSION['id']."','".$_SERVER['REMOTE_ADDR']."','".$dd."','update',\"$requette\")";
        //echo $req."<br/>";
        mysqli_query($conn,$req);



header('location:pretad.php');

?>