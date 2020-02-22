<?php
    require('assets/config/config.php');
    include('assets/config/sanitizer.php');
    session_start();

    if($myconn){
        if(isset($_POST['login'])){
            $username = sanitize($_POST['username']);
            $password = sanitize($_POST['password']);

            if(strlen($username) == 0 || strlen($password) == 0){
                $_SESSION['EMPTY_DETAILS'] = 'Please enter your account details.';
                header('location: login-page.php');
            }

            $check_info = mysqli_query($myconn, "SELECT * FROM account_login WHERE username = '$username'");
            if(mysqli_num_rows($check_info) > 0){
                while($row = mysqli_fetch_array($check_info)){
                    $_SESSION['SESSION_USERNAME'] = $row['username'];
                    $_SESSION['HASH_PASSWORD'] = $row['password'];
                }
                $hash_password = $_SESSION['HASH_PASSWORD'];
                $verified_username = $_SESSION['SESSION_USERNAME'];
                if(password_verify($password, $hash_password)){
                  $get_session_id = mysqli_query($myconn, "SELECT * FROM game_lobby WHERE username = '$verified_username'");
                  if(mysqli_num_rows($get_session_id) > 0){
                      while($row1 = mysqli_fetch_array($get_session_id)){
                          $_SESSION['SESSION_ID'] = $row1['session_id'];
                      }
                      $status = "ACTIVE";
                      $session_id = $_SESSION['SESSION_ID'];
                      $update_status = mysqli_query($myconn, "UPDATE game_lobby SET status = '$status' WHERE session_id = '$session_id' AND username = '$verified_username'");
                      $timezone = date_default_timezone_set('Asia/Manila');
                      $date = date('M/d/Y h:i:s a', time());
                      $_SESSION['LOGGED_IN_TIME'] = $date;
                      $_SESSION['SESSION_TIMER'] = time();
                      $save_log = mysqli_query($myconn, "INSERT INTO account_logs (username, logged_in) VALUES ('$verified_username', '$date')");
                      header('location: lobby/global-lobby.php');
                  }
                  else{
                      echo "error occured";
                  }
                }
                else{
                    $_SESSION['NO_ACCOUNT'] = 'Username and password did not matched. Please try again';
                    header('location: login-page.php');
                }
            }
            else{
                $_SESSION['NO_ACCOUNT'] = 'Username and password did not matched. Please try again';
                header('location: login-page.php');
            }
        }
        else{
            $_SESSION['ERR_MSG'] = 'Please login with your account.';
            header('location: login-page.php');
        }
    }
    else{
        $_SESSION['ERR_CONNECTION'] = 'Error occured while trying connect to the database';
    }