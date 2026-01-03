<?php 
    function isUserLoggedIn(){
        return !empty($_SESSION['username']);
    }

    function registerLoggedUser($user) {
        $_SESSION["username"] = $user["Username"];
        $_SESSION["nome"] = $user["Nome"];
        $_SESSION["cognome"] = $user["Cognome"];
        $_SESSION["email"] = $user["Email"];
        $_SESSION["telefono"] = $user["Telefono"];
        $_SESSION["corso"] = $user["CorsoLaurea"];
        $_SESSION["anno"] = $user["Anno"];
    }
?>