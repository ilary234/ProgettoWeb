<?php
    require_once '../bootstrap.php';
    $materie = $dbh->getSubjects();

    header("Content-Type: application/json");
    echo json_encode($materie);
?>