<?php
    require_once 'bootstrap.php';
    
    if(isset($_POST['username']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['password']) && isset($_POST['email'])) {
        $result = $dbh->insertUtente($_POST['username'], $_POST['nome'], $_POST['cognome'], $_POST['password'], $_POST['email']);
        if($result) {
            $user = $dbh->checkLogin($_POST["username"], $_POST["password"]);
            registerLoggedUser($user[0]);
            header("Location: index.php");
            exit();
        } else {
            $templateParams["registrationerror"] = "Errore nella registrazione: username già in uso." . $result;
        }
    }
    
    $templateParams["nome"] = "registrazione-form.php";
    
    require './Template/base.php';
?>