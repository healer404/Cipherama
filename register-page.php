<?php
    session_start();
    if(isset($_SESSION['SESSION_USERNAME']) && isset($_SESSION['SESSION_ID'])){
        header('location: lobby/global-lobby.php');
    }
    if(isset($_SESSION['SUCCESSFUL_REGISTRATION'])){
?>
        <div class="navbar-fixed-top alert-container">
            <div class="error-dialogue-box fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>NOTE!</strong><br>
                <p><?php echo $_SESSION['SUCCESSFUL_REGISTRATION']; ?></p>
            </div>
        </div>
<?php
    }
    if(isset($_SESSION['PASSWORD_NOT_MATCHED'])){
        ?>
        <div class="navbar-fixed-top alert-container">
            <div class="error-dialogue-box fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>ERROR!</strong><br>
                <p><?php echo $_SESSION['PASSWORD_NOT_MATCHED']; ?></p>
            </div>
        </div>
<?php
    }
    session_destroy();
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CIPHERAMA <?php echo date('Y') ?></title>
    <link rel="stylesheet" href="assets/custom-css/register-page.css" type="text/css">
    <link rel="stylesheet" href="assets/custom-css/3.4.1.bootstrap.min.css" type="text/css">
</head>
<body>
<div class="section-top">
    <div class="background-dimmer bubbles">
        <div class="col-md-12">
            <div class="container container-container col-md-7">
                <div class="carousel slide" data-ride="carousel" id="carousel-ex">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-ex" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-ex" data-slide-to="1"></li>
                        <li data-target="#carousel-ex" data-slide-to="2"></li>
                    </ol>
                    <div class=""></div>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="assets/img/3-slide.jpg" alt="image1">
                            <div class="carousel-caption">
                                <h2>This is the heading</h2>
                                <p>This is the paragraph</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/1-slide.jpg" alt="image2">
                            <div class="carousel-caption">
                                <h2>This is the heading</h2>
                                <p>This is the paragraph</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/3-slide.jpg" alt="image3">
                            <div class="carousel-caption">
                                <h2>This is the heading</h2>
                                <p>This is the paragraph</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="container-registration-form col-md-12">
                    <div class="col-md-12">
                        <header>
                            <img src="assets/img/PUPLogo.png" alt="Logo" class="logo-brand"><br>
                            <h3 class="logo-title text-center">CIPHERAMA</h3>
                        </header>
                    </div>
                    <div class="form-container col-md-12">
                        <div class="register-box">
                            <form action="save_register_process.php" method="post" class="register-form" name="form">
                                <h3>Register Account </h3>
                                <div class="input-box">
                                    <input type="text" name="username" id="username" required autocomplete="off">
                                    <label for="username">Username</label>
                                    <span id="usernameAvailability"></span><br><br>
                                </div>
                                <div class="input-box">
                                    <input type="password" name="password" id="password" required autocomplete="off">
                                    <label for="password">Password</label>
                                    <span id="passwordFormat"></span><br><br>
                                </div>
                                <div class="input-box">
                                    <input type="password" name="verify_password" id="verify_password" required autocomplete="off">
                                    <label for="verify_password">Verify Password</label>
                                </div>
                                <p>Already a member? Login in now <a href="login-page.php">here</a>.</p>
                                <p>Want to go back to homepage? Click <a href="index.php">here</a>.</p>
                                <input type="submit" name="register" value="REGISTER" class="btn-register">
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
<script rel="script" type="text/javascript">
    $(document).ready(function(){
        $('#usernameAvailability').load('register_checker.php').show();
        $('#username').keyup(function(){
            $.post('register_checker.php', {user_name:form.username.value},
                function (result) {
                    $('#usernameAvailability').html(result).show();
                });
        });
    });

    $(document).ready(function(){
        $('#passwordFormat').load('register_checker.php').show();
        $('#password').keyup(function(){
            $.post('register_checker.php', {password:form.password.value},
                function (result) {
                    $('#passwordFormat').html(result).show();
                });
        });
    });
</script>
</body>
</html>
