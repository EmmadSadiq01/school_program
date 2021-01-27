<?php
session_start();
if($_SESSION['logedin'] =true){
  session_unset();
    session_destroy();
  header('location: ../login.php');
}
else{
    
    header('location: ../login.php');
}
?>