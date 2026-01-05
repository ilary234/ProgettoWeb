<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = "Template/annunci.php";
    $templateParams["js"] = array("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js", "JS/annunci.js");

    require './Template/base.php';
?>