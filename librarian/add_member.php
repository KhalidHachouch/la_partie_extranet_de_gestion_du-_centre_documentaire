<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_member.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
		
             <div class="alert alert-info">Ajout Emprunteur</div>
			<p><a href="member.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Retour</a></p>
	<div class="addstudent">
	<div class="details">Veuillez Remplir Les Critières:</div>		
	<form class="form-horizontal" method="POST" action="member_save.php" enctype="multipart/form-data">
			
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
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Ajouter</button>
			</div>
		</div>
    </form>					
			</div>		
			</div>		
			</div>
		</div>
    </div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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