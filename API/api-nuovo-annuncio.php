<?php
    require_once '../bootstrap.php';
    header("Content-Type: application/json");

    if (!isset($_SESSION['username'])) {
        http_response_code(401);
        echo json_encode([
            "success" => false,
            "message" => "Non autenticato"
        ]);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    $titolo = $data['titolo'] ?? '';
    $anteprima = $data['anteprima'] ?? '';
    $descrizione = $data['descrizione'] ?? '';
    $categoria = $data['categoria'] ?? '';
    $materia = $data['materia'] ?? '';
    $username = $_SESSION['username'];

    if (!$titolo || !$anteprima || !$descrizione || !$categoria || !$materia) {
        http_response_code(400);
        echo json_encode([
            "success" => false,
            "message" => "Tutti i campi sono obbligatori"
        ]);
        exit;
    }

    $success = $dbh->insertAnnuncio($username, $titolo, $anteprima, $descrizione, $categoria, $materia);

    if (!$success) {
        http_response_code(500);
        echo json_encode([
            "success" => false,
            "message" => "Errore nel salvataggio dell'annuncio"
        ]);
        exit;
    }

    echo json_encode(["success" => true]);
?>