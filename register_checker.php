<?php
    error_reporting(0);
    error_log(0);
    ini_set('error_log', NULL);
    ini_set('log_errors', 0);
    session_start();
    include 'assets/config/config.php';
    include 'assets/config/sanitizer.php';
    if(!isset($_POST['user_name'])){
        $_POST['user_name'] = " ";
    }
    else{
        $username = sanitize($_POST['user_name']);

        $query = "SELECT * FROM account_login WHERE username = '$username'";
        $execute =  mysqli_query($myconn, $query);

        if($username == NULL){
            echo "<span class='text-danger'>Enter your desired username </span>";
            session_destroy();
        }
        elseif (strlen($username) < 7){
            echo "<span class='text-danger'>Too short</span>";
            session_destroy();
        }elseif(strlen($username) > 20){
          echo "<span class='text-danger'>Too long</span>";
          session_destroy();
        }
        else{
            if(mysqli_num_rows($execute) == 0){
                echo '<span class="text-primary">Available</span>';
                $_SESSION['REGISTRATION_USERNAME'] = $username;
            }
            elseif(mysqli_num_rows($execute) > 0){
                echo '<span class="text-danger">Already existed</span>';
                session_destroy();
            }
        }
    }

    if(!isset($_POST['password'])){
        $_POST['password'] = " ";
    }
    else{
        $password = sanitize($_POST['password']);
        if($password == NULL){
            echo "<span class='text-danger'>Enter your password</span>";
        }
        elseif(strlen($password) < 7){
            echo "<span class='text-danger'>Too short</span>";
        }
        else{
            echo "<span class='text-primary'>Okay!</span>";
            $_SESSION['REGISTRATION_PASSWORD'] = $password;
        }
    }
