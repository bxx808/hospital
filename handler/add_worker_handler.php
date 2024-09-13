<?php
session_start();
if (isset ($_POST['submit'])) {
    require_once ("conection.php");
    $sql = "INSERT INTO `admins` (`id`, `name` , `login`, `password`, `role`) VALUES (NULL ,:name ,:login, :password, :role)";
    $query = $pdo->prepare($sql);

    $query->execute([
        'name' => $_POST['name'],
        'login' => $_POST['login'],
        'password' => $_POST['password'],
        'role' => $_POST['role'],
    ]);//Создал запрос к базе
    $_SESSION['success'] = $_POST['role']. ',' . ' ' . $_POST['name']. ' ' .", успешно добавлен";
    header("location: ../add_worker.php");
    exit;
}