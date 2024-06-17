<?php
session_start();
if (isset($_POST['submit'])) {
    require_once ('conection.php');
    $sql = "SELECT * FROM `patients` WHERE id=:id AND `soft_delete`=1";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $_POST['id']]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $sql = "UPDATE `patients` SET `soft_delete`='0' WHERE id=:id";
        $query = $pdo->prepare($sql);
        $query->execute(['id' => $_POST['id']]);
        $_SESSION['success'] = "Пользователь, {$user['name']} {$user['lastName']}, успешно восстановлен";
    } else {
        $_SESSION['error'] = "Пользователь не найден";
    }
    header("location: ../recovery_card.php");
}