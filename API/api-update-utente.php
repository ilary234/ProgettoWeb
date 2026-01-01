<?php
    require_once '../bootstrap.php';
    header("Content-Type: application/json");

    if (!isset($_SESSION['username'])) {
        http_response_code(401);
        echo json_encode(["success" => false, "message" => "Non autenticato"]);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    $username = $_SESSION['username'];

    $success = $dbh->updateUserProfile(
        $data['nome'],
        $data['cognome'],
        $data['email'],
        $data['telefono'] !== "" ? $data['telefono'] : null,
        $data['anno'] !== "" ? $data['anno'] : null,
        $data['id_corso'] !== "" ? $data['id_corso'] : null,
        $username
    );

    if (!$success) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Errore aggiornamento DB"]);
        exit;
    }

    $_SESSION['nome'] = $data['nome'];
    $_SESSION['cognome'] = $data['cognome'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['telefono'] = $data['telefono'];
    $_SESSION['anno'] = $data['anno'];
    $_SESSION['corsoLaurea'] = $data['id_corso'];

    echo json_encode(["success" => true]);
?>
