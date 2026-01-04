<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = "Template/carica-File.php";
    $templateParams["js"] = array("JS/caricaFile.js");
    if(isset($_GET["nomeGruppo"]) && isset($_GET["admin"]) ) {
        $templateParams["nomeGruppo"] = $_GET["nomeGruppo"];
        $templateParams["admin"] = $_GET["admin"];
        $templateParams["username"] = $_SESSION["username"];
    }
    require './Template/base.php';
?>