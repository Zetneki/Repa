<?php

session_start();
include "../../_rootphp/dbh.inc.php";
include "../../_rootphp/functions.inc.php";

if (isset($_POST["add_repa"])) {
    /** 
     * repa hozzaadasa
     */
    $p_name = $_POST["p_name"];
    $p_price = $_POST["p_price"];
    $p_image = $_FILES["p_image"]["name"];
    $p_image_tmp_name = $_FILES["p_image"]["tmp_name"];
    $p_image_folder = "../img/".$p_image;

    $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, type) VALUES('$p_name', '$p_price', '$p_image', 'repa')");

    if ($insert_query) {
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        header("Location: ../admin.php?success=add");
        exit();
    } else {
        header("Location: ../admin.php?error=add");
        exit();
    }
}

if (isset($_POST["add_merch"])) {
    /** 
     * merch hozzaadasa
     */
    $p_name = $_POST["p_name"];
    $p_price = $_POST["p_price"];
    $p_image = $_FILES["p_image"]["name"];
    $p_image_tmp_name = $_FILES["p_image"]["tmp_name"];
    $p_image_folder = "../img/".$p_image;

    $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, type) VALUES('$p_name', '$p_price', '$p_image', 'merch')");

    if ($insert_query) {
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        header("Location: ../admin.php?success=add");
        exit();
    } else {
        header("Location: ../admin.php?error=add");
        exit();
    }
}

if (isset($_POST["update_product"])) {
    /**
     * termekek megvaltoztatasa
     */
    $update_p_id = $_POST["update_p_id"];
    $update_p_name = $_POST["update_p_name"];
    $update_p_price = $_POST["update_p_price"];
    $update_p_image = $_FILES["update_p_image"]["name"];
    $update_p_image_tmp_name = $_FILES["update_p_image"]["tmp_name"];
    $update_p_image_folder= "../img/".$update_p_image;

    $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

    if ($update_query) {
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        header("Location: ../admin.php?success=edit");
        exit();
    } else {
        header("Location: ../admin.php?error=edit");
        exit();
    }
}