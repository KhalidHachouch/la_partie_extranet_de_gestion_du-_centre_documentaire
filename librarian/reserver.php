<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_reserver.php'); ?>
<div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Ouvrage</strong>
                                </div>
                                 <!--ul class="nav nav-pills">
										<li class="active"><a href="pretad.php">Tous</a></li>
										<li><a href="validerde.php">Demande valider</a></li>
										<li><a href="refuserde.php">Demande refuser</a></li>
										
									</ul>

					
						<center class="title">
						<h1>Liste Ouvrages</h1>
						</center>
						<p><a href="dashboard.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Retour</a></p>
						<div class="control-group"> 
					<label class="control-label" for="inputEmail">Date Emprunt</label>
					<div class="controls">
					<input type="date"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="datee" id="ssd" maxlength="10" style="border: 3px double #CCCCCC;" required/>
					</div>
				</div>-->
							

                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								<!--div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i>Imprimer</a>
								</div>-->
								<!--p><a href="add_books.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Ajouter Un Ouvrage</a></p>-->
							
                                <thead>
                                    <tr>
									    <th>id_demande</th>                                
                                        <th>member name</th>                                 
                                        <th>date demande</th>
										<th>Status</th>
										<th>date traitement</th>
										<th>observation</th>
										<th>Action</th>
										<!-- <th>Date D'Ajout</th> -->	
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php  
                                	$member_id  = $_SESSION['id'];

                                	$user_query=mysqli_query($conn,"select * from demande join member on demande.member_id=member.member_id where member.member_id ='$member_id'")or die(mysqli_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id_demande'];  ?>
									<tr class="del<?php echo $id ?>">
									<td><?php echo $row['id_demande']?></td>
                                    <td><?php echo $row['firstname']."  ".$row['lastname'] ?> </td> 
                                    <td><?php echo $row['date']; ?> </td>
                                    <td><?php echo $row['status_demande']; ?> </td>
                                    <td><?php echo $row['date_traitement']; ?> </td>
                                    <td><?php echo $row['observation']; ?> </td>
                                    <td>
									 <a rel="tooltip" id="<?php echo $id; ?>" href="annuler.php<?php echo '?id='.$id; ?>" onclick=" return confirm('etes vous sur de vouloir annuler la demande ');" class="btn btn-danger">Annuler</a>
                                       
									</td>
                                    </tr>
									<?php  }  ?>
									 </tbody>
                            </table>
                        
                            </div>		
			</div>
		</div>
    </div>
    <?php include('footer.php') ?>