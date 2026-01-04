<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = "Template/materiale-Gruppo.php";
    $templateParams["js"] = array("JS/materialeGruppo.js");
    if(isset($_GET["nomeGruppo"]) && isset($_GET["admin"])) {
        $templateParams["nomeGruppo"] = $_GET["nomeGruppo"];
        $templateParams["admin"] = $_GET["admin"];
    }
    require './Template/base.php';
?>