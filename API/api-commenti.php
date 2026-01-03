<?php
    require_once '../bootstrap.php';
    header("Content-Type: application/json");

    $id = $_GET["id"] ?? null;
    $commenti = $dbh->getCommentiByAnnuncio($id);

    echo json_encode($commenti);
?>