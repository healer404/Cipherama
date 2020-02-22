<?php
session_start();
$id = $_GET['gameid'];
$creator = $_GET['creator'];
include "../assets/config/config.php";
include "../assets/config/sanitizer.php";

$username = $_SESSION['SESSION_USERNAME'];
$position = 'MEMBER';

$get = mysqli_query($myconn, "SELECT * FROM players WHERE gameid = '$id'");
if(mysqli_num_rows($get) > 0){
    while($row = mysqli_fetch_array($get)){
        $hash_id = $row['hash_id'];
        $name = $row['username'];
    }
    if($name == $username){
        header('location: gamelobby.php?gameid='.$hash_id.'&creator='.$creator.'');
    }
    else{
        $checknumplayers = mysqli_query($myconn, "SELECT * FROM active_lobby WHERE gameid='$id' AND creator='$creator'");
        if(mysqli_num_rows($checknumplayers) > 0){
            while($row1 = mysqli_fetch_array($checknumplayers)){
                $num = $row1['players'];
                $max_players = $row1['maxplayers'];
            }
            $numplayers = $num + 1;
            $add = mysqli_query($myconn, "INSERT INTO players (gameid, username,maxplayers, hash_id, position) VALUES ('$id', '$username', '$max_players','$hash_id', '$position')");
            if($add){
                $update = mysqli_query($myconn, "UPDATE active_lobby SET players='$numplayers' WHERE gameid='$id'");
                header('location: gamelobby.php?gameid='.$hash_id.'&creator='.$creator.'');
            }
        }
        else{
            echo "2";
        }
    }
}
else{
    echo "1";
}



//    if($add){
//        header('location: gamelobby.php?gameid='.$hash_id.'&creator='.$creator.'');
//    }
