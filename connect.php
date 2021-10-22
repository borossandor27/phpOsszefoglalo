<?php

$conn = new mysqli('localhost','root','','pizzashop');
if($conn->errno > 0){
    die('Az adatbázis nem elérhető!');
} 
$conn->set_charset("utf8"); //-- lekerdezés adatai is utf8 kó
