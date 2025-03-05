<?php 

session_start();

if ($_SESSION["admin"] !== 1) {
    // ha nem admin nem latogathatja az oldalt
    header("location: ../index.php");
}

include "../_rootphp/dbh.inc.php";

    if (isset($_GET["delete"])) {
        /** 
         * termek torlese
         */
        $delete_id = $_GET["delete"];
        $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id");
        if ($delete_query) {
            header("location: admin.php?success=delete");
        } else {
            header("location: admin.php?error=delete");
        }
    }
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../_rootimg/favicon.png">
    <title>repa | ADMIN felület</title>
    <script src="../_rootjs/navbar.js"></script>
    <link rel="stylesheet" href="../_rootcss/root.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../_rootcss/nav.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php 
    /**
     * uzenetek megjelenitese get-bol
     */
    if(isset($_GET["error"])){
        if($_GET["error"] == 'add') {
            echo '<p class="errormessage">A termék hozzáadása sikertelen!</p>';
        } else if ($_GET["error"] == "edit") {
            echo '<p class="errormessage">A termék megváltoztatása sikertelen!</p>';
        } else if ($_GET["error"] == "delete") {
            echo '<p class="errorsmessage">A termék törlése sikertelen!</p>';
        }
    }

    if(isset($_GET['success'])){
        if($_GET['success'] == 'add') {
            echo '<p class="successmessage">Termék sikeresen hozzáadva</p>';
        } else if ($_GET["success"] == "edit") {
            echo '<p class="successmessage">Termék sikeresen megváltoztatva!</p>';
        } else if ($_GET["success"] == "delete") {
            echo '<p class="successmessage">Termék sikeresen törölve!</p>';
        } 
    }
    ?>

<nav>
        <ul class="sidebar">
            <li onclick="hideSidebar()"><a href="#" id="sidebar-close"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li><a href="../index.php"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="18"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>  
                Főoldal</a></li>
            <li><a href="../recipe/recipe.php"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z"/></svg>
                Receptek</a></li>
            <li><a href="../shopfront/shopfront.php"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M570-104q-23 23-57 23t-57-23L104-456q-11-11-17.5-26T80-514v-286q0-33 23.5-56.5T160-880h286q17 0 32 6.5t26 17.5l352 353q23 23 23 56.5T856-390L570-104Zm-57-56 286-286-353-354H160v286l353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5T260-640ZM160-800Z"/></svg>
                Répák</a></li>
            <li><a href="../forum/forum.php"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-240q-17 0-28.5-11.5T240-280v-80h520v-360h80q17 0 28.5 11.5T880-680v600L720-240H280ZM80-280v-560q0-17 11.5-28.5T120-880h520q17 0 28.5 11.5T680-840v360q0 17-11.5 28.5T640-440H240L80-280Zm520-240v-280H160v280h440Zm-440 0v-280 280Z"/></svg>
                Fórum</a></li>
                <?php
                if(isset($_SESSION["useruid"])){
                    if($_SESSION['pfp'] === "") $pfp = "defprof.jpg";
                    else $pfp = $_SESSION['pfp'];
                    echo '<li><a href="../basket/basket.php" id="sidebasket"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg>Kosár</a></li>';
                    echo '<li><a href="../profile/profile.php" id="sideprofile"><div class="pfpdiv"><img src="../_rootprofpics/'. $pfp .'" alt=""></div>Profil</a></li>';
                } else {
                    echo '<li><a href="../login/login.php"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg>Bejelentkezés</a></li>';
                }
            ?>
        </ul>
        <ul>
            <li>
                <a id="nav-logo" href="../index.php"><img src="../_rootimg/favicon2.png" alt="" id="logo-img">ADMIN</a>
            </li>
            <li><a href="../index.php" class="hideOnMobile"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="18"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>  
                Főoldal</a></li>
            <li><a href="../recipe/recipe.php" class="hideOnMobile"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z"/></svg>
                Receptek</a></li>
            <li><a href="../shopfront/shopfront.php" class="hideOnMobile"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M570-104q-23 23-57 23t-57-23L104-456q-11-11-17.5-26T80-514v-286q0-33 23.5-56.5T160-880h286q17 0 32 6.5t26 17.5l352 353q23 23 23 56.5T856-390L570-104Zm-57-56 286-286-353-354H160v286l353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5T260-640ZM160-800Z"/></svg>
                Répák</a></li>
            <li><a href="../forum/forum.php" class="hideOnMobile"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-240q-17 0-28.5-11.5T240-280v-80h520v-360h80q17 0 28.5 11.5T880-680v600L720-240H280ZM80-280v-560q0-17 11.5-28.5T120-880h520q17 0 28.5 11.5T680-840v360q0 17-11.5 28.5T640-440H240L80-280Zm520-240v-280H160v280h440Zm-440 0v-280 280Z"/></svg>
                Fórum</a></li>
                <?php
                if(isset($_SESSION["useruid"])){
                    if($_SESSION['pfp'] === "") $pfp = "defprof.jpg";
                    else $pfp = $_SESSION['pfp'];
                    echo '<li><a href="../basket/basket.php" class="hideOnMobile" id="basket"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg></a></li>';
                    echo '<li><a href="../profile/profile.php" class="hideOnMobile" id="profile"><div class="pfpdiv"><img src="../_rootprofpics/'. $pfp .'" alt=""></div></a></li>';                
                } else {
                    echo '<li><a href="../login/login.php" class="hideOnMobile"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg>Bejelentkezés</a></li>';
                }
            ?>
            <li class="menu-button" onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>
    </nav>

<div class="container">

    <div class="inner">

        <form action="php/admin.inc.php" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>ÚJ TERMÉK HOZZÁADÁSA</h3>
            <input type="text" name="p_name" placeholder="Termék neve" class="box" required>
            <input type="number" name="p_price" min="0" placeholder="Termék ára" class="box" required>
            <input type="file" name="p_image" accept="p_image/png, image/jpg, image/jpeg" class="box" required>
            <input type="submit" value="Répa hozzáadása" name="add_repa" class="addbtn">
            <input type="submit" value="Merchandise hozzáadása" name="add_merch" class="addbtn">
        </form>

    </div>
    <section class="products">
    <div class="display-product-table">
        <div class="repa">
            <h2 class="productType">Répák</h2>
        <?php
        // termekek kilistazasa
        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE `type`='repa'");
        if (mysqli_num_rows($select_products) > 0) {
            while($row = mysqli_fetch_assoc($select_products)) {
                echo '
                <div class="repaItem">
                <img src="img/'. $row['image'] .'" alt="">
                <h4>'. $row['name'] .'</h4>
                <h4>'. $row['price'] .'Ft/kg</h4>
                <div class="buttons">
                <a href="admin.php?delete=' .$row["id"]. '" class="delete-btn"><i class="fas fa-trash"></i></a>
                <a href="admin.php?edit=' .$row["id"]. '" class="option-btn"><i class="fas fa-edit"></i></a>
                </div>
            </div>';
            }
        }else{
            // ha nincs egy termek se
            echo"<div class='empty'>Nincs termék hozzáadva</div>";
        }
        
        ?>
            
        </div>

        <div class="merch">
        <h2 class="productType">Merchandise</h2>
        <?php
        // termekek kilistazasa
        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE `type`='merch'");
        if (mysqli_num_rows($select_products) > 0) {
            while($row = mysqli_fetch_assoc($select_products)) {
                echo '
                <div class="repaItem">
                <img src="img/'. $row['image'] .'" alt="">
                <h4>'. $row['name'] .'</h4>
                <h4>'. $row['price'] .'Ft</h4>
                <div class="buttons">
                <a href="admin.php?delete=' .$row["id"]. '" class="delete-btn"><i class="fas fa-trash"></i></a>
                <a href="admin.php?edit=' .$row["id"]. '" class="option-btn"><i class="fas fa-edit"></i></a>
                </div>
            </div>';
            }
        }else{
            // ha nincs egy termek se
            echo"<div class='empty'>Nincs termék hozzáadva</div>";
        }
        
        ?>
        </div>
        

    </div>
    </section>
   
    
    <div class="edit-form-container">

        <?php
        
        if (isset($_GET['edit'])) {
            // termek modositasa
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
            if (mysqli_num_rows($edit_query) > 0) {
                while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
            
        ?>

        <form action="php/admin.inc.php" method="post" enctype="multipart/form-data">
            <img src="img/<?php echo $fetch_edit['image']; ?>" alt="">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
            <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
            <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
            <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
            <input type="submit" value="mentés" name="update_product" class="addbtn">
            <input type="reset" value="mégsem" id="close-edit" class="addbtn">
        </form>
        
        <?php
                }
            }
            echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
        }
        ?>

    </div>

</div>


<script src="js/admin.js"></script>

</body>
</html>