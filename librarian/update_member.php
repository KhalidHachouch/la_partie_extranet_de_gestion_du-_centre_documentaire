<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$id=$_POST['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$cin=$_POST['cin'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$type=$_POST['type'];
//$year_level=$_POST['year_level'];
//$status=$_POST['status'];

mysqli_query($conn,"update member set firstname='$firstname',lastname='$lastname',gender='$gender',cin='$cin',address = '$address',contact = '$contact',type = '$type' where member_id='$id'")or die(mysqli_error());
								
								
header('location:member.php');
}
?>	