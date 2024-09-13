<?php
require_once "handler/conection.php";
$error = false;
try {
    $sql = "SELECT id,name,lastName,firstName FROM patients";
    $query = $pdo->prepare($sql);
    $query->execute();
    $patients = $query->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT admins.name, position.position FROM admins JOIN admins_to_positions ON admins.id = admins_to_positions.admin_id JOIN position ON admins_to_positions.position_id = position.id WHERE admins.role = 'doctor' ORDER BY position.position ASC  ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $doctors = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Ошибка!Обратитесь к администрации!";
}
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
                    <h5 class="modal-title">Записать на прием</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php if (!$error): ?>
                    <form action="" id="add_reception">
                        <div class="modal-body">
                            <label for="">Введите имя пациента</label>
                            <select name="patient" id="" class="form-select">
                                <?php foreach ($patients as $patient): ?>
                                    <option value="<?= $patient['id'] ?>"><?= $patient['firstName'] ?>         <?= $patient['name'] ?>
                                        <?= $patient['lastName'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <label for="">Введите имя доктора</label>
                            <select name="doctor" id="" class="form-select">
                                <?php foreach ($doctors as $doctor): ?>
                                    <option value="<?= $doctor['id'] ?>"><?= $doctor['name'] ?> - <?= $doctor['position'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <label for="">Введите дату приема</label>
                            <input type="date" class="form-control" name="date">
                            <label for="">Причина обращения</label>
                            <textarea name="reason" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                <?php else: ?>
                    <h1><?= $error ?></h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once "layout/footer.php";
?>
<script src="js/add_reception.js"></script>