<?php
  session_start();
  if(isset($_SESSION['SESSION_USERNAME']) && isset($_POST['message']) && $_POST['message']!=''){
    include '../assets/config/config.php';
    $name = $_SESSION['SESSION_USERNAME'];
    $message = htmlspecialchars($_POST['message']);
    $message = mysqli_real_escape_string($myconn, stripcslashes($message));
    $message = trim($message);
    if(strlen($message) == 0){
        echo "what the hell";
    }
    else{
        $save = mysqli_query($myconn, "INSERT INTO chat_lobby (username, message) VALUES ('$name', '$message')");
        if($save){
            echo '<script>document.getElementById("message").value = "";</script>';
        }
    }
  }
