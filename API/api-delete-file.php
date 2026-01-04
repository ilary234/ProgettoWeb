<?php 
    require_once '../bootstrap.php';
    $success = false;
    $error = "";

    if (isset($_POST["nomeGruppo"]) && isset($_POST["admin"]) && isset($_POST["titolo"]) && isset($_POST["fileName"])) {
        try {
            $result = $dbh->deleteMaterial($_POST["admin"], $_POST["nomeGruppo"], $_POST["titolo"]);
            if ($result) {
                $success = true;
            }
            if (file_exists("../Upload/" . $_POST["fileName"])) {
                @unlink("../Upload/" . $_POST["fileName"]);
            }
        } catch (\Throwable $e) {
            error_log('api-delete-file exception: ' . $e->getMessage());
            $error = "Errore nell'eliminazione dal database";
        }
    }

    header("Content-Type: application/json");
    echo json_encode(["success" => $success, "error" => $error]);
?>