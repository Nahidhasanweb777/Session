<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
<?php

session_start();
header("refresh: 10");

if(isset($_SESSION['user_mail'])){
    if((time() -  $_SESSION['start_time']) > 10){
        header("location:logout.php");
         }
    else{
      echo $_SESSION['user_mail'];

      ?>
      <br>
      <br>

   <a class="btn btn-danger" href="logout.php">Logout</a>
  <?php
        }
  ?>

<?php
}
else{
    header("location:index.php");
}

?>