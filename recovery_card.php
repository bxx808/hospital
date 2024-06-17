<?php
require_once "handler/conection.php";
if (isset($_GET['page'])) {
    $page = ($_GET['page'] * 6) - 6;
    $sql = "SELECT * FROM patients WHERE `soft_delete`= 1 LIMIT 6 OFFSET " . $page;
    $query = $pdo->prepare($sql);
    $query->execute();
} else {
    $sql = "SELECT * FROM patients WHERE `soft_delete`= 1 LIMIT 6 OFFSET 0 ";
    $query = $pdo->prepare($sql);
    $query->execute();
}

$patients = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT COUNT(*) FROM patients";
$query = $pdo->prepare($sql);
$query->execute();
$PER_PAGE = 6;
$patientsCount = ceil($query->fetchColumn() / $PER_PAGE);

require_once "layout/head.php";
?>
<div class="row">
    <div class="col-12 d-md-flex">
        <div class="col-6">
            <h1>Корзина</h1>
        </div>
        <div class="col-6 d-md-flex justify-content-md-end">
            <form action="card_list.php" method="post">
                <button type="submit" class="btn mt-2 btn-outline-primary d-md-flex ">Назад</button>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="row patients_list">
            <?php foreach ($patients as $patient): ?>
                <div class="col-4">
                    <div class="card mb-3 text-bg-secondary container-fluid shadow-lg">
                        <div class="row g-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="box_img" id="image">
                                            <img src="<?= $patient['avatar']; ?>" class="img-fluid rounded-start" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-8 ">
                                        <h5 class="card-title">Пациент №
                                            <?= $patient['id']; ?>
                                        </h5>
                                        <div class="function_btn">
                                            <form action="handler/recovery_card_handler.php" method="post">
                                                <input type="hidden" name="id" value="<?= $patient['id']; ?>">
                                                <button class="recovery_btn" name="submit">
                                                    <i class="fa-solid fa-recycle"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="mb-3">
                                            <input type="firstName" value="<?= $patient['firstName']; ?>"
                                                class="form-control patient_input" id="inputFirstName" placeholder="Фамилия"
                                                name="firstName" required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <input type="name" value="<?= $patient['name']; ?>"
                                                class="form-control patient_input" id="inputName" placeholder="Имя"
                                                name="name" required readonly>
                                        </div>
                                        <div class="">
                                            <input type="lastName" value="<?= $patient['lastName']; ?>"
                                                class="form-control patient_input" id="inputlastName" placeholder="Отчество"
                                                name="lastName" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="mb-3">
                                        <input type="text" value="<?= $patient['adress']; ?>"
                                            class="form-control patient_input" id="inputAddress" placeholder="Адресс"
                                            name="adress" required readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text patient_input" id="basic-addon1">+7</span>
                                        <input type="text" value="<?= $patient['phone']; ?>"
                                            class="form-control patient_input" placeholder="Номер телефона"
                                            aria-label="Number" required aria-describedby="basic-addon1" name="number"
                                            readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control patient_input"
                                            value="<?= $patient['bloodeGroup']; ?>" placeholder="Группа крови"
                                            aria-label="Number" required aria-describedby="basic-addon1" name="number"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require_once "layout/footer.php"; ?>