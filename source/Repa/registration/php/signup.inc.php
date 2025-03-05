<?php

if (isset($_POST["submit"])) {
    /**
     * user regisztracio
     * errorkezelesek alerttel, ha minden megfelel letrehozza az adatbazisban
     * alapjaraton mindig default kepet es semmilyen becenevet,telefonszamot kap
     * profilban kell ezeket beallitani
     */
    $username = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once '../../_rootphp/dbh.inc.php';
    require_once '../../_rootphp/functions.inc.php';

    if (emptyInputSignup($username, $email, $pwd, $pwdRepeat) !== false){
        header("location: ../registration.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../registration.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../registration.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../registration.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username) !== false) {
        header("location: ../registration.php?error=usernametaken");
        exit();
    }
    if (emailExists($conn, $email) !== false) {
        header("location: ../registration.php?error=emailused");
        exit();
    }

    createUser($conn, $username, $email, $pwd);

} else {
    header("location: ../registration.php");
    exit();
}