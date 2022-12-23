<?php
require_once("DBController.php");
$db_handle = new DBController();


if(!empty($_POST["cin"])) {
  $query = "SELECT * FROM member WHERE cin='" . $_POST["cin"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
     // echo "<span class='status-not-available'> CIN déja existante.</span>";
      echo "<script> alert('CIN déja existante.'); document.getElementById('cin').focus();</script>";
      
  }else{
      echo "<span class='status-available'></span>";
  }
}
?>