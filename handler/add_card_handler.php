<?php
session_start();
if (isset ($_POST['submit'])) {
    require_once ("conection.php");
    $sql = "INSERT INTO patients (`id`, `avatar`, `firstName`, `name`, `lastName`, `adress`, `phone`, `bloodeGroup`, `soft_delete`) VALUES (NULL ,:avatar, :firstName, :name, :lastName, :adress, :number, :bloodeGroup, :soft_delete)";
    $query = $pdo->prepare($sql);

    $fileName = uploadImage($_FILES);

    $query->execute([
        'avatar' => $fileName,
        'firstName' => $_POST['firstName'],
        'name' => $_POST['name'],
        'lastName' => $_POST['lastName'],
        'adress' => $_POST['adress'],
        'number' => $_POST['number'],
        'bloodeGroup' => $_POST['bloodeGroup'],
        'soft_delete' => 0,
    ]);//Создал запрос к базе
    $_SESSION['success'] = "Пользователь,". $_POST['name'] .' '. $_POST['lastName'] .", успешно добавлен";
    header("location: ../add_card.php");
    exit;
}
?>