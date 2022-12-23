	<div id="add_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Ajouter Un Utilisateur</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Identifiant</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="username" placeholder="Username" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Mot de Passe</label>
				<div class="controls">
				<input type="password" name="password" id="inputPassword" placeholder="Password" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Prenom</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="firstname" placeholder="Username" >
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Nom</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="lastname" placeholder="Username" >
				</div> <br>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Droit</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="droit" placeholder="droit" required>
				</div>
			</div>
			</div>
			<div class="control-group">
				<div class="controls">
				<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Ajouter</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Fermer</button>
		</div>
    </div>
	
	<?php
	if (isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=sha1($_POST['password']);
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$droit=$_POST['droit'];
	mysqli_query($conn,"insert into users (username,password,firstname,lastname,droit) values('$username','$password','$firstname','$lastname','$droit')")or die(mysqli_error());
	}
	?>