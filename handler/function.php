<?
function uploadImage(array $images)
{
    $extension = pathinfo($images['avatar']['name'])['extension'];//Получаю расширение картинки 
    $fileName = uniqid() . '.' . $extension;//Создаю уникальное имя
    $folder = '../img/users/';//расположение в папке
    move_uploaded_file($images['avatar']['tmp_name'], $folder . $fileName);
    return $folder . $fileName;
}

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}

function checkRole(string $role)
{
    $flag = false;
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == $role) {
        $flag = true;
    }
    if (!$flag) {
        $_SESSION['error'] = "Нет доступа к этой странице!";
        header('location:index.php');
        exit;
    }
}
// try {
//     uploadImage(1);
// }
// catch(TypeError $e){
//     echo $e->getMessage();
// }