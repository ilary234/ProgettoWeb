<?php
    require_once '../bootstrap.php';
    header("Content-Type: application/json");

    if (!isset($_GET['annuncio']) || !is_numeric($_GET['annuncio'])) {
        echo json_encode([
            "success" => false,
            "message" => "ID annuncio mancante o non valido"
        ]);
        exit;
    }

    $idAnnuncio = (int) $_GET['annuncio'];

    $annuncio = $dbh->getAnnuncioById($idAnnuncio);
    echo json_encode($annuncio);
?>