 <?php
header("Content-Type: text/plain");
//rechercher par critere les noms 
$conn = mysqli_connect('localhost','root','','eb_lms') or die(mysqli_error());
$cin=$_GET['cin'];
$sel="SELECT cin FROM member WHERE cin = '$cin' ";
echo $sel;
/*
$req=mysqli_query($conn,$sel);
while($tab = mysqli_fetch_assoc($req)){
 if($tab[i]==$cin){
 echo("1");
      }
 else
 {
 echo("2");
 }
}
mysqli_free_result($req);*/
?>