<?php 
    require_once '../bootstrap.php';
    $success = false;
    $error = "";

    if (isset($_POST["nomeGruppo"]) && isset($_POST["admin"]) && isset($_POST["dataIncontro"])) {
        try {
            $result = $dbh->deleteIncontro($_POST["dataIncontro"], $_POST["admin"], $_POST["nomeGruppo"]);
            if ($result) {
                $success = true;
            }
        } catch (\Throwable $e) {
            error_log('api-delete-incontro exception: ' . $e->getMessage());
            $error = "Errore nell'eliminazione dal database";
        }
    }

    header("Content-Type: application/json");
    echo json_encode(["success" => $success, "error" => $error]);
?>