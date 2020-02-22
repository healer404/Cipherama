<?php
    session_start();
    if(!isset($_SESSION['SESSION_USERNAME']) || !isset($_SESSION['SESSION_ID'])){
        session_destroy();
        header('location: ../login-page.php');
    }
    include '../assets/config/config.php';
    include '../assets/config/sanitizer.php';
    $id = $_GET['gameid'];
    $creator = $_GET['creator'];
    $teams = array("TEAM 1", "TEAM 2", "TEAM 3", "TEAM 4");
    $teamlinks = array("addteam1.php", "addteam2.php", "addteam3.php", "addteam4.php");
    $teamname = array("1", "2", "3", "4");
    $username = $_SESSION['SESSION_USERNAME'];
    $checkhash_id = mysqli_query($myconn, "SELECT * FROM players WHERE hash_id = '$id'");
    if(mysqli_num_rows($checkhash_id) > 0){
        while($row1 = mysqli_fetch_array($checkhash_id)){
            $gameid = $row1['gameid'];
            $_SESSION['HASH_GAME_ID'] = $gameid;
        }

        $checknumteam = mysqli_query($myconn, "SELECT * FROM active_lobby WHERE gameid='$gameid'");
        if(mysqli_num_rows($checknumteam) > 0){
            while($row2 = mysqli_fetch_array($checknumteam)){
                $numteam = $row2['teams'];
                $_SESSION['NUMBER_OF_TEAMS'] = $numteam;
            }
        }
        else{
            echo "243";
        }
    }
    else{
        echo '1';
    }

    if(isset($_SESSION['TEAM1_IS_FULL'])){
?>
        <div class="navbar-fixed-top alert-container">
            <div class="error-dialogue-box fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>ERROR!</strong><br>
                <p><?php echo $_SESSION['TEAM1_IS_FULL']; ?></p>
            </div>
        </div>
<?php
    }
    $session_timer = $_SESSION['SESSION_TIMER'];
    if((time() - $session_timer) > 900){ // 900 = 15 * 60
        header('location: logout.php');
    }
    else{
        $_SESSION['SESSION_TIMER'] = time();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CIPHERAMA <?php echo date('Y') ?></title>
    <link rel="stylesheet" href="../assets/custom-css/login-page.css" type="text/css">
    <link rel="stylesheet" href="../assets/custom-css/3.4.1.bootstrap.min.css" type="text/css">
    <link type="shortcut icon" href="../assets/img/PUPLogo.png" rel="icon">
    <link rel="stylesheet" href="../assets/custom-css/global-lobby.css" type="text/css">
    <link rel="stylesheet" href="../assets/custom-css/navbar.css" type="text/css">
    <link rel="stylesheet" href="../assets/custom-css/game-lobby.css" type="text/css">
    <link rel="stylesheet" href="../assets/custom-css/css/bootstrap%203.4.0.min.css" type="text/css">
</head>
<body>
<div class="section-top">
    <div class="background-dimmer">
        <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header navbar-right margin-off">
                    <a href="#" class="navbar-brand"><?php echo $_SESSION['SESSION_USERNAME']; ?></a>
                </div>
                <a href="#" class="navbar-brand">CIPHERAMA</a>
            </div>
        </nav>
        <br><br><br>
        <div class="col-md-12 container">
        <?php
            if($_SESSION['NUMBER_OF_TEAMS'] == 4){
                include "new-lobby-4-teams.php";
            }
            else if($_SESSION['NUMBER_OF_TEAMS'] == 3){
                include "new-lobby-3-teams.php";
            }
            else if($_SESSION['NUMBER_OF_TEAMS'] == 2){
                include "new-lobby-2-teams.php";
            }
        ?>
            <div class="bubbles-dimmer">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.2.2.1.min.js" rel="script" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.3.2.0.min.js" rel="script" type="text/javascript"></script>
    <script src="../assets/js/insert.js" rel="script" type="text/javascript"></script>
    <script src="../assets/js/myjs.js" rel="script" type="text/javascript"></script>
    <script type="text/javascript">
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(0);
        };
    </script>
    <script rel="script" type="text/javascript">
        $(document).ready(function () {
            $('.toggle-modal').click(function () {
                $('#modalBtn').modal('toggle');
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#myBtn").click(function(){
                $("#myModal").modal();
            });
        });
    </script>
</body>
</html>
