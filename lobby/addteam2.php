<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/sanitizer.php';
$id = sanitize($_GET['gameid']);
$creator = sanitize($_GET['creator']);
$username = $_SESSION['SESSION_USERNAME'];

$team = "EARTH";
$_SESSION['SESSION_TEAM'] = $team;

$checknumteamplayers = mysqli_query($myconn, "SELECT COUNT(teamname) AS Counter FROM players WHERE hash_id='$id' AND teamname='$team'");
$count = mysqli_fetch_assoc($checknumteamplayers);
$showcount = $count['Counter'];

$checkmaxplayers = mysqli_query($myconn, "SELECT DISTINCT (maxplayers)FROM players WHERE hash_id='$id'");
if(mysqli_num_rows($checkmaxplayers) > 0){
    while($row = mysqli_fetch_array($checkmaxplayers)){
        $result = $row['maxplayers'];
    }
    echo 'RESULT: ' . $result;
    echo "<br> ". $showcount;

    if($showcount < $result){
        $chooseteam = mysqli_query($myconn, "UPDATE players SET teamname='$team' WHERE hash_id='$id' AND username='$username'");
        if($chooseteam){
            header('location: gamelobby.php?gameid='.$id.'&creator='.$creator.'');
        }
        unset($_SESSION['TEAM1_IS_OKAY']);
    }
    elseif ($showcount == $result){
        $_SESSION['TEAM_IS_OKAY'] = "OKAY";
    }
    else{
        $_SESSION['TEAM1_IS_FULL'] = "Team Earth is full";
        header('location: gamelobby.php?gameid='.$id.'&creator='.$creator.'');
    }
}
else{
    echo "Error";
}
