<?php 
    require_once '../bootstrap.php';
    $success = false;
    $error = "";
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["error"] == 0) {
            $dir = "../Upload/";
            $file = $dir . basename($_FILES["uploadFile"]["name"]);
            $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            $allowedTypes = array("jpg", "png", "pdf", "docx");
            if (!in_array($type, $allowedTypes)) {
                $error = "Formato non supportato. Sono supportati file jpg, png, pdf e docx";
            } else {
                $i = 1;
                while(file_exists($file)) {
                    $pathinfo = pathinfo($_FILES["uploadFile"]["name"]);
                    $base = $pathinfo["filename"];
                    $file = $dir . $base . "($i)." . $type;
                    $i++;
                }
                if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $file)) {
                    try {
                        $result = $dbh->insertMaterial($_POST["username"], $_POST["admin"], $_POST["nomeGruppo"], $_POST["titolo"], $type, $file);
                        if ($result) {
                            $success = true;
                        }
                    } catch (\Throwable $e) {
                        if (file_exists($file)) {
                            @unlink($file);
                        }
                        error_log('api-upload-file exception: ' . $e->getMessage());
                        $error = "Errore nell'inserimento nel database, controlla che il titolo sia valido (non puoi utilizzare lo stesso titolo più volte)";
                    }
                } else {
                    $error = "Errore nel caricamento del file";
                }
            }
        } else {
            $error = "Selezionare file";
        }
    }

    header("Content-Type: application/json");
    echo json_encode(["success" => $success, "error" => $error]);
?>