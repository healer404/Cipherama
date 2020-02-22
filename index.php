<?php
session_start();
if(isset($_SESSION['SESSION_USERNAME'])){
    header('location: lobby/global-lobby.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CIPHERAMA <?php echo date('Y') ?></title>
    <link rel="stylesheet" href="assets/custom-css/index.css" type="text/css">
    <link rel="stylesheet" href="assets/custom-css/css/iranian-hacker.css" type="text/css">
    <link rel="shortcut icon" href="assets/img/PUPLogo.png" type="text/css">
</head>
<body>
<div id="container">
    <div><br><br><br><br><br><br><br>
        <div class="img">
            <img src="assets/img/PUPLogo.png">
        </div>
        <h1 id="h1" class="cipherama-logo">CIPHERAMA</h1>
        <br>
        <h2 id="h2">live with your secrets</h2>
        <br><br><br><br><br>
        <h3 class="btn-custom">&nbsp;<a href="login-page.php" >PLAY</a>  </h3>
    </div>
</div>
<canvas id="canvas"></canvas>
<script src="assets/lib/iranian_hacker/iranian_hacker_homepage.js" rel="script" type="text/javascript"></script>
</body>
</html>