<?php
require_once "handler/conection.php";

$sql = "SELECT * FROM `admins` WHERE 1=1";
$data = [];
if((bool)$_GET['searchId']){
    $sql.=" AND id=:id";
    $data['id']=$_GET['searchId'];
}
if((bool)$_GET['searchLogin']){
    $sql.=" AND login LIKE CONCAT('%', :login, '%')";
    $data['login']=$_GET['searchLogin'];
}
$query = $pdo->prepare($sql);
$query->execute($data);
$admins = $query->fetchAll(PDO::FETCH_ASSOC); 



require_once "layout/head.php";
?>
<div class="row">
    <div class="page_top">
        <h1>Личные дела</h1>
        <a href="" class="btn btn-md btn-outline-primary">Корзина</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Логин</th>
                <th scope="col">Пароль</th>
                <th scope="col">Роль</th>
                <th scope="col">Действия</th>
            </tr>
            <form action="?" method="GET">
                <tr>
                    <td>
                        <input type="text" class="form-control" name="searchId" value="<?= $_GET['searchId']??"" ?>">
                    </td>
                    <td>
                        <input type="text " class="form-control" name="searchLogin" value="<?= $_GET['searchLogin']??"" ?>">
                    </td>
                    <td>
                    </td>
                    <td>
                        <select  id="" class="form-control" name="searchRole">
                            <option value=""></option>
                            <option value="moder" <?= $_GET['searchRole']=="moder"?" selected": " " ?>>Регистратура</option>
                            <option value="doctor" <?= $_GET['searchRole']=="doctor"?" selected": " " ?>>Доктор</option>
                            <option value="admin" <?= $_GET['searchRole']=="admin"?" selected": " " ?>>Администратор</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-md btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </td>
                </tr>
            </form>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <th scope="row"><?= $admin['id'] ?></th>
                    <td><?= $admin['name'] ?></td>
                    <td><?= $admin['login'] ?></td>
                    <td><?= $admin['password'] ?></td>
                    <td><?= $admin['role'] ?></td>
                    <td>
                        <a href="" class="btn btn-md btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                        <a href="" class="btn btn-md btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn btn-md btn-outline-danger"><i class="fa-solid fa-trash"></i></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once "layout/footer.php"; ?>