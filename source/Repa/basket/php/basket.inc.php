<?php
session_start();
require_once "../../_rootphp/dbh.inc.php";
require_once "../../_rootphp/functions.inc.php";
if(isset($_POST['submitOrder'])) {
    /**
     * rendeles bekuldese az adatbazisba
     * ha 0ft a rendeles akkor nem kuldi be, csak visszairanyit a basket.php-ra
     * users tablaba nullazza a kosar osszeget (sum)
     */
    
    $id = $_SESSION["userid"];
    $sql = "SELECT * FROM `users` WHERE `usersId`='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['sum'] == 0) {
        // 0ft-os rendeles kezelese
        header("location: ../basket.php?error=noiteminbasket");
        exit();
    }

    // rendeles bekuldese az orders tablaba
    submitOrder($conn, $id, $row);
}

if(isset($_POST['deleteProduct'])) {
    // adott termek torlese a kosarbol
    $basketEntryId = $_POST['entryId'];
    $id = $_SESSION["userid"];
    $basketEntryTotalPrice = $_POST['entryQty'] * $_POST['entryPrice'];
    $sumUpdateQuery = mysqli_query($conn, "UPDATE `users` SET `sum`=`sum`-'$basketEntryTotalPrice' WHERE `usersId`='$id'");
    $delete_query = mysqli_query($conn, "DELETE FROM `basket` WHERE id='$basketEntryId'");
    header("location: ../basket.php");
}

if(isset($_POST['discountSubmit'])) {
    $id = $_SESSION["userid"];
    $code = $_POST['discountCodeText'];
    $sql = "SELECT * FROM `discount` WHERE `code`='$code'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row == 0) {
        // ha nincs ilyen kod
        header("location: ../basket.php?error=invalidcode");
        exit();
    } else {
        $insert_query = mysqli_query($conn, "INSERT INTO `basket` (u_id, pr_id, qty) VALUES ($id, 143, 1);");
        $delete_query = mysqli_query($conn, "DELETE FROM `discount` WHERE `code`='$code'");
        header("location: ../basket.php?error=successfulcode");
        exit();
    }
}