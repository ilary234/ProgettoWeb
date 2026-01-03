<?php
    require_once '../bootstrap.php';
    header("Content-Type: application/json");

    if (!isset($_SESSION["username"])) {
        http_response_code(401);
        echo json_encode([
            "success" => false,
            "message" => "Devi effettuare il login per commentare"
        ]);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    if (
        empty($data["id_annuncio"]) ||
        empty($data["testo"])
    ) {
        http_response_code(400);
        echo json_encode([
            "success" => false,
            "message" => "Dati mancanti"
        ]);
        exit;
    }

    $ok = $dbh->insertCommento(
        $_SESSION["username"],
        $data["id_annuncio"],
        $data["testo"]
    );

    if (!$ok) {
        http_response_code(500);
        echo json_encode([
            "success" => false,
            "message" => "Errore inserimento commento"
        ]);
        exit;
    }

    echo json_encode(["success" => true]);
?>