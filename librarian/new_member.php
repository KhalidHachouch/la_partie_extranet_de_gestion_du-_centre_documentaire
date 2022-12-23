<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_member.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <!--div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Liste Emprunteurs</strong>
                                </div-->
                                <ul class="nav nav-pills">
										<li><a href="member.php">Tous</a></li>
										<li class="active"><a href="new_member.php">Nouveau member</a></li>
										<li><a href="interne_member.php">Interne member</a></li>
										<li><a href="externe_member.php">Externe member</a></li>
									</ul>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                             
								<!--p><a href="add_member.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Ajouter Un Emprunteur</a></p-->
							
                                <thead>
                                    <tr>
                       
                                        <th>Nom</th>                                 
                                        <th>Sexe</th>
                                        <th>CIN</th>
										<th>Addresse</th>
										<th>Telephone</th>
										<th>Type</th>
										<th>Email</th>										
										<th>Etat</th>
										<!--th>Action</th-->

                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php  $user_query=mysqli_query($conn,"select * from member where status='0'")or die(mysqli_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['member_id'];  ?>
									<tr class="del<?php echo $id ?>">
									
									                              
                                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                    <td><?php echo $row['gender']; ?> </td> 
                                    <td><?php echo $row['cin']; ?> </td>
                                    <td><?php echo $row['address']; ?> </td>
                                    <td><?php echo $row['contact']; ?></td>
									<td><?php echo $row['type']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><a  rel="tooltip" id="a<?php echo $id; ?>" href="valider.php<?php echo '?id='.$id; ?>&email=<?php echo $row['email']?>" class="btn btn-success">Valider</a>
									 <a rel="tooltip" id="<?php echo $id; ?>" href="#delete_student<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger">Refuser</a>
                                        <?php include('delete_student_modal.php'); ?>
									</td>									
									<!--td><?php echo $row['status']; ?></td--> 
									<?php include('toolttip_edit_delete.php'); ?>
                                    <!--td width="100">
                                        <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_student<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('delete_student_modal.php'); ?>
										<a  rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="edit_member.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
										
                                    </td-->
                                 
                                    
									
                                    </tr>
									<?php  }  ?>
                           
                                </tbody>
                            </table>
							
			
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>