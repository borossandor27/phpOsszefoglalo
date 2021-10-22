<?php
header('Content-type: text/html; charset=utf-8');
require_once './connect.php';
session_start();
$menu = filter_input(INPUT_GET, "menu", FILTER_SANITIZE_STRING);
$login = isset($_SESSION["login"])?$_SESSION["login"]:false;
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Pizza rendelés</title>
        <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css" />
        <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="php_osszefoglalo.css" />
    </head>
    <body>
        <div class="container">
        <header>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu=="home"?"active":""; ?>" href="index.php?menu=home">Kezdőlap</a>
                </li>

<?php
        if(!$login){
            ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu=="bejelentkezes"?"active":""; ?>" href="index.php?menu=bejelentkezes">Belépés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu=="regisztracio"?"active":""; ?>" href="index.php?menu=regisztracio">Regisztráció</a>
                </li>
                <?php
        } else {
        ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu=="kilepes"?"active":""; ?>" href="index.php?menu=kilepes">Kilépés</a>
                </li>
                <?php
        }
        ?>
                
              </ul>
        </header>
        <?php
            
        
        require_once './kontroller.php';
        ?>
        </div>
    </body>
</html>
