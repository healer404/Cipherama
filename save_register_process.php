<?php
 session_start();
 error_reporting(0);
 error_log(0);
 ini_set('error_log', NULL);
 ini_set('log_errors', 0);
 $_SESSION['registered'] = '';
 if(isset($_POST['register'])){
  include 'assets/config/config.php';
  include 'assets/config/sanitizer.php';
  if(strlen($_POST['username'])>20){
    $_SESSION['registered'] = "danger";
    header('Location: index.php');
  }
  $username = sanitize($_POST['username']);
  $password = sanitize($_POST['password']);
  $vpassword = sanitize($_POST['verify_password']);
  if(isset($_SESSION['REGISTRATION_USERNAME']) && isset($_SESSION['REGISTRATION_PASSWORD'])){
   if($_SESSION['REGISTRATION_PASSWORD'] == $password && $_SESSION['REGISTRATION_USERNAME'] == $username){
     if($password == $vpassword){
         $hash_password = password_hash($password, PASSWORD_BCRYPT);
         $save_registration = mysqli_query($myconn, "INSERT INTO account_login (username, password) VALUES ('$username', '$hash_password')");
         $status = "INACTIVE";
         $session_id = session_id().$username;
         $save_registration_game = mysqli_query($myconn, "INSERT INTO game_lobby (username, status, session_id) VALUES ('$username', '$status', '$session_id')");
         if($save_registration && $save_registration_game){
             $_SESSION['SUCCESSFUL_REGISTRATION'] = "You're account is successfully created ". $username . "!";
             header('Location: register-page.php');
         }
         else{
             $_SESSION['registered'] = "danger";
         }
     }
     else{
      $_SESSION['PASSWORD_NOT_MATCHED'] = 'Password did not matched. Please try again.';
         header('Location: register-page.php');
     }
   }
   else{
       $_SESSION['PASSWORD_NOT_MATCHED'] = "SOMETHING'S NOT RIGHT IDIOT!";
       header('Location: register-page.php');
   }
  }
  else{
      $_SESSION['PASSWORD_NOT_MATCHED'] = "Please make sure everything is validated before proceeding.";
      header('Location: register-page.php');
  }
 }
 else{
     header('Location: register-page.php');
 }

