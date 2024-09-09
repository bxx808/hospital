<?php
require_once "handler/conection.php";
$sql = "SELECT id,name,lastName,firstName FROM patients";
$query = $pdo->prepare($sql);
$query->execute();
$patients = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM admins WHERE role='doctor' ";
$query = $pdo->prepare($sql);
$query->execute();
$doctors = $query->fetchAll(PDO::FETCH_ASSOC);
require_once "layout/head.php";
?>
<div class="reception">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReception">
        Создать прием
    </button>
    <div class="modal" tabindex="-1" id="addReception">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <label for="">Введите имя пациента</label>
                        <select name="" id="" class="form-select">
                            <?php foreach ($patients as $patient): ?>
                                <option value="<?= $patient['id'] ?>"><?= $patient['firstName'] ?>     <?= $patient['name'] ?>
                                    <?= $patient['lastName'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="">Введите имя доктора</label>
                        <select name="" id="" class="form-select">
                            <?php foreach ($doctors as $doctor): ?>
                                <option value="<?= $doctor['id'] ?>"><?= $doctor['login'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="">Введите дату приема</label>
                        <input type="date" class="form-control">
                        <label for="">Причина обращения</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once "layout/footer.php";
?>