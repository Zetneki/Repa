<?php 
/**
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 * ///////////////// SIGNUP FUNCTIONS ///////////////////////////////////////////////////////////////////////
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 */


 // ERROR KEZELES //

function emptyInputSignup($username, $email, $pwd, $pwdRepeat) {
    // Ha nem ir be semmit a user -> error
    if(empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)) $result = true;
    else $result = false;
    return $result;
}

function invalidUid($username) {
    /**
     *  Ha nem betu vagy szam az input -> error
     *  elfogatott -> a-z, A-Z, 0-9
     */ 
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) $result = true;
    else $result = false;
    return $result;
}

function invalidEmail($email) {
    // Ha nem email formatumu szoveg az input -> error
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $result = true;
    else $result = false;
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    // Ha nem egyeznek a jelszavak -> error
    if ($pwd !== $pwdRepeat) $result = true;
    else $result = false;
    return $result;
}

function uidExists($conn, $username) {
    // Ha mar van az adatbazisban a megadott username -> error
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emailExists($conn, $email) {
    // Ha mar van az adatbazisban a megadott email -> error
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function nicknameExists($conn, $id) {
    // Ha mar van az adatbazisban a megadott becenev -> error
    $sql = "SELECT * FROM users WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $pwd) {
    // User profil letrehozasa az adatbazisban, jelszo hasheles
    $sql = "INSERT INTO users (usersEmail, usersUid, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../registration.php?error=none");
    exit();
}

/**
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 * ///////////////// PROFILE FUNCTIONS //////////////////////////////////////////////////////////////////////
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 */

function changeNick($conn, $newNick) {
    // Becenev modositasa az adatbazisban
    session_start();
    $id = $_SESSION['userid'];
    $sql = "SELECT usersNickname
            FROM users WHERE
            usersId=$id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1){
        $sql_2 = "UPDATE users SET usersNickname='$newNick' WHERE usersId='$id'";
    }
    mysqli_query($conn, $sql_2);
    $_SESSION["usernick"] = nicknameExists($conn, $_SESSION["userid"])["usersNickname"];
    header("location: ../profile.php");
}

function changeTel($conn, $newTel) {
    // Telefonszam modositasa az adatbazisban
    if(is_numeric($newTel)){
        session_start();
        $id = $_SESSION['userid'];
        $sql = "SELECT usersTel
                FROM users WHERE
                usersId=$id";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            $sql_2 = "UPDATE users SET usersTel='$newTel' WHERE usersId='$id'";
        }
        mysqli_query($conn, $sql_2);
        $_SESSION["usertel"] = nicknameExists($conn, $_SESSION["userid"])["usersTel"];
        header("location: ../profile.php");
    } else {
        header("location: ../profile.php?error=wrongcharacters");
    }
}

function changePfp($conn, $newPfp) {
    // Profilkep file neve modositasa az adatbazisban
    session_start();
    $id = $_SESSION['userid'];
    $sql = "SELECT pfp
            FROM users WHERE
            usersId=$id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1){
        $sql_2 = "UPDATE users SET pfp='$newPfp' WHERE usersId='$id'";
    }
    mysqli_query($conn, $sql_2);
    $_SESSION["pfp"] = nicknameExists($conn, $_SESSION["userid"])["pfp"];
    header("location: ../profile.php");
    }

/**
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 * ///////////////// LOGIN FUNCTIONS ////////////////////////////////////////////////////////////////////////
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 */


// ERROR KEZELES
function emptyInputLogin($username, $pwd) {
    // Ha ures valamelyik input mezo -> error
    if(empty($username) || empty($pwd)) $result = true;
    else $result = false;
    return $result;
}

function loginUser($conn, $username, $pwd) {
    // Felhasznalo bejelentkeztetese
    $uidExists = uidExists($conn, $username);
    // Nem egyezik az adatbazisban semmivel -> error
    if ($uidExists === false) {
        header("location: ../login.php?error=wrongcredentials");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongcredentials");
    } else if ($checkPwd === true) {
        session_start();
        /** 
         * a uidExists function visszaadja az egesz sort az adatbazisban ezert
         * hasznalom ezt a session valtozok megadasara
         */
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["usernick"] = $uidExists["usersNickname"];
        $_SESSION["usertel"] = $uidExists["usersTel"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        $_SESSION["pfp"] = $uidExists["pfp"];
        $_SESSION["hasDiscountCode"] = $uidExists["hasDiscountCode"];
        $_SESSION["admin"] = $uidExists["admin"];
        header("location: ../../index.php");
        exit();
    }
}

/**
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 * ///////////////// DISCOUNT CODE //////////////////////////////////////////////////////////////////////////
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 */

 function changeDiscountStatus($conn, $newStatus) {
    /**
     * Ha van mar kuponkodja -> 1
     * Ha meg nincs kodja -> 0
     * a 2. parameter varja hogy mit tegyen az adatbazisba
     */
    session_start();
    $id = $_SESSION['userid'];
    $sql = "SELECT hasDiscountCode
            FROM users WHERE
            usersId=$id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1){
        $sql_2 = "UPDATE users SET hasDiscountCode ='$newStatus' WHERE usersId='$id'";
    }
    mysqli_query($conn, $sql_2);
    $_SESSION["hasDiscountCode"] = nicknameExists($conn, $_SESSION["userid"])["hasDiscountCode"];
    header("location: ../shopfront.php?success");
}

function addDiscountCode($conn, $code) {
    /**
     * Varja a kodot es beleteszi az adatbazisba egy uj kodkent hogy kesobb
     * fel lehessen hasznalni
     */
    $sql = "INSERT INTO `discount` (`code`) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../shopfront.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $code);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../shopfront.php?error=none");
    exit();
}

function random_digits($length) {
    /** 
     *  a parameterben megadott szam hosszu szamsorozatot ad vissza
     *  discount kod 16 hosszu
     */
    $result = '';

    for ($i = 0; $i < $length; $i++) {
        $result .= random_int(0, 9);
    }

    return $result;
}

/**
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 * ///////////////// BASKET FUNCTIONS ///////////////////////////////////////////////////////////////////////
 * //////////////////////////////////////////////////////////////////////////////////////////////////////////
 */

 function submitOrder($conn, $id, $row) {
    $sql = "INSERT INTO `orders` (userId, cardNumber, cardName, expMonth, expDay, cvv, totalPrice) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../basket.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $_SESSION['userid'], $_POST['cardNumber'], $_POST['cardName'], $_POST['expMonth'], $_POST['expDay'], $_POST['cvv'], $row['sum']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sumUpdateQuery = mysqli_query($conn, "UPDATE `users` SET `sum`=0 WHERE `usersId`='$id'");
    $delete_query = mysqli_query($conn, "DELETE FROM `basket` WHERE u_id='$id'");

    header("location: ../basket.php?error=successfulorder");
    exit();
 }