<?php 
    require_once '../bootstrap.php';
    $success = false;
    $error = "";

    if (isset($_POST["nomeGruppo"]) && isset($_POST["admin"]) && isset($_POST["percentuale"])) {
        try {
            $result = $dbh->updateGruppoPercent($_POST["admin"], $_POST["nomeGruppo"], $_POST["percentuale"]);
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