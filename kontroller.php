<?php

switch ($menu) {
    case 'home':
        require_once 'lista.php';
        break;
    case 'regisztracio':
        require_once 'regisztracio.php';
        break;
    case 'bejelentkezes':
        require_once 'bejelentkezes.php';
        break;
    case 'kilepes':
        require_once 'kilepes.php';
        break;
    default:
        require_once 'lista.php';
        break;
}
