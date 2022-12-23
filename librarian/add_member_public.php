<?php include('header.php'); ?>
<!--?php include('session.php'); ?-->
<!--?php include('navbar_member.php'); ?-->
<?php include('navbar.php'); ?>
<!--script src='https://www.google.com/recaptcha/api.js' async defer ></script-->
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
		
             <!--div class="alert alert-info">Veuillez remplir le formulaire suivant:</div-->
			<p><a href="/biblio/index.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Retour</a></p>
	<div class="addstudent">
	<div class="details">Veuillez Remplir Les Critières suivant:</div>		
	<form class="form-horizontal" method="POST" action="member_save_public.php" enctype="multipart/form-data">
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Prénom:</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="firstname"  placeholder="Firstname" required>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Nom:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="lastname"  placeholder="Lastname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Sexe:</label>
			<div class="controls">
			<select name="gender" required>
				<option></option>
				<option>Homme</option>
				<option>Femme</option>
			</select>
			</div>
		</div>
		<div class="control-group">
		<?php include("cin.php")?>
			<!--<label class="control-label" for="inputPassword">CIN:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="cin"  placeholder="cin" required>
			</div>-->
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Adresse:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="address"  placeholder="Address" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Email:</label>
			<div class="controls">
			<input type="email" id="inputPassword" name="email"  placeholder="entrer votre email " required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password:</label>
			<div class="controls">
			<input type="password" id="inputPasswordd" name="password"  placeholder="entrer votre password " required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputConfirmPassword">Confirmez votre mot de passe:</label>
			<div class="controls">
			<input type="password" id="inputPassword1" name="password1"  placeholder="Confirmez votre mot de passe " required>
			</div>
		</div>
		<!--div class="control-group">
			<label class="control-label" for="inputPassword">Date_inscription:</label>
			<div class="controls">
			<input type="datetime-local" id="inputPassword" name="datte" required >
			</div>
		</div-->

		<div class="control-group">
			<label class="control-label" for="inputPassword">Num Telephone:</label>
			<div class="controls">
			<input type='tel' pattern="[0-9]{10,10}" class="search" name="contact"  placeholder="Phone Number"  autocomplete="off"  maxlength="11" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Type:</label>
			<div class="controls">
			<select name="type" required>
			
			
			
									<option></option>
									<option>Interne</option>
									<option>Externe</option>
									<option></option>
									
				</select>
			</div>
		</div>


			<div class="form-group mt-4 mb-0"><span class="small text-danger" style="color:red;" id="msg"></span><input class="btn btn-primary btn-block" type="submit" name="co" value="S'inscrire" style="text-align:center;width:50%; margin-left:20%;margin-right:20%;" onclick="return verify();"/></div>		
		
		
			
    </form>					
			</div>		
			</div>		
			</div>
		</div>
    </div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
			            function verify(){

			                var password=document.getElementById("inputPasswordd").value;
			                var password1=document.getElementById("inputPassword1").value;
			                if( password !== password1)
			                {     
			                 
			                 document.getElementById("msg").innerHTML="Les mots de passe ne sont pas identiques";
			                 return false;
			                }

			                else
			                {
			                 return true ;
			                }


			            }
			        </script>
<script>
//fonction pour activer le span correspondant

//description de l'objet xhr
function getXMLHttpRequest() {
 var xhr = null;
 
 if (window.XMLHttpRequest || window.ActiveXObject) {
  if (window.ActiveXObject) {
   try {
    xhr = new ActiveXObject("Msxml2.XMLHTTP");
   } catch(e) {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
   }
  } else {
   xhr = new XMLHttpRequest(); 
  }
 } else {
  alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
  return null;
 }
 
 return xhr;
}


<?php include('footer.php') ?>