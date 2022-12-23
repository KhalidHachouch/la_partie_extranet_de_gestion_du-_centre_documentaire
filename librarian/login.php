 <?php
session_start();
include "dbcon.php";

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    echo $username." ".$password;

    $query = "SELECT * FROM member where password='$password' and email='$username'";
    $result = mysqli_query($conn, $query) or die(mysqli_error());

    $query1 = "SELECT * FROM users where password='$password' and username='$username'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error());

    
    if (mysqli_num_rows($result) == 1) {
    
      $row = mysqli_fetch_assoc($result);
        if($row['etat_compte'] =='desactiver'){
            
            echo "<script type=\"text/javascript\">
            window.alert('tu doix activer ton compte');
            
        </script>
        ";
        }
       
        else{
            $_SESSION['id_member'] = $row['member_id'];
            
        
              echo $_SESSION['id_member'];
               header('location:books.php');
        }

       

      }

      elseif(mysqli_num_rows($result1) == 1){
        $row = mysqli_fetch_assoc($result1);
       
        $_SESSION['id_admin'] = $row['user_id'];
      
        header('location:dashboard.php');


    }
   
     

    
    else {
        echo "<script type=\"text/javascript\">
        window.alert('pas de compte avec ce email ou bien mot de passe incorrecte');
        
    </script>
    ";
    }







}









?>
