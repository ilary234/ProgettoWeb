<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = "Template/materiale-Gruppo.php";
    $templateParams["js"] = array("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js", "JS/materialeGruppo.js");
    if(isset($_GET["nomeGruppo"]) && isset($_GET["admin"])) {
        $templateParams["nomeGruppo"] = $_GET["nomeGruppo"];
        $templateParams["admin"] = $_GET["admin"];
    }
    require './Template/base.php';
?>