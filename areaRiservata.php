<?php
require_once 'bootstrap.php';

$loggedUser  = $_SESSION['username'] ?? null;
$profileUser = $_GET['user'] ?? $loggedUser;

if (!$loggedUser && !$profileUser) {
    header("Location: login.php");
    exit;
}

$isOwner = $loggedUser && $profileUser === $loggedUser;

$templateParams["nome"] = "Template/areaRiservata.php";
$templateParams["js"] = array("JS/areaRiservata.js");
$templateParams["loggedUser"] = $loggedUser;
$templateParams["profileUser"] = $profileUser;
$templateParams["isOwner"] = $isOwner;

require './Template/base.php';
?>