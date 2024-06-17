<?php
session_start();
if (isset ($_POST['submit'])) {
    require_once ("conection.php");
    $sql = "INSERT INTO `admins` (`id`, `login`, `password`, `role`) VALUES (NULL ,:login, :password, :role)";
    $query = $pdo->prepare($sql);

    $query->execute([
        'login' => $_POST['login'],
        'password' => $_POST['password'],
        'role' => $_POST['role'],
    ]);//Создал запрос к базе
    $_SESSION['success'] = $_POST['role']. ',' . ' ' . $_POST['login']. ' ' .", успешно добавлен";
    header("location: ../add_worker.php");
    exit;
}