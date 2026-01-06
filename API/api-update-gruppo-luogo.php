<?php 
    require_once '../bootstrap.php';
    $success = false;
    $error = "";

    if (isset($_POST["nomeGruppo"]) && isset($_POST["admin"]) && isset($_POST["luogo"])) {
        try {
            $result = $dbh->updateGruppoLuogo($_POST["admin"], $_POST["nomeGruppo"], $_POST["luogo"]);
            if ($result) {
                $success = true;
            }
        } catch (\Throwable $e) {
            error_log('api-update-gruppo-percent exception: ' . $e->getMessage());
            $error = "Errore nell'aggiornamento";
        }
    }

    header("Content-Type: application/json");
    echo json_encode(["success" => $success, "error" => $error]);
?>