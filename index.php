<?php 
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
      require "config/db.php";
      require "inc/header.php";
      require "inc/body.php";
      require "inc/footer.php";
        
    }else{
       header('Location: login.php');
   }
?>
