<?php
    require_once 'bootstrap.php';
    
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $result = $dbh->checkLogin($_POST['username'], $_POST['password']);
        if(count($result) > 0) {
            registerLoggedUser($result[0]);
        } else {
            $templateParams["loginerror"] = "Username o password errati.";
        }
    }

    if(isUserLoggedIn()) {
        $templateParams["nome"] = "areaRiservata.php";
    }
    else {
        $templateParams["nome"] = "login-form.php";
    }
    
    require './Template/base.php';
?>