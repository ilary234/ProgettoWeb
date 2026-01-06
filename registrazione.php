<?php
    require_once 'bootstrap.php';
    
    if(isset($_POST['username']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['password']) && isset($_POST['email'])) {
        if (strlen($_POST['nome']) > 20) {
            $templateParams["registrationerror"] = "Il nome può contenere al massimo 20 caratteri.";
        } elseif (strlen($_POST['cognome']) > 20) {
            $templateParams["registrationerror"] = "Il cognome può contenere al massimo 20 caratteri.";
        } elseif (strlen($_POST['username']) > 20) {
            $templateParams["registrationerror"] = "L'username può contenere al massimo 20 caratteri.";
        } elseif (strlen($_POST['password']) > 50) {
            $templateParams["registrationerror"] = "La password può contenere al massimo 50 caratteri.";
        } elseif (strlen($_POST['email']) > 50) {
            $templateParams["registrationerror"] = "L'email può contenere al massimo 50 caratteri.";
        } elseif (empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
            $templateParams["registrationerror"] = "Tutti i campi sono obbligatori.";
        } else {
            $result_username = $dbh->checkUsername($_POST['username']);
            if(count($result_username) == 0) {
                $result = $dbh->insertUtente($_POST['username'], $_POST['nome'], $_POST['cognome'], $_POST['password'], $_POST['email']);
                $user = $dbh->checkLogin($_POST["username"], $_POST["password"]);
                registerLoggedUser($user[0]);
                header("Location: index.php");
                exit();
            } else {
                $templateParams["registrationerror"] = "Errore nella registrazione: username già in uso.";
            }
        }
    }
    
    $templateParams["nome"] = "registrazione-form.php";
    
    require './Template/base.php';
?>