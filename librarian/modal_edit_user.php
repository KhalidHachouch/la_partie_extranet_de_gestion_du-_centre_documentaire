	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Editer Identifiant</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Identifiant</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['user_id']; ?>" required>
				<input type="text" id="inputEmail" name="username" value="<?php echo $row['username']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">mot de Passe</label>
				<div class="controls">
				<input type="text" name="password" id="inputPassword" value="<?php echo $row['password']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Prenom</label>
				<div class="controls">
	
				<input type="text" id="inputEmail" name="firstname" value="<?php echo $row['firstname']; ?>" >
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Nom</label>
				<div class="controls">

				<input type="text" id="inputEmail" name="lastname" value="<?php echo $row['lastname']; ?>" >
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Droit</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="droit" placeholder="droit" required>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Changer</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Fermer</button>
		</div>
    </div>
	
	<?php
	if (isset($_POST['edit'])){
	
	$user_id=$_POST['id'];
	$username=$_POST['username'];
	$password=sha1($_POST['password']);
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$droit=$_POST['droit'];
	mysqli_query($conn,"update users set username='$username', password='$password' , firstname = '$firstname' , lastname = '$lastname',droit= '$droit'  where user_id='$user_id'")or die(mysqli_error()); ?>
	<script>
	window.location="users.php";
	</script>
	<?php
	}
	?>