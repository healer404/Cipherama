<?php
    session_start();
    if(!isset($_SESSION['SESSION_USERNAME']) || !isset($_SESSION['SESSION_ID'])){
        session_destroy();
        header('location: ../login-page.php');
    }
    $gameid = rand();
    $_SESSION['GAMEID'] = $gameid;

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
    <link rel="stylesheet" href="../assets/custom-css/navbar.css" type="text/css">
    <link rel="stylesheet" href="../assets/custom-css/global-lobby.css" type="text/css">
</head>
<body>
<div class="section-top">
    <div class="background-dimmer">
        <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header navbar-right">
                    <button class="menu-container toggle-modal">
                        <div class="menu-bar-dash-1"></div>
                        <div class="menu-bar-dash-2"></div>
                        <div class="menu-bar-dash-3"></div>
                    </button>
                </div>
                <a href="#" class="navbar-brand">CIPHERAMA</a>
            </div>
        </nav>
        <br><br><br>
        <div class="col-md-12">
            <div class="col-md-7 margin-off">
                <div class="col-md-12 margin-off container-container">
                    <div class="carousel slide" data-ride="carousel" id="carousel-ex">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-ex" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-ex" data-slide-to="1"></li>
                            <li data-target="#carousel-ex" data-slide-to="2"></li>
                        </ol>
                        <div class=""></div>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="../assets/img/3-slide.jpg" alt="image1">
                                <div class="carousel-caption">
                                    <h2>This is the heading</h2>
                                    <p>This is the paragraph</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="../assets/img/1-slide.jpg" alt="image2">
                                <div class="carousel-caption">
                                    <h2>This is the heading</h2>
                                    <p>This is the paragraph</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="../assets/img/3-slide.jpg" alt="image3">
                                <div class="carousel-caption">
                                    <h2>This is the heading</h2>
                                    <p>This is the paragraph</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="col-md-12 container-fluid margin-off container-sidebar">
                    <div class="col-md-4 margin-off">
                        <div class="col-md-12 sidebar-box">
                            <div class="col-md-12 margin-off sidebar-header">
                                <div class="col-md-12 margin-off">
                                    <header class="text-monospace"><p class="sidebar-header-text">Game Lobbies</p></header>
                                </div>
                            </div>
                            <div class="col-md-12 margin-off">
                                <div class="active-lobby-list col-md-12 margin-off">
                                    <active-lobby>
                                    </active-lobby>
                                </div>
                                <div class="col-md-12 margin-off btn-create-lobby">
                                    <button type="button" id="myBtn" class="btn-add-lobby">CREATE</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 sidebar-box sidebar-margin-top">
                            <div class="col-md-12 margin-off sidebar-header">
                                <div class="col-md-12 margin-off">
                                    <header class="text-monospace"><p class="sidebar-header-text">Active Players</p></header>
                                </div>
                            </div>
                            <div class="col-md-12 margin-off">
                                <div class="active-player-list margin-off">
                                    <active-players>
                                    </active-players>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 margin-less">
                        <div class="col-md-12 sidebar-chat-container margin-off">
                            <div class="col-md-12 margin-off sidebar-header">
                                <header class="text-monospace"><p class="sidebar-header-text">Chats</p></header>
                            </div>
                            <div class="col-md-12 margin-off">
                                <div class="player-messages margin-off">
                                    <div class="chat">
                                        <live-chat>
                                        </live-chat>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 margin-off">
                                <div class="col-md-12 sidebar-box-chats-messaging margin-off">
                                    <header class="text-monospace sidebar-header"><p class="sidebar-header-text">Send Chat</p></header>
                                </div>
                                <div class="col-md-12 margin-off">
                                    <div class="col-md-12 margin-off send-message-container">
                                        <form id="myForm" action="sendmessage.php" method="post" class="col-md-12 margin-off">
                                            <div class="col-md-8">
                                                <input type="text" name="message" id="message" class="message-box" maxlength="60" autocomplete="off">
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-primary btn-send" id="sub">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


<div id="modalBtn" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content error-dialogue-box">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="modal-title">Account Details</h1>
            </div>
            <div class="modal-body">
                <tr>
                    <td><h4>Username: </td>
                    <td><?php echo $_SESSION['SESSION_USERNAME']; ?></h4></td>
                </tr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">BACK</button>
                <a href="logout.php"><button type="button" class="btn btn-primary">LOGOUT</button></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content dialog-box-add-lobby">
            <div class="modal-body">
                <h4 class="modal-title"><?php echo "<p class='text-danger'>GAME ID:     " .$_SESSION['GAMEID']. "</p>"; ?></h4>
                    <form action="addlobbypro.php" method="post" class="add-lobby-form">
                        <div class="col-md-12 addlobbyform margin-off">
                            <div class="col-md-6 addlobbyinput">
                                <br><br>
                                <label for="numteams">Number of Teams</label>
                                <input type="number" id="numteams" name="numteams" class="form-control" min="2" max="4">
                                <label for="numplayers">Number of Players</label>
                                <input type="number" id="numplayers" name="numplayers" class="form-control" min="4" max="9">
                                <div class="col-md-12">
                                    <div class="col-md-6 margin-off">
                                        <br>
                                        <input type="submit" name="addlobby" value="CREATE LOBBY" class="btn btn-primary">
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                        <button type="button" data-dismiss="modal" class="btn cancel-btn">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mapcontainer">
                                <br><br>
                                <img src="../assets/img/map.png" class="maplobby" alt="Photo Map">
                            </div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer margin-off">
                &nbsp;
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/jquery.2.2.1.min.js" rel="script" type="text/javascript"></script>
<script src="../assets/js/bootstrap.3.2.0.min.js" rel="script" type="text/javascript"></script>
<script src="../assets/js/insert.js" rel="script" type="text/javascript"></script>
<script src="../assets/js/myjs.js" rel="script" type="text/javascript"></script>
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
