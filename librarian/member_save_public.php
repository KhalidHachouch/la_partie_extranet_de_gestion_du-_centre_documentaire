
<?php 
// include('session.php'); 
include('dbcon.php');
date_default_timezone_set('Africa/Casablanca');
$DateAndTime = date('Y-m-d H:i:s');
if (isset($_POST['co'])){
$firstname=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['firstname']))));
$lastname=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['lastname']))));
$gender=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['gender']))));
$cin=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['cin']))));
$address=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['address']))));
$email=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['email']))));
$password=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim(sha1($_POST['password'])))));
$password1=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim(sha1($_POST['password1'])))));
//$di=date('Y-m-d h:i:s',strtotime($_POST['datte']));
$contact=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['contact']))));
$type=mysqli_real_escape_string($conn,htmlspecialchars(stripslashes(trim($_POST['type']))));
//$year_level="";

$qu=mysqli_query($conn,"select * from member where email = '$email'");
if(mysqli_num_rows($qu)>0){
      echo "<script type=\"text/javascript\">
            window.alert('ce email deja exists');
            window.location.href='http://localhost:8181/biblio/librarian/add_member_public.php';
        </script>
        ";
   
        

}

else{
    



    $requette = "insert into member(firstname,lastname,gender,cin,address,contact,type,email,date_inscription,status,password,etat_compte) values('$firstname','$lastname','$gender','$cin','$address','$contact','$type','$email','$DateAndTime','0','$password','activer')";                              
    mysqli_query($conn,$requette)or die(mysqli_error());
    $req= "insert into log values (0,'".$_SESSION['id']."','".$_SERVER['REMOTE_ADDR']."','".$DateAndTime."','INSERT',\"$requette\")";
    echo $req."<br/>";
    mysqli_query($conn,$req);
     //echo "0000";
    header('location:wait.php');

}}
?>


