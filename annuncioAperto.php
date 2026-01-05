<?php
    require_once 'bootstrap.php';

    $idAnnuncio = filter_input(INPUT_GET, 'annuncio', FILTER_VALIDATE_INT);

    if (!$idAnnuncio) {
        header("Location: annunci.php");
        exit;
    }

    $templateParams["nome"] = "Template/annuncioAperto.php";
    $templateParams["js"]   = array("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js", "JS/annuncioAperto.js");
    $templateParams["idAnnuncio"] = $idAnnuncio;

    require 'Template/base.php';
?>