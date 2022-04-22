<?php
session_start();
// $servername = "localhost";
// $username = "nahid";
// $password = "1234";


// Create connection
$conn = mysqli_connect('localhost', 'nahid', '1234','nahid');

// Check connection
if (!$conn) {
  die("Connection failed. " . mysqli_error($conn));
}
echo " Database Connected successfully";
?>

<?php

if(isset($_REQUEST['email'])){
  $user_email = $_REQUEST['email'];
  $user_pswd = $_REQUEST['pswd'];

  $hash_format = "$2y$07$"; //code 07 is how much time need to genarate 
  $salt = "vbnhjkloyesadfyhju22$"; // salt is mix with hash_farmate then genarat
  $conC = $hash_format . $salt;
  $user_pswd = crypt( $user_pswd,$conC);
 
  $sql="select * from user where EMAIL='$user_email' AND PASSWORD='$user_pswd'";
  
 // $result1=mysql_query($sql);

  $result1 = mysqli_query($conn, $sql);
//   $fetchdatas = mysqli_fetch_assoc($result1);
  
$row_count = mysqli_num_rows($result1);
   
if ($row_count){
  $_SESSION['user_mail'] = $user_email;
  $_SESSION['start_time'] = time();
  header("location:welcome.php");
  
}
else{
  echo "login faild";
}

  
}




?>