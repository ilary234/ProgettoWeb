<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = "Template/infoGruppo.php";
    $templateParams["js"] = array("JS/infoGruppo.js");
    if(isset($_GET["nomeGruppo"]) && isset($_GET["admin"])) {
        $gruppo = $dbh->getGroupData($_GET["admin"], $_GET["nomeGruppo"]);
        $argomenti = $dbh->getTopics($_GET["admin"], $_GET["nomeGruppo"]);
        $templateParams["nomeGruppo"] = $_GET["nomeGruppo"];
        $templateParams["admin"] = $_GET["admin"];
    }
    require './Template/base.php';
?>