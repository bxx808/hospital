<?php
session_start();
if (!isset ($_POST['send'])) {
    header("location: ../authorization.php");
    exit;
}
require_once "conection.php";

$login = $_POST['login'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=hospital", "root", "");
$sql = "SELECT * FROM `admins` WHERE `login` =:value ";
$query = $pdo->prepare($sql);
$query->execute(['value' => $login]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if (empty ($user) || $password != $user['password']) {
    $_SESSION["error"] = "Неверный логин или пароль";
    header("location: ../authorization.php");
    exit;
}
$_SESSION['admin'] = $login;

$_SESSION['role'] = $user['role'];

header("location: ../index.php");
exit;
?>