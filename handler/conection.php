<?php 
$pdo = new PDO("mysql:host=localhost; dbname=hospital", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
require_once("function.php");
?>