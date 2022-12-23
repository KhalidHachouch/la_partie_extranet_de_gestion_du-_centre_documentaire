<?php
include('session.php'); 
include('dbcon.php');

if(isset($_GET['id'])){
$id = $_GET['id'];

$sql = "SELECT * FROM demande where id_demande = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $row = mysqli_fetch_assoc($result);
  $id_member=$row['member_id']; 
    $Date = date("Y-m-d ",strtotime($row['date_traitement'])) ;
    $Datepr = date("Y-m-d ");
	$datecompare = date("Y-m-d ",strtotime($Date.'+2 days')) ;
	if($Datepr>$datecompare){
	$_SESSION['messagevalidate'] = "pas de validation par ce que il ya 48h de retard";
	//echo $datecompare ."   :    ".$Date."      pas de validation par ce que il ya 48h de retard";
	mysqli_query($conn,"update demande set status_demande='annuler automatic' where id_demande='$id'")or die(mysqli_error());
	header("location:validerde.php");
	}
	else{
		//echo $datecompare ."   :    ".$Date."       validation";
		//$sql = "INSERT INTO borrow (borrow_id, member_id) VALUES ('null', '$id_member')";
		mysqli_query($conn,"update demande set status_demande='cloture' where id_demande='$id'")or die(mysqli_error());
		$sql= mysqli_query($conn,"select * from demande where id_demande = '$id' order by id_demande DESC")or die(mysqli_error());
		$row1 = mysqli_fetch_array($sql);
		$book_id  = $row['book_id'];
		$member_id = $row['member_id'];
		$user_id = $_SESSION['id'];
		$date=$row['date'];
		$date_traitement=$row['date_traitement'];

		mysqli_query("BEGIN");

		mysqli_query($conn,"insert into borrow (member_id,date_borrow,due_date,user_id) values ('$member_id','$date','$date_traitement','$user_id')")or die(mysqli_error());



	$query = mysqli_query($conn,"select * from borrow order by borrow_id DESC")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
	$borrow_id  = $row['borrow_id']; 
	

		
							 mysqli_query($conn,"insert borrowdetails (book_id,borrow_id,borrow_status) values('$book_id','$borrow_id','pending')")or die(mysqli_error());
		

			mysqli_query("COMMIT");

			header("location:validerde.php");

	}


  }
  }
  /*if(isset($_GET['idd'])){
	$id = $_GET['idd'];
	$sql = "UPDATE demande set status_demande ='cloture' WHERE id_demande='$id'";
	if (mysqli_query($conn, $sql)) {
  
}
}*/


 


?>
