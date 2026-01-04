<?php
    require_once '../bootstrap.php';

    header("Content-Type: application/json");

    $materiale = array();
    if(isset($_GET["nomeGruppo"]) && isset($_GET["admin"])) {
        $materiale = $dbh->getGroupMaterial($_GET["admin"], $_GET["nomeGruppo"]);
    }

    echo json_encode($materiale);
?>