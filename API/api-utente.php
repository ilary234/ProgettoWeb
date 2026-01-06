<?php
    require_once '../bootstrap.php';

    $loggedUser = $_SESSION['username'] ?? null;
    $profileUser = $_GET['user'] ?? $loggedUser;

    if (!$profileUser) {
        http_response_code(401);
        echo json_encode(["error" => "Utente mancante"]);
        exit;
    }

    $user = $dbh->getUserByUsername($profileUser);
    $corso = "";
    
    if (!empty($user['CorsoLaurea'])) {
        $corso = $dbh->getCorsoLaureaById($user['CorsoLaurea']);
    }

    header("Content-Type: application/json");
    echo json_encode([
        "user" => $user,
        "corso" => $corso
    ]);

?>