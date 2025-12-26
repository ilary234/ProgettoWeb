<?php
    require_once '../bootstrap.php';
    $gruppi = $dbh->getGroups();

    header("Content-Type: application/json");
    echo json_encode($gruppi);
?>