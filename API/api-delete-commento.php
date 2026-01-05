<?php
require_once '../bootstrap.php';
    header("Content-Type: application/json");

    if (!isset($_SESSION['username'])) {
        echo json_encode(["success" => false, "message" => "Non autorizzato"]);
        exit;
    }

    if (!isset($_POST['idAnnuncio'], $_POST['username'], $_POST['data'], $_POST['ora'])) {
        echo json_encode(["success" => false, "message" => "Dati incompleti"]);
        exit;
    }

    $idAnnuncio = (int)$_POST['idAnnuncio'];
    $username   = $_POST['username'];
    $data       = $_POST['data'];
    $ora        = $_POST['ora'];

    if ($username !== $_SESSION['username']) {
        echo json_encode(["success" => false, "message" => "Permesso negato"]);
        exit;
    }

    $ok = $dbh->deleteCommento($idAnnuncio, $username, $data, $ora);

    echo json_encode(["success" => $ok]);
?>