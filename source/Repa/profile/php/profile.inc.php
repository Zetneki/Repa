<?php
    if(isset($_POST["saveName"])){
        // becenev beallitasa db-ben
        require_once '../../_rootphp/dbh.inc.php';
        require_once '../../_rootphp/functions.inc.php';

        $newNickname = $_POST["changeName"];

        changeNick($conn, $newNickname);
    }

    if(isset($_POST["saveTel"])){
        // telefonszam beallitasa db-ben
        require_once '../../_rootphp/dbh.inc.php';
        require_once '../../_rootphp/functions.inc.php';

        $newTel = $_POST["changeTel"];

        changeTel($conn, $newTel);
    }