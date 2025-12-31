<?php
    session_start();
    require_once 'bootstrap.php';
    
    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    
    $username = $_SESSION['username'];
    $user = $dbh->getUserByUsername($username);
    
    $templateParams["nome"] = "Template/areaRiservata.php";
    $templateParams["js"] = array();
    require './Template/base.php';
?>