<?php require_once "layout/head.php";
require_once "handler/conection.php";
$sql = "SELECT * FROM patients WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(['id' => $_GET['id']]);
$patient = $query->fetch();
?>
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<h1 class="head_card">Редактировать карточку</h1>
<div class="card mb-3 text-bg-secondary container-fluid shadow-lg" style="max-width: 540px;">
    <div class="row g-0">
        <div class="card-body">
            <form action="handler/edit_patient_handler.php?id=<?=$patient['id'];?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box_img" id="image">
                            <img src="<?= $patient['avatar']; ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <input type="file" class="form-control" name="avatar" onchange="updateImageUrl(event)">
                    </div>
                    <div class="col-md-8 ">
                        <h5 class="card-title">Пациент №
                            <?= $patient['id']; ?>
                        </h5>
                        <div class="mb-3">
                            <input type="firstName" value="<?= $patient['firstName']; ?>" class="form-control"
                                id="inputFirstName" placeholder="Фамилия" name="firstName" required>
                        </div>
                        <div class="mb-3">
                            <input type="name" value="<?= $patient['name']; ?>" class="form-control" id="inputName"
                                placeholder="Имя" name="name" required>
                        </div>
                        <div class="">
                            <input type="lastName" value="<?= $patient['lastName']; ?>" class="form-control"
                                id="inputlastName" placeholder="Отчество" name="lastName" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="mb-3">
                        <input type="text" value="<?= $patient['adress']; ?>" class="form-control" id="inputAddress"
                            placeholder="Адресс" name="adress" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+7</span>
                        <input type="text" value="<?= $patient['phone']; ?>" class="form-control"
                            placeholder="Номер телефона" aria-label="Number" required aria-describedby="basic-addon1"
                            name="number">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Группа крови</label>
                        <select class="form-select" id="inputGroupSelect01" name="bloodeGroup">
                            <option value="0">Не указана</option>
                            <option value="O(I) Rh+" <?= $patient['bloodeGroup'] == 'O(I) Rh+' ? 'selected' : '' ?>>O(I) Rh+ —
                                первая положительная</option>
                            <option value="O(I) Rh−" <?= $patient['bloodeGroup'] == 'O(I) Rh−' ? 'selected' : '' ?>>O(I) Rh− —
                                первая отрицательная</option>
                            <option value="A(II) Rh+" <?= $patient['bloodeGroup'] == 'A(II) Rh+' ? 'selected' : '' ?>>A(II)
                                Rh+ — вторая положительная</option>
                            <option value="A(II) Rh−" <?= $patient['bloodeGroup'] == 'A(II) Rh−' ? 'selected' : '' ?>>A(II)
                                Rh− — вторая отрицательная</option>
                            <option value="B (III) Rh+" <?= $patient['bloodeGroup'] == 'B (III) Rh+' ? 'selected' : '' ?>>B
                                (III) Rh+ — третья положительная</option>
                            <option value="B (III) Rh−" <?= $patient['bloodeGroup'] == 'B (III) Rh−' ? 'selected' : '' ?>>B
                                (III) Rh− — третья отрицательная</option>
                            <option value="AB (IV) Rh+" <?= $patient['bloodeGroup'] == 'AB (IV) Rh+' ? 'selected' : '' ?>>AB
                                (IV) Rh+ — четвёртая положительная</option>
                            <option value="AB (IV) Rh−" <?= $patient['bloodeGroup'] == 'AB (IV) Rh−' ? 'selected' : '' ?>>AB
                                (IV) Rh− — четвёртая отрицательная</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <button class="btn btn-success col-12 form-control" type="submit" name="submit">
                            <i class="fa-regular fa-clipboard"></i>
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once "layout/footer.php" ?>