<?
session_start();
if (isset($_POST['submit'])) {
    require_once ("conection.php");
    if (empty($_FILES['avatar']['name'])) {
        $sql = "UPDATE `patients` SET `firstName`=:firstName,`name`=:name,`lastName`=:lastName,`adress`=:adress,`phone`=:phone,`bloodeGroup`=:bloodeGroup ,`soft_delete`=:soft_delete WHERE id=:id";
    } else {
        $sql = "UPDATE `patients` SET `avatar`=:avatar,`firstName`=:firstName,`name`=:name,`lastName`=:lastName,`adress`=:adress,`phone`=:phone,`bloodeGroup`=:bloodeGroup,`soft_delete`=:soft_delete WHERE id=:id";
        $fileName = uploadImage($_FILES);
    }
    $query = $pdo->prepare($sql);
    $data = [
        'id' => $_GET['id'],
        'firstName' => $_POST['firstName'],
        'name' => $_POST['name'],
        'lastName' => $_POST['lastName'],
        'adress' => $_POST['adress'],
        'phone' => $_POST['number'],
        'bloodeGroup' => $_POST['bloodeGroup'],
        'soft_delete' => 0,
    ];
    if (empty($_FILES['avatar']['name'])) {
        $query->execute($data);//Создал запрос к базе
    } else {
        $data['avatar']=$fileName;//
        $query->execute($data);//Создал запрос к базе
    }
    $_SESSION['success'] = "Пользователь, " . $_POST['name'] . ' ' . $_POST['lastName'] . ", успешно сохранен";
    header("location: ../card_list.php");
    exit;
} else {
    $_SESSION['error'] = "Эта страница не доступна";
    header("location: ../index.php");
    exit;
}