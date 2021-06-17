<?php
    session_start();
    require './include.php';

    if (isset($_SESSION['user'])) {
        $controllerToLoad = "AdminController";
        $functionToCall = "home";
    } else {
        $controllerToLoad = "MotoController";
        $functionToCall = "homePage";
    }

    if(isset($_GET['controller'])) {
        $controllerToLoad = $_GET['controller'];
    }
    if(isset($_GET['action'])) {
        $functionToCall = $_GET['action'];
    }

    try {
        $controller = new $controllerToLoad();
        $controller->$functionToCall();
    } catch (Exception $error) {
        echo "Page introuvable: ".$error->getMessage();
    }

?>