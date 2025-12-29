<?php
    require_once '../bootstrap.php';
    $annunci = $dbh->getAnnunci();

    header("Content-Type: application/json");
    echo json_encode($annunci);
?>