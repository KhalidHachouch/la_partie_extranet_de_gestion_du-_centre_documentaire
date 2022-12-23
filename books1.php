<?php include('header.php'); ?>
<?php $conn = mysqli_connect('localhost','root','','eb_lms') or die(mysqli_error()); ?>
<?php include('navbar.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Liste Ouvrages</strong>
                                </div>
						<!-- 
								    <ul class="nav nav-pills">
										<li   class="active"><a href="books.php">Tous</a></li>
										<li><a href="new_books.php">Nouveau</a></li>
										<li><a href="old_books.php">Ancien</a></li>
										<li><a href="lost.php">Egaré</a></li>
										<li><a href="damage.php">Damagé</a></li>
										<li><a href="sub_rep.php">Remplacement</a></li>
									</ul>
						  -->
						<center class="title">
						<h1>Liste Ouvrages</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								<div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i>Imprimer</a>
								</div>
								
							
                                <thead>
                                    <tr>
									    <th>N° Exemplaire</th>                                 
                                        <th>Titre</th>                                 
                                        <th>Theme</th>
										<th>Auteur</th>
										<th class="action">Nombres Copies</th>
										<th>Id Edition</th>
										<th>Edition</th>
										<th>ISBN</th>
										<th>Année</th>
										<th>Etat</th>
										<!--th class="action"></th-->		
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 

							
							
									

								  $user_query=mysqli_query($conn,"select * from book where status != 'Archive'")or die(mysqli_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['book_id'];  
									$cat_id=$row['category_id'];
									$book_copies = $row['book_copies'];
									
									$borrow_details = mysqli_query($conn,"select * from borrowdetails where book_id = '$id' and borrow_status = 'pending'");
									$row11 = mysqli_fetch_array($borrow_details);
									$count = mysqli_num_rows($borrow_details);
									
									$total =  $book_copies  -  $count; 
									/* $t4otal =  $book_copies  - $borrow_details;
									
									echo $total; */
											$cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'")or die(mysqli_error());
											$cat_row = mysqli_fetch_array($cat_query);
									?>
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['book_id']; ?></td>
                                    <td><?php echo $row['book_title']; ?></td>
									<td><?php echo $cat_row ['classname']; ?> </td>
                                    <td><?php echo $row['author']; ?> </td> 
                                    <td class="action"><?php echo /* $row['book_copies']; */   $total;   ?> </td>
                                     <td><?php echo $row['book_pub']; ?></td>
									 <td><?php echo $row['publisher_name']; ?></td>
									 <td><?php echo $row['isbn']; ?></td>
									 <td><?php echo $row['copyright_year']; ?></td>		
									 <td><?php echo $row['status']; ?></td>
									<?php include('toolttip_edit_delete.php'); ?>
                                    <!--td class="action">
                                       
										
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