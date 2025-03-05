<?php 

session_start();
require_once '../../_rootphp/dbh.inc.php';
require_once '../../_rootphp/functions.inc.php';

//////////////////////////////////////////////////////////////////////////
//////////////////////////        ORDER      /////////////////////////////
//////////////////////////////////////////////////////////////////////////

    if (isset($_POST["merchSubmit"]) && !isset($_SESSION["userid"])) {
        // ha nincs bejelentkezni ne tudjon rendelni
        header("location: ../../login/login.php");
            exit();
    }

    if (isset($_POST["merchSubmit"]) && isset($_SESSION["userid"])) {
        /**
         * Termek kosarba helyezese
         * qty(mennyiseg) mindig 1
         * ha mar van a kosarba ilyen termek ugyanolyan usernek akkor hozzaadja a mennyiseghez
         */
        $uid = $_SESSION["userid"];
        $prid = $_POST["pr_id"];
        $qty = 1;

        $sql = mysqli_query($conn, "SELECT * FROM `basket` WHERE `pr_id`='$prid' AND `u_id`=$uid;");

        // ha meg nincs ilyen termek a user kosaraba
        if (mysqli_num_rows($sql) == 0) {
            $sql = "INSERT INTO `basket` (u_id, pr_id, qty) VALUES (?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../merch.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "sss", $uid, $prid, $qty);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: ../merch.php");
        } else {
            // ha mar van ilyen termek hozzaadva a kosarhoz
            $sql = "SELECT `pr_id` FROM `basket` WHERE `pr_id`='$prid' AND `u_id`='$uid'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $sql_2 = "UPDATE `basket` SET `qty`=`qty`+'$qty' WHERE `pr_id`='$prid' AND `u_id`='$uid'";
            }
            mysqli_query($conn, $sql_2);

            header("location: ../merch.php");
        }

        // kosar osszerteke frissitese es tarolasa a users tablaban (sum)
        $productsql = "SELECT * FROM `products` WHERE `id`='$prid'";
        $productresult = mysqli_query($conn, $productsql);
        
        $row = mysqli_fetch_assoc($productresult);
        $price = $row['price'];
        $productsql_2 = "UPDATE `users` SET `sum`=`sum`+'$qty'*'$price' WHERE `usersId`='$uid'";
    
        mysqli_query($conn, $productsql_2);
    }


