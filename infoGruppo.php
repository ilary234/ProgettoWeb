<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = "Template/info-Gruppo.php";
    $templateParams["js"] = array("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js", "JS/infoGruppo.js");
    if(isset($_GET["nomeGruppo"]) && isset($_GET["admin"])) {
        $templateParams["nomeGruppo"] = $_GET["nomeGruppo"];
        $templateParams["admin"] = $_GET["admin"];
        $gruppo = $dbh->getGroupData($_GET["admin"], $_GET["nomeGruppo"]);
        $argomenti = $dbh->getTopics($_GET["admin"], $_GET["nomeGruppo"]);
        if (isUserLoggedIn()) {
            $iscritto = $dbh->getIscrizione($_SESSION["username"], $_GET["admin"], $_GET["nomeGruppo"]);
            $templateParams["iscritto"] = count($iscritto) > 0;
            $templateParams["username"] = $_SESSION["username"];
        }
    }
    require './Template/base.php';
?>