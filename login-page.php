<?php
    session_start();
    if(isset($_SESSION['SESSION_USERNAME']) && isset($_SESSION['SESSION_ID'])){
        header('location: lobby/global-lobby.php');
    }
    else {
        if (isset($_SESSION['ERR_CONNECTION'])) {
            ?>
            <div class="navbar-fixed-top alert-container">
                <div class="error-dialogue-box fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>ERROR!</strong><br>
                    <p><?php echo $_SESSION['ERR_CONNECTION']; ?></p>
                </div>
            </div>
            <?php
        }
        if (isset($_SESSION['EMPTY_DETAILS'])) {
            ?>
            <div class="navbar-fixed-top alert-container">
                <div class="fade in error-dialogue-box">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>ERROR!</strong><br>
                    <p><?php echo $_SESSION['EMPTY_DETAILS']; ?></p>
                </div>
            </div>
            <?php
        }
        if(isset($_SESSION['NO_ACCOUNT'])){
            ?>
            <div class="navbar-fixed-top alert-container">
                <div class=" fade in error-dialogue-box">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>INVALID!</strong><br>
                    <p><?php echo $_SESSION['NO_ACCOUNT']; ?></p>
                </div>
            </div>
<?php
        }
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CIPHERAMA <?php echo date('Y') ?></title>
    <link rel="stylesheet" href="assets/custom-css/login-page.css" type="text/css">
    <link rel="stylesheet" href="assets/custom-css/3.4.1.bootstrap.min.css" type="text/css">
</head>
<body>
<div class="section-top">
    <div class="background-dimmer bubbles">
        <div class="content">
            <div class="col-md-12">
                <div class="col-md-7 logo-container">
                    <img src="assets/img/PUPLogo.png">
                    <div class="logo-brand col-md-12">
                        <span class="text">CIPHERAMA</span>
                        <span class="gradient"></span>
                        <span class="dodge"></span>
                    </div>
                    <div class="col-md-12">
                        <p class="sub-text">live with your secrets</p>
                    </div>
                    <div class="col-md-12">
                        <a href="index.php" class="btn-login">GO BACK</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-container col-md-12">
                        <div class="container login-box">
                            <form action="login.process.php" method="post" class="login-form">
                                <h3>Login Account </h3>
                                <div class="input-box">
                                    <input type="text" name="username" id="username" required autocomplete="off">
                                    <label for="username">Username</label>
                                </div>
                                <div class="input-box">
                                    <input type="password" name="password" id="password" required autocomplete="off">
                                    <label for="password">Password</label>
                                </div>
                                <p>Not a member yet? Create your account <a href="register-page.php">here</a>.</p>
                                <input type="submit" name="login" value="LOGIN" class="btn-login">
                            </form>
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
<script src="assets/js/jquery.2.2.1.min.js" rel="script" type="text/javascript"></script>
<script src="assets/js/bootstrap.3.2.0.min.js" rel="script" type="text/javascript"></script>
</body>
</html>
