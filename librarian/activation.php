<?php
include('dbcon.php');
if(isset($_GET['stat'])){
	$v_stat=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_GET['stat']))));
	$id= mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_GET['id']))));
	$re =mysqli_query($conn,"select * from member where status ='$v_stat' and member_id='$id'");
	if($re -> num_rows == 1 ){
		$up = mysqli_query($conn,"update member set status='2' where member_id='$id'")or die(mysqli_error());		
		if ($up) {
			echo "<script> alert ('felecitation votre compte est activé avec succès');
					window.location.href='http://cdoc.emploi.gov.ma:8181/biblio/librarian/index.php';
			</script>";
		}
		else{
			echo "erreur d'activation de compte";
		}
	}
}

?>