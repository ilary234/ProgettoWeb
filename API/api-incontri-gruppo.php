<?php
    require_once '../bootstrap.php';

    header("Content-Type: application/json");

    $incontri = array();
    if(isset($_GET["nomeGruppo"]) && isset($_GET["admin"])) {
        $incontri = $dbh->getMeetings($_GET["admin"], $_GET["nomeGruppo"]);
    }

    echo json_encode($incontri);
?>