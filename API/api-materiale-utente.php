<?php
    require_once '../bootstrap.php';

    header("Content-Type: application/json");

    $materiale = array();
    if(isset($_SESSION["username"])) {
        $materiale = $dbh->getUserMaterial($_SESSION["username"]);
    }

    echo json_encode($materiale);
?>