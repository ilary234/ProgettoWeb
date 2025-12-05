<?php
session_start();
define("UPLOAD_DIR", "./Upload/");
require_once("Utils/functions.php");
require_once("DB/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "progWeb", 3306);
?>