<?php
    require_once '../bootstrap.php';

    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data || !isset($data["id_annuncio"])) {
        http_response_code(400);
        echo json_encode([
            "success" => false,
            "message" => "ID mancante o JSON non valido"
        ]);
        exit;
    }

    $id = (int)$data["id_annuncio"];
    $titolo = $data["titolo"] ?? "";
    $anteprima = $data["anteprima"] ?? "";
    $descrizione = $data["descrizione"] ?? "";
    $categoria = $data["categoria"] ?? "";
    $materia = (int)($data["materia"] ?? 0);

    $ok = $dbh->updateAnnuncio($id, $titolo, $anteprima, $descrizione, $categoria, $materia);

    if (!$ok) {
        http_response_code(500);
        echo json_encode([
            "success" => false,
            "message" => "Errore aggiornamento DB"
        ]);
        exit;
    }

    echo json_encode(["success" => true]);
?>