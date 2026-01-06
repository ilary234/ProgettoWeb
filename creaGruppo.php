<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = "Template/crea-Gruppo.php";
    $templateParams["js"] = array("JS/creaGruppo.js");

    if (isset($_POST['nomeGruppo']) && isset($_POST['luogo']) && isset($_POST['corso']) && isset($_POST['materia'])) {
        try {
            $result = $dbh->insertGruppo($_SESSION["username"], $_POST['nomeGruppo'], $_POST['luogo'], $_POST['corso'], $_POST['materia']);
            if ($result) {
                header("Location: modificaGruppo.php?nomeGruppo=" . $_POST['nomeGruppo'] . "&admin=" . $_SESSION["username"]);
            }
        } catch (\Throwable $e) {
            error_log('crea-gruppo exception: ' . $e->getMessage());
            $templateParams["createGruppoError"] = "Errore nella creazione: nome già in uso";
        }
    }
    require './Template/base.php';
?>