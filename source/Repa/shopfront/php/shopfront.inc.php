<?php
    session_start();
    require_once '../../_rootphp/dbh.inc.php';
    require_once '../../_rootphp/functions.inc.php';


//////////////////////////////////////////////////////////////////////////
//////////////////////////        QUIZ      //////////////////////////////
//////////////////////////////////////////////////////////////////////////
    if(isset($_POST["showGoodAlert"])) {
        /**
         * ez a jo valasz kezelese
         * js kod valtoztatja a submit name attributumat, ezzel van kezelve a jo es rossz valasz
         * 16 hosszu random szamu string, session valtozoval van megoldva az alert
         * ha a user mar egyszer hasznalta a quizt tobbet mar nem tudja (hasDiscountCode)
         */
        $number = random_digits(16);
        $_SESSION['number'] = $number;
        $_SESSION['showGoodAlert'] = true;


        addDiscountCode($conn, $number);
        changeDiscountStatus($conn, 1);
    }

    if(isset($_POST["showWrongAlert"])){
        /**
         * ez a rossz valasz kezelese
         * session valtozo az alerthez
         * itt nem kap a user kodot
         */
        $_SESSION['showWrongAlert'] = true;
        header("location: ../shopfront.php");
    }

    if(isset($_POST["alertClose"])) {
        // az alertek eltuntetese
        changeDiscountStatus($conn, 1);
        unset($_SESSION['showGoodAlert']);
        unset($_SESSION['showWrongAlert']);
    }


//////////////////////////////////////////////////////////////////////////
//////////////////////////        ORDER      /////////////////////////////
//////////////////////////////////////////////////////////////////////////

    if (isset($_POST["submit"]) && !isset($_SESSION["userid"])) {
        // ha nincs bejelentkezni ne tudjon rendelni
        header("location: ../../login/login.php");
            exit();
    }

    if (isset($_POST["submit"]) && isset($_SESSION["userid"])) {
        /**
         * Termek kosarba helyezese
         * qty(mennyiseg) - 1, ha nem ir be semmit
         * ha mar van a kosarba ilyen termek ugyanolyan usernek akkor hozzaadja a mennyiseghez
         */
        $uid = $_SESSION["userid"];
        $prid = $_POST["pr_id"];
        if (empty($_POST["amount"])) {
            $qty = 1;
        } else {
            $qty = $_POST["amount"];
        }

        $sql = mysqli_query($conn, "SELECT * FROM `basket` WHERE `pr_id`='$prid' AND `u_id`=$uid;");

        // ha meg nincs ilyen termek a user kosaraba
        if (mysqli_num_rows($sql) == 0) {
            $sql = "INSERT INTO `basket` (u_id, pr_id, qty) VALUES (?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../shopfront.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "sss", $uid, $prid, $qty);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: ../shopfront.php");
        } else {
            // ha mar van ilyen termek hozzaadva a kosarhoz
            $sql = "SELECT `pr_id` FROM `basket` WHERE `pr_id`='$prid' AND `u_id`='$uid'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $sql_2 = "UPDATE `basket` SET `qty`=`qty`+'$qty' WHERE `pr_id`='$prid' AND `u_id`='$uid'";
            }
            mysqli_query($conn, $sql_2);

            header("location: ../shopfront.php");
        }

        // kosar osszerteke frissitese es tarolasa a users tablaban (sum)
        $productsql = "SELECT * FROM `products` WHERE `id`='$prid'";
        $productresult = mysqli_query($conn, $productsql);
        
        $row = mysqli_fetch_assoc($productresult);
        $price = $row['price'];
        $productsql_2 = "UPDATE `users` SET `sum`=`sum`+'$qty'*'$price' WHERE `usersId`='$uid'";
    
        mysqli_query($conn, $productsql_2);
    }