<?php

if (isset($_POST["submit"])) {
    /**
     * user login
     * ha megegyeznek az adatok a db-ben beengedi a usert, sessiont hoz letre
     */
    $username = $_POST["name"];
    $pwd = $_POST["pwd"];

    require_once '../../_rootphp/dbh.inc.php';
    require_once '../../_rootphp/functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}

else {
    header("location: ../../index.php");
    exit();
}