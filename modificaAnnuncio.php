<?php
    require_once 'bootstrap.php';

    if (!isset($_GET["id"])) {
        die("ID annuncio mancante");
    }

    $templateParams["idAnnuncio"] = (int)$_GET["id"];
    $templateParams["nome"] = "Template/modificaAnnuncio.php";
    $templateParams["js"] = array("JS/modificaAnnuncio.js");

    require './Template/base.php';
?>
