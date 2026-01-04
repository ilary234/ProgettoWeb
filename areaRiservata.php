<?php
    require_once 'bootstrap.php';

    if (!isUserLoggedIn()) {
        header("Location: login.php");
        exit;
    }
    $templateParams["nome"] = "Template/areaRiservata.php";
    $templateParams["js"] = array("JS/areaRiservata.js");

    require './Template/base.php';
?>