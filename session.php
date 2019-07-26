<?php
   include('connect.php');
   session_start();
   $user_check = $_SESSION['user_id'];
   $ses_sql = mysqli_query($con,"select * from users where user_id = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['name'];
   if(!isset($_SESSION['user_id'])){
      header("location:login.php");
   }
?>