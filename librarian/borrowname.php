<form method="post" action="borrow_save.php">
<div class="border-borrow">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Nom Emprunteur</label>
				<div class="controls">
				<select name="member_id" class="chzn-select" required/>
				<option></option>
				<?php $result =  mysqli_query($conn,"select * from member")or die(mysqli_error()); 
				while ($row=mysqli_fetch_array($result)){ ?>
				<option value="<?php echo $row['member_id']; ?>"><?php echo $row['firstname']." ".$row['lastname']; ?></option>
				<?php } ?>
				</select>
				</div>
			</div>
				<div class="control-group"> 
					<label class="control-label" for="inputEmail">Date Emprunt</label>
					<div class="controls">
					<input type="text"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="due_date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required/>
					</div>
				</div>
				<div class="control-group"> 
					<div class="controls">
						<button class="btn btn-success" name="borrow"><i class="icon-plus"></i> Prêter</button>
						<button name="delete_student" class="btn btn-danger"><i class="icon-check icon-large"></i> Oui</button>
					</div>
				</div>
</div>
