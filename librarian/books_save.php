<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$book_title=$_POST['book_title'];
$category_id=$_POST['category_id'];
$author=$_POST['author'];
$book_copies=$_POST['book_copies'];
//$book_pub=$_POST['book_pub'];
$publisher_name=$_POST['publisher_name'];
$isbn=$_POST['isbn'];
$copyright_year=$_POST['copyright_year'];
/* $date_receive=$_POST['date_receive']; */
/* $date_added=$_POST['date_added']; */
$status=$_POST['status'];
$resume=$_POST['resume'];
$filename=$_FILES["img"]["name"];
$tempname=$_FILES["img"]["tmp_name"];
$floder="coveer/".$filename;
move_uploaded_file($tempname,$floder);


								
mysqli_query($conn,"insert into book (book_title,category_id,author,book_copies,book_pub,publisher_name,isbn,copyright_year,status,image,resume)
 values('$book_title','$category_id','$author','$book_copies','$book_pub','$publisher_name','$isbn','$copyright_year','$status','$floder','$resume')")or die(mysqli_error());
 
 
header('location:books.php');
}
?>	