<?php include('header.php');   ?>
<?php include('navbar.php'); ?>

<?php
session_start();
include "dbcon.php";
if(isset($_POST['submit'])){
	//header("location:books.php");
    $username = $_POST['username'];
    $password =sha1($_POST['password']);
    date_default_timezone_set('Africa/Casablanca');
	$dd = date('Y-m-d H:i:s');
    //echo $username." ". $password;
    $query = "SELECT * FROM member where password='$password' and email='$username'";
    $result = mysqli_query($conn, $query) or die(mysqli_error());

    $query1 = "SELECT * FROM users where password='$password' and username='$username'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error());

    
    if (mysqli_num_rows($result) == 1) {
    
      $row = mysqli_fetch_assoc($result);
        if($row['etat_compte'] =='desactiver' || $row['status'] =='0'){
            
            echo "<script type=\"text/javascript\">
            window.alert('desole votre compte est desactiver ou pas valider');
            
        </script>
        ";
        }
        elseif($row['status'] !='2'){
            
            echo "<script type=\"text/javascript\">
            window.alert('Un code d'activation a été envoyé à votre email');
            
        </script>
        ";
        }
       
        else{
            $_SESSION['id'] = $row['member_id'];
            $_SESSION['connecter'] ="ok"; 

        $req1= "insert into log values (0,'".$_SESSION['id']."','".$_SERVER['REMOTE_ADDR']."','".$dd."','connexion','succes')";
		//echo $req."<br/>";
		mysqli_query($conn,$req1);

            mysqli_query($conn, $query);


            header('location:dashboardcl.php');
            
        
   
        
        }

       

      }
      elseif(mysqli_num_rows($result1) == 1){
        $row = mysqli_fetch_assoc($result1);
       
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['droit'] = $row['droit'];
        $_SESSION['connecter'] ="ok"; 

        $req= "insert into log values (0,'".$_SESSION['id']."','".$_SERVER['REMOTE_ADDR']."','".$dd."','connexion member','succes')";
		//echo $req."<br/>";
		mysqli_query($conn,$req);
      
        
         header('location:dashboard.php');


    }
   
     

    
	else {
	        echo "<script type=\"text/javascript\">
	        window.alert('pas de compte avec ce email ou bien mot de passe incorrecte');
	        
	    </script>
	    ";
	    }







}?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">
					<!--div class="sti">
						<img src="E.B. Magalona.png" class="img-rounded">
					</div>-->
				<div class="login">
				<div class="log_txt">
				<p><strong>Veillez Entrer les Critières..</strong></p>
				</div>
						<form class="form-horizontal" method="POST">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Identifiant</label>
									<div class="controls">
									<input type="text" name="username" id="username" placeholder="Username or email" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Mot de Passe</label>
									<div class="controls">
									<input type="password" name="password" id="password" placeholder="Password" required>
								</div>
								</div>
								<div class="control-group">
									<div class="controls">
									<button id="login" name="submit" type="submit" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Se Connecter</button>
								</div>
								</div>
								<div class="control-group">
									<div class="controls">
									<a href="add_member_public.php" class="btn"><i class="icon-signin icon-large"></i>&nbsp;S'inscrire</a>
								</div>
								</div>
								


								
								
						</form>
				
				</div>
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>