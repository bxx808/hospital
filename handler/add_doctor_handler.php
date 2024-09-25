<?php
require_once ("function.php");
session_start();
if (isset ($_POST['submit'])) {
    require_once ("conection.php");
    $sql = "SELECT login FROM admins WHERE login=:login";
    $query=$pdo->prepare($sql);
    $query->execute(['login' => $_POST['login']]);
    $login = $query->fetch(PDO::FETCH_ASSOC);
    if(!$login){
        $sql = "INSERT INTO `admins` (`name` , `login`, `password`, `role`) VALUES (:name ,:login, :password, 'doctor')";
        $query = $pdo->prepare($sql);
    
        $query->execute([
            'name' => $_POST['name'],
            'login' => $_POST['login'],
            'password' => $_POST['password'],
        ]);//Создал запрос к базе
    
        $query = $pdo->prepare("SELECT * FROM admins WHERE login=:login");
        $query->execute(['login' => $_POST['login']]);
        $idDoctor = $query->fetch(PDO::FETCH_ASSOC)['id'];
        $sql = "INSERT INTO `admins_to_positions`(`id`, `admin_id`, `position_id`) VALUES (NULL, :admin_id, :position_id)";
        $query = $pdo->prepare($sql);
    
        $query->execute([
            'admin_id' => $idDoctor,
            'position_id' => $_POST['role'],
        ]);
        $_SESSION['success'] = $_POST['name']. ' ' .", успешно добавлен";
    }else{
        $_SESSION['error'] = "Такой логин уже занят";
    }
}
header("location: ../add_doctor.php");
exit;