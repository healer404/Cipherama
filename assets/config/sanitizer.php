<?php
    function sanitize($variable){
        include ('config.php');
        $variable = mysqli_real_escape_string($myconn, stripcslashes($variable));
        $variable = trim($variable);
        return htmlentities($variable);
    }
