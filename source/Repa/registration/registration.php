<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>repa | Regisztráció</title>
    <link rel="icon" href="../_rootimg/favicon.png" class="ikon">

    <!-- CSS -->
    <link rel="stylesheet" href="../_rootcss/root.css">
    <link rel="stylesheet" href="css/registration.css">
    

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">


</head>
<body>
    <form method="POST" action="php/signup.inc.php">
        <div id="head">
            <img src="img/image.png" alt="repa" width="90" class="ikon" style="float: right">
            <h1 id="cim">repa</h1>
        </div>
        <div id="mid-section">
            <?php
            // errorkezeles, alertek
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput") {
                    echo '<p class="errormessage">Tölts ki minden mezőt!</p>';
                } else if ($_GET["error"] == "invaliduid") {
                    echo '<p class="errormessage">Adj meg egy rendes felhasználónevet!</p>';
                } else if ($_GET["error"] == "invalidemail") {
                    echo '<p class="errormessage">Adj meg egy rendes email címet!</p>';
                } else if ($_GET["error"] == "passwordsdontmatch") {
                    echo '<p class="errormessage">A két jelszó nem egyezik!</p>';
                } else if ($_GET["error"] == "usernametaken") {
                    echo '<p class="errormessage">A felhasználónév már foglalt!</p>';
                } else if ($_GET["error"] == "stmtfailed") {
                    echo '<p class="errormessage">Váratlan hiba! Próbáld újra később!</p>';
                } else if ($_GET["error"] == "emailused") {
                    echo '<p class="errormessage">Ez az email cím már használatban van!</p>';
                } else if ($_GET["error"] == "none") {
                    echo '<p class="successmessage">
                        A regisztráció sikeres!
                        <a href="../login/login.php">Bejelentkezés</a>
                    </p>';
                } 
            }
            ?>
            <label for="input-email" id="e-mail">E-Mail</label>
            <input id="input-email" type="email" class="brackets" name="email">
        
            <label for="input-name" class="name-password">Felhasználónév</label>
            <input id="input-name" type="text" class="brackets" name="name">
        
            <label for="input-password" class="name-password">Jelszó</label>
            <input id="input-password" type="password" class="brackets" name="pwd">
        
            <label for="last-bracket" class="name-password">Jelszó megerősítés</label>
            <input id="last-bracket" type="password" name="pwdrepeat">
        </div>
        <div id="regplace">
            <input type="submit" value="Regisztráció" id="registration" name="submit">
        </div>
        <div id="log">
            <a href="../login/login.php" id="log-style"><p>Már van fiókja?</p></a>
        </div>
        
    </form>
</body>
</html>