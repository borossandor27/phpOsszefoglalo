<?php

if($login){
    switch ($menu) {
        case 'home':
        case null:
            require_once 'lista.php';
            break;
        case 'kilepes':
            require_once 'kilepes.php';
            break;
        default:
            require_once '404.php';
            break;
    }
} else {
    switch ($menu) {
        case 'home':
        case null:
            require_once 'lista.php';
            break;
        case 'regisztracio':
            require_once 'regisztracio.php';
            break;
        case 'bejelentkezes':
            require_once 'bejelentkezes.php';
            break;
        default:
            break;
    }
}
