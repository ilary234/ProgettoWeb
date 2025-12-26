<?php
    require_once '../bootstrap.php';
    $corsi = $dbh->getCourses();

    header("Content-Type: application/json");
    echo json_encode($corsi);
?>