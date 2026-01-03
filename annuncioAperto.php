<?php
    require_once 'bootstrap.php';

    $idAnnuncio = filter_input(INPUT_GET, 'annuncio', FILTER_VALIDATE_INT);

    if (!$idAnnuncio) {
        header("Location: annunci.php");
        exit;
    }

    $templateParams["nome"] = "Template/annuncioAperto.php";
    $templateParams["js"]   = ["JS/annuncioAperto.js"];
    $templateParams["idAnnuncio"] = $idAnnuncio;

    require 'Template/base.php';
?>