<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_bookscl.php'); ?>

<form method="post" action="pret_save.php">
<div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Ouvrage</strong>
                                </div>
						<!--  -->
								    <!--ul class="nav nav-pills">
										<li   class="active"><a href="books.php">Tous</a></li>
										<li><a href="new_books.php">Nouveau</a></li>
										<li><a href="old_books.php">Ancien</a></li>
										<li><a href="lost.php">Egaré</a></li>
										<li><a href="damage.php">Damagé</a></li>
										<li><a href="sub_rep.php">Remplacement</a></li>
									</ul>-->
						<!--  -->
						<center class="title">
						<h1>Liste Ouvrages</h1>
						</center>
						<p><a href="bookscl.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Retour</a></p>
						<div class="control-group"> 
					<label class="control-label" for="inputEmail">Date Emprunt</label>
					<div class="controls">
					<input type="datetime-local" name="datee" style="border: 3px double #CCCCCC;" required/>
					</div>
				</div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								<!--div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i>Imprimer</a>
								</div>-->
								<!--p><a href="add_books.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Ajouter Un Ouvrage</a></p>-->
							
                                <thead>
                                    <tr>
									    <th>cover</th>                                
                                        <th>Titre</th>                                 
                                        <th>Theme</th>
										<th>Auteur</th>
										<th>resume</th>
										<!-- <th>Date D'Ajout</th> -->	
                                    </tr>
                                </thead>
                                <tbody>

<?php
if(isset($_GET['id'])){
$id = $_GET['id'];

			$user_query=mysqli_query($conn,"select * from book where book_id= '$id' and status != 'Archive'")or die(mysqli_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['book_id'];  
									$cat_id=$row['category_id'];
									$book_copies = $row['book_copies'];
									
									$borrow_details = mysqli_query($conn,"select * from borrowdetails where book_id = '$id' and borrow_status = 'pending'");
									$row11 = mysqli_fetch_array($borrow_details);
									$count = mysqli_num_rows($borrow_details);
									
									$total =  $book_copies  -  $count; 
									// $t4otal =  $book_copies  - $borrow_details;
									
									//echo $total; 
											$cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'")or die(mysqli_error());
											$cat_row = mysqli_fetch_array($cat_query);
											?>
									<tr class="del<?php echo $id ?>">
                      				<td><img src="<?php echo $row['image']; ?>" alt="..."></td>		
                                    <td><?php echo $row['book_title']; ?></td>
									<td><?php echo $cat_row ['classname']; ?> </td>
                                    <td><?php echo $row['author']; ?> </td> 
                                    <!-- <td><?php echo $row['date_added']; ?></td> -->
									 <td><?php echo $row['resume']; ?> </td>
									  <input hidden="true"  value="<?php echo $id ?>" name="boook">

								
									
                                    </tr>
									<?php  }  ?>
                           
                                </tbody>
                            </table>
							<div class="control-group"> 
					<div class="controls">

								<button name="pret" class="btn btn-success" type="submit"><i class="icon-plus-sign icon-large"></i> preter</button>
					</div>
				</div>
				</div>
				</form>			
			
			</div>		
			</div>
		</div>
    </div>

<?php  }  
 

        if(!empty($_SESSION['id']) ){
            $id_member = $_SESSION['id'];
			echo $id_member;
        }
            else{
                echo "fuck i not defind";
            }									
include('footer.php') ?>