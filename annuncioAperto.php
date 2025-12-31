<?php
    session_start();
    require_once 'bootstrap.php';
    
    if(isset($_GET['annuncio'])) {
        $idAnnuncio = $_GET['annuncio'];
        
        // Gestisci aggiunta commento
        if(isset($_POST['commento']) && isset($_POST['username'])) {
            $username = $_POST['username'];
            $testo = $_POST['commento'];
            $result = $dbh->insertCommento($idAnnuncio, $username, $testo);
            if($result === true) {
                // Redirect per evitare re-submit
                header("Location: annuncioAperto.php?annuncio=$idAnnuncio");
                exit();
            } else {
                $commentError = "Errore nell'aggiunta del commento: " . $result;
            }
        }
        
        $annuncio = $dbh->getAnnuncioById($idAnnuncio);
        $commenti = $dbh->getCommentiByAnnuncio($idAnnuncio);
        $templateParams["nome"] = "Template/annuncioAperto.php";
        $templateParams["js"] = array();
        require './Template/base.php';
    } else {
        header("Location: annunci.php");
        exit();
    }
?>