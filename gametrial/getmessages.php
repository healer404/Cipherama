<?php
include_once('phpgameassets/config/config.php');
session_start();
$team = $_SESSION['TEAMNAME'];
$role = $_SESSION['ROLE'];
$gameid = $_SESSION['gameid'];

if($role == 'general'){
    $sql = "SELECT * FROM chat_game WHERE teamname='$team' AND gameid='$gameid' ORDER BY id DESC LIMIT 10";
}elseif ($role == 'navigator' || $role == 'decoder'){
    $sql = "SELECT * FROM chat_game WHERE teamname='$team' AND gameid='$gameid' AND role IN('$role', 'general') ORDER BY id DESC LIMIT 10";
}
$res = mysqli_query($myconn, $sql);
$result = array();
$message = '';
foreach($res as $re){
    $message = $re['message'];
    if(strlen($re['message']) > 30){
        for($i = 30; $i <= 150 && $i < strlen($re['message']); $i+=30){
            $message = substr_replace($message, '<br>', $i, 0);
        }
    }
    array_push($result, array('username'=>$re['username'], 'message'=>$message, 'role'=>$re['role']));
}
echo json_encode(array_reverse($result));
