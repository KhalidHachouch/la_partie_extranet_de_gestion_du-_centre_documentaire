<?php 
include('session.php'); 
$DateAndTime = date('Y-m-d h:i:s a', time());
include('dbcon.php');
if (isset($_POST['submit'])){
$firstname=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['firstname']))));
$lastname=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['lastname']))));
$gender=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['gender']))));
$cin=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['cin']))));
$address=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['address']))));
$email=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['email']))));
$contact=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['contact']))));
$type=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['type']))));
//$year_level="";

$requette = "insert into member(firstname,lastname,gender,cin,address,contact,type,email,date_inscription,status) values('$firstname','$lastname','$gender','$cin','$address','$contact','$type','$email','$DateAndTime','0')";								
mysqli_query($conn,$requette)or die(mysqli_error());
$req= "insert into log values (0,'".$_SESSION['id']."','".$_SERVER['REMOTE_ADDR']."','".$DateAndTime."','INSERT',\"$requette\")";
echo $req."<br/>";
mysqli_query($conn,$req);
 //echo "0000";
header('location:member.php');
}
?>