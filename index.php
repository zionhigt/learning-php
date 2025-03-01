<?php

require './logger/index.php';
require './mock/data.php';
require './layout/header.php';

$uri = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : $_SERVER["SCRIPT_NAME"];
switch ($uri) {
    case "/index.php":
    case "/books":
        require "./pages/books.php";
        break;
    case "/login.php":
    case "/login":
        require "./pages/login.php";
        break;
    case "/add.php":
    case "/add":
        require "./pages/add.php";
        break;
    default:
        require "./404.php";
}

require './layout/footer.php';
