<?php
    session_start();
    require_once 'bootstrap.php';
    
    // Gestisci logout
    if(isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit();
    }
    
    // Gestisci registrazione
    if(isset($_POST['nome']) && isset($_POST['cognome']) && !isset($_GET['annuncio'])) {
        $username = $_POST['username'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'] ?? null;
        $corso = $_POST['corso'] ?? null;
        $anno = $_POST['anno'] ?? null;
        $result = $dbh->insertUtente($username, $nome, $cognome, $password, $email, $telefono, $corso, $anno);
        if($result === true) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $registerError = "Errore nella registrazione: " . $result;
        }
    }
    
    if(isset($_GET['annuncio'])) {
        $idAnnuncio = $_GET['annuncio'];
        
        // Gestisci aggiunta commento
        if(isset($_POST['commento']) && isset($_POST['username'])) {
            $username = $_POST['username'];
            $testo = $_POST['commento'];
            $dbh->insertCommento($idAnnuncio, $username, $testo);
            // Redirect per evitare re-submit
            header("Location: ?annuncio=$idAnnuncio");
            exit();
        }
        
        $annuncio = $dbh->getAnnuncioById($idAnnuncio);
        $commenti = $dbh->getCommentiByAnnuncio($idAnnuncio);
        $templateParams["nome"] = "Template/annuncioAperto.php";
        $templateParams["js"] = array();
    } elseif(isset($_GET['page']) && $_GET['page'] == 'login') {
        $templateParams["nome"] = "Template/login-form.php";
        $templateParams["js"] = array();
    } elseif(isset($_GET['page']) && $_GET['page'] == 'registrazione') {
        $corsi = $dbh->getCourses();
        $templateParams["nome"] = "Template/registrazione.php";
        $templateParams["js"] = array();
    } elseif(isset($_GET['page']) && $_GET['page'] == 'gruppi') {
        $templateParams["nome"] = "Template/gruppi.php";
        $templateParams["js"] = array("JS/gruppi.js");
    } elseif(isset($_GET['page']) && $_GET['page'] == 'annunci') {
        $templateParams["nome"] = "Template/annunci.php";
        $templateParams["js"] = array("JS/annunci.js");
    } else {
        // Default to annunci
        $templateParams["nome"] = "Template/gruppi.php";
        $templateParams["js"] = array("JS/gruppi.js");
    }
    
    require './Template/base.php';
?>