<?php
    require_once '../bootstrap.php';


    if (!isset($_SESSION['username'])) {
        http_response_code(401);
        echo json_encode(["error" => "Non autenticato"]);
        exit;
    }

    $user = $dbh->getUserByUsername($_SESSION['username']);
    
    if (!empty($user['CorsoLaurea'])) {
        $corso = $dbh->getCorsoLaureaById($user['CorsoLaurea']);
    }

    header("Content-Type: application/json");
    echo json_encode([
        "user" => $user,
        "corso" => $corso
    ]);

?>