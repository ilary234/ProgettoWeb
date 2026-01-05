<?php 
    require_once '../bootstrap.php';
    $success = false;
    $error = "";

    if (isset($_POST["nomeGruppo"]) && isset($_POST["admin"]) && isset($_POST["titolo"])) {
        try {
            $result = $dbh->insertArgomento($_POST["admin"], $_POST["nomeGruppo"], $_POST["titolo"]);
            if ($result) {
                $success = true;
            }
        } catch (\Throwable $e) {
            error_log('api-inserisci-incontro exception: ' . $e->getMessage());
            $error = "Errore nell'inserimento nel database";
        }
    }

    header("Content-Type: application/json");
    echo json_encode(["success" => $success, "error" => $error]);
?>