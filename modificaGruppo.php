<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = "Template/modifica-Gruppo.php";
    $templateParams["js"] = array("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js", "JS/modificaGruppo.js");
    if(isset($_GET["nomeGruppo"]) && isset($_GET["admin"])) {
        $gruppo = $dbh->getGroupData($_GET["admin"], $_GET["nomeGruppo"]);
        $argomenti = $dbh->getTopics($_GET["admin"], $_GET["nomeGruppo"]);
    }
    require './Template/base.php';
?>