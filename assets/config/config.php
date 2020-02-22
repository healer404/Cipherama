<?php
    // PDO CONNECTION
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "cipherama";

    try{
        $pdoconn = new PDO('mysql:host='.$dbhost.";dbname=".$dbname,$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        exit("Error: " . $e->getMessage());
    }
    // END

    // MYSQLI CONNECTION
    $myconn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(mysqli_connect_errno()){
        echo "Error occured while establishing connection into the database." . mysqli_connect_error();
    }
// END
