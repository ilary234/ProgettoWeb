<?php 
    require_once '../bootstrap.php';
    $success = false;
    $error = "";

    if (isset($_POST["nomeGruppo"]) && isset($_POST["admin"]) && isset($_POST["titolo"]) && isset($_POST["svolto"])) {
        try {
            $svolto = 0;
            if ($_POST["svolto"] == "true") {
                $svolto = 1;
            }
            $result = $dbh->updateArgomento($_POST["admin"], $_POST["nomeGruppo"], $_POST["titolo"], $svolto);
            if ($result) {
                $success = true;
            }
        } catch (\Throwable $e) {
            error_log('api-update-argomento exception: ' . $e->getMessage());
            $error = "Errore nell'aggiornamento";
        }
    }

    header("Content-Type: application/json");
    echo json_encode(["success" => $success, "error" => $error]);
?>