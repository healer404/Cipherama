<?php
session_start();
if(isset($_SESSION['username']) && isset($_POST['message']) && $_POST['message']!=''){
    include 'phpgameassets/config/config.php';
    $teamname = $_SESSION['TEAMNAME'];
    $role = $_SESSION['ROLE'];
    $gameid = $_SESSION['gameid'];
    $name = $_SESSION['username'];
    $message = htmlspecialchars($_POST['message']);
    $message = mysqli_real_escape_string($myconn, stripcslashes($message));
    $message = trim($message);
    if(strlen($message) == 0){
        echo "what the hell";
    }
    else{
        $save = mysqli_query($myconn, "INSERT INTO chat_game (username, message, role, gameid, teamname) VALUES ('$name', '$message', '$role', '$gameid', '$teamname')");
        if($save){
            echo '<script>document.getElementById("message").value = "";</script>';
        }
    }
}
