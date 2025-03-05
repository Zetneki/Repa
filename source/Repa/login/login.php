<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>repa | Bejelentkezés</title>
    <link rel="icon" href="../_rootimg/favicon.png" class="ikon">

    <!-- CSS -->
    <link rel="stylesheet" href="../_rootcss/root.css">
    <link rel="stylesheet" href="css/login.css">
    
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <form method="POST" action="php/login.inc.php">
        <div id="head">
            <img src="img/image.png" alt="repa" width="90" class="ikon" style="float: right">
            <h1 id="cim">repa</h1>
        </div>
        <?php
        // errorkezeles
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput") {
                echo '<p class="errormessage">Tölts ki minden mezőt!</p>';
            } else if ($_GET["error"] == "wrongcredentials") {
                echo '<p class="errormessage">Felhasználónév vagy jelszó helytelen!</p>';
            }
        }
        ?>
        <div id="mid-section">
            <label class="name-pword" for="input-name">Felhasználónév</label>
            <input id="input-name" type="text" class="brackets" name="name">
        
            <label class="name-pword" for="input-password">Jelszó</label>
            <input id="input-password" type="password" class="brackets" name="pwd">
        </div>

        <div id="logplace">
            <input type="submit" value="Bejelentkezés" id="login" name="submit">
        </div>
        <div id="log">
            <a href="../registration/registration.php" id="log-style"><p>Még nincs fiókja?</p></a>
        </div>

    </form>
</body>
</html>