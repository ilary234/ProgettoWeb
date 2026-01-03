<?php
    require_once '../bootstrap.php';
    $categorie = $dbh->getCategories();

    header("Content-Type: application/json");
    echo json_encode($categorie);
?>