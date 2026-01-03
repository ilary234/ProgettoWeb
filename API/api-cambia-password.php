<?php
    require_once '../bootstrap.php';
    header("Content-Type: application/json");

    if (!isset($_SESSION['username'])) {
        http_response_code(401);
        echo json_encode(["success" => false, "message" => "Non autenticato"]);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    $oldPassword = $data['oldPassword'] ?? '';
    $newPassword = $data['newPassword'] ?? '';
    $username = $_SESSION['username'];

    $user = $dbh->getUserByUsername($username);

    if (!$user || $user['Password'] !== $oldPassword) {
        http_response_code(400);
        echo json_encode([
            "success" => false,
            "message" => "Password attuale non corretta"
        ]);
        exit;
    }

    $success = $dbh->updatePassword($username, $newPassword);

    if (!$success) {
        http_response_code(500);
        echo json_encode([
            "success" => false,
            "message" => "Errore aggiornamento password"
        ]);
        exit;
    }

    echo json_encode(["success" => true]);
?>