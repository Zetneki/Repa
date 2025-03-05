<?php
session_start();
/**
 * kommentek bekuldese a forum tablaba
 * 
 * ha van kepe -> megjelenik
 * ha nincs kepe -> default profilkep
 * mindig az adott idoben levo profilkep jelenik meg a komment mellett
 * 
 * ha van beceneve -> megjelenik
 * ha nincs beceneve -> felhasznalonev jelenik meg
 */
if (isset($_POST["submit"])) {
    require_once "../../_rootphp/dbh.inc.php";

    // ha van beceneve
    if (!empty($_SESSION['usernick'])) $name = $_SESSION['usernick'];
    else $name = $_SESSION['useruid'];
    $comment = $_POST["commentText"];
    $date = date("Y.m.d H:i"); // EV.HO.NAP ORA:PERC

    if (isset($_SESSION["userid"])) {
        if (strlen($comment) != 0) { 
            // ha nincs profilkepe
            if($_SESSION['pfp'] === "") $pfp = "defprof.jpg";
            else $pfp = $_SESSION['pfp']; // ha van profilkepe
            $query = "INSERT INTO forum VALUES('', '$name', '$comment', '$date', '$pfp')"; 
            mysqli_query($conn, $query);
            header("Location: ../forum.php");
        }
    } else {
        if (strlen($comment) != 0) {
            // ha nincs bejelentkezve
            $name = "Anonymous";
            $query = "INSERT INTO forum VALUES('', '$name', '$comment', '$date', 'defprof.jpg')"; 
            mysqli_query($conn, $query);
            header("Location: ../forum.php");
        }
    }
}