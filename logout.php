<?php
    session_start();
    session_destroy();
    header("Location: annunci.php");
    exit();
?>