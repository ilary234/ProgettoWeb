<?php
    require_once '../bootstrap.php';
    $success = false;
    $error = "";

    if (!isset($_SESSION["username"])) {
        $error = "Non autenticato";
    } elseif (isset($_POST["idAnnuncio"])) {
        $idAnnuncio = (int)$_POST["idAnnuncio"];
        try {
            $dbh->deleteCommentiByAnnuncio($idAnnuncio);
            $result = $dbh->deleteAnnuncio($idAnnuncio);
            if ($result) {
                $success = true;
            } else {
                $error = "Errore eliminazione annuncio";
            }

        } catch (Throwable $e) {
            error_log("api-delete-annuncio error: " . $e->getMessage());
            $error = "Errore nell'eliminazione dal database";
        }
    }

    header("Content-Type: application/json");
    echo json_encode([
        "success" => $success,
        "error" => $error
    ]);
?>