<?php 
    require_once '../bootstrap.php';
    $success = false;
    $error = "";

    if (isset($_POST["nomeGruppo"]) && isset($_POST["admin"])) {
        try {
            $result = $dbh->deleteIscrizione($_SESSION["username"], $_POST["admin"], $_POST["nomeGruppo"]);
            if ($result) {
                $success = true;
            }
        } catch (\Throwable $e) {
            error_log('api-disiscrizione-gruppo exception: ' . $e->getMessage());
            $error = "Errore nell'eliminazione dal database";
        }
    }

    header("Content-Type: application/json");
    echo json_encode(["success" => $success, "error" => $error]);
?>