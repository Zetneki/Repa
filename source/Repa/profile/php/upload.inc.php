<?php 

require_once '../../_rootphp/dbh.inc.php';
require_once '../../_rootphp/functions.inc.php';


if (isset($_POST["uploadpfp"])){
    /**
     * profilkep feltoltese, eltarolasa
     * kep neve a users tablaban (pfp)
     * kepek eltarolva : /_rootprofpics
     * elfogadott kiterjesztesek: jpg, jpeg, png, pdf
     * max meret: 1MB
     */
    $pfp = $_FILES["file"];
    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];
    $fileError = $_FILES["file"]["error"];
    $fileType = $_FILES["file"]["type"];

    $tempExtention = explode('.', $fileName);
    $fileExtention = strtolower(end($tempExtention));

    $allowedExtentions = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($fileExtention, $allowedExtentions)) {
        if ($fileError === 0) {
            if ($fileSize < 1048576) {
                $fileNameNew = uniqid('', true).".".$fileExtention;
                $destinationFolderPath = "../../_rootprofpics/".$fileNameNew;
                move_uploaded_file($fileTmpName, $destinationFolderPath);
                $_SESSION["pfp"] = nicknameExists($conn, $_SESSION["userid"])["pfp"];
                changePfp($conn, $fileNameNew);
                header("location: ../profile.php?success");
            } else header("location: ../profile.php?error=wrongfilesize");
        } else header("location: ../profile.php?error=uploaderror");
    } else header("location: ../profile.php?error=wrongextention");
}