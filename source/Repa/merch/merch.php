<?php
    session_start();
    include '../_rootphp/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/shopfront.js"></script>
    <link rel="icon" href="../_rootimg/favicon.png">
    
    <!-- JAVASCRIPT LINKS -->
    <script src="../_rootjs/navbar.js"></script>

    <!--  CSS LINKS -->
    <link rel="stylesheet" href="../_rootcss/footer.css">
    <link rel="stylesheet" href="../_rootcss/root.css">
    <link rel="stylesheet" href="css/merch.css">
    <link rel="stylesheet" href="css/merchNav.css">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>repa | Repa kollekció</title>
</head>
<body>


    <!-- NAVBAR, SIDEBAR -->

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
                <a id="nav-logo" href="../index.php"><img src="../_rootimg/favicon2.png" alt="" id="logo-img">repa</a>
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

    <!-- BANNER -->
    
    <div class="banner">
        <img src="img/merchbanner.jpg" alt="">
    </div>

    <!-- PRODUCTS -->


    <main class="shop">
        <div class="container">
        <?php
            
            $sql = mysqli_query($conn, "SELECT * FROM `products` WHERE `type`='merch'");

            foreach ($sql as $product) {
                echo 
                '<form action="php/merch.inc.php" method="post" class="product-box">
                <input type="hidden" value='.$product['id'].' name="pr_id">
                <img src="../admin/img/'. $product['image'] .'" alt="">
                <div class="product-disc">
                    <div>
                        <h6>'. ucfirst(array_slice(explode(' ', $product['name']), -1)[0]) .'</h6>
                        <h4>'. $product['name'] .'</h4>
                        <h5>'. $product['price'] .'Ft</h5>
                    </div>
                    <div class="toCart">
                        <button type="submit" name="merchSubmit"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg></button>
                    </div>
                </div>
            </form>';
            }
            ?>
        </div>
    </main>
    
     <!-- FOOTER -->

     <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>repa</h3>
                <p>&copy; 2024 repa. Minden jog fenntartva.</p>
            </div>
            <div class="footer-section">
                <h3>Linkek</h3>
                <ul>
                    <li><a href="../_misc/ASZF/aszf.php">Adatvédelmi szabályzat</a></li>
                    <li><a href="../_misc/FF/ff.php">Felhasználási feltételek</a></li>
                    <li><a href="../_misc/MAINTENENCE/undermaintenence.php">Kapcsolat</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Kövess minket</h3>
                <ul>
                    <li><a href="../_misc/MAINTENENCE/undermaintenence.php">Facebook</a></li>
                    <li><a href="../_misc/MAINTENENCE/undermaintenence.php">Instagram</a></li>
                    <li><a href="../_misc/MAINTENENCE/undermaintenence.php">Twitter</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>