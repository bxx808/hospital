<?
session_start();
if (isset($_POST['submit'])) {
    require_once ('conection.php');
    $sql = "SELECT * FROM `patients` WHERE id=:id AND `soft_delete`=0";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $_POST['id']]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $sql = "UPDATE `patients` SET `soft_delete`='1' WHERE id=:id";
        $query = $pdo->prepare($sql);
        $query->execute(['id' => $_POST['id']]);
        $_SESSION['success'] = "Пользователь, {$user['name']} {$user['lastName']}, успешно удален";
    }else{
        $_SESSION['error'] = "Пользователь не найден"; 
    }
    header("location: ../card_list.php");
}
