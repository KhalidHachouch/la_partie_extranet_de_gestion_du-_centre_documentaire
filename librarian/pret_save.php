<?php
    include('session.php'); 
 	include('dbcon.php');
	
     if (isset($_POST['pret'])){
     	  
        $member_id  = $_SESSION['id'];
        $book_id = $_POST['boook'];
        $date  = $_POST['datee'];

        $resultt=mysqli_query($conn,"SELECT count(id_demande) as total from demande  where member_id='$member_id'");
        $datai=mysqli_fetch_assoc($resultt);
        if($datai['total']>= 2){
            echo "<script type=\"text/javascript\">
            window.alert('Désolé, vous avez deux demandes, et la troisième ne peut pas être complétée')
            window.location.href='http://localhost:8181/biblio/librarian/bookscl.php';
            
        </script>
        ";

        }

        else{

        

        $requette = "insert into demande (member_id,date,status_demande,book_id) values ('$member_id','$date','en cours','$book_id')";
        mysqli_query($conn,$requette)or die(mysqli_error());
        $req= "insert into log values (0,'".$_SESSION['id']."','".$_SERVER['REMOTE_ADDR']."','".$date."','INSERT',\"$requette\")";
        //echo $req."<br/>";
        mysqli_query($conn,$req);
       
        

         

        header('location:bookscl.php');

     }
}
?>
	
	

	
	