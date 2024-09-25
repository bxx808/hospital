<?php
session_start();
require_once "handler/function.php";
require_once "handler/conection.php";
$sql = "SELECT * FROM position";
$query = $pdo->prepare($sql);
$query->execute();
$positions = $query->fetchAll(PDO::FETCH_ASSOC);

checkRole('admin');
require_once "layout/head.php";

?>
<h1 class="head_card">Добавить доктора</h1>
<div class="card mb-3 text-bg-secondary container-fluid shadow-lg" style="max-width: 540px;">
  <div class="row g-0">
    <div class="card-body">
      <form action="handler/add_doctor_handler.php" method="post">
        <div class="row">
          <div class="">
            <h5 class="card-title">Сотрудник</h5>
            <div class="mb-3">
              <input type="text" class="form-control" id="inputFirstName" placeholder="ФИО" name="name" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="inputFirstName" placeholder="Логин" name="login" required>
            </div>
            <div class="">
              <input type="text" class="form-control" id="inputName" placeholder="Пароль" name="password" required>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Должность</label>
            <select class="form-select" id="inputGroupSelect01" name="role">
              <option value="0">Не указана</option>
              <?php foreach ($positions as $position): ?>
                <option value="<?= $position['id'] ?>"><?= $position['position'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="input-group">
            <button class="btn btn-success col-12 form-control" type="submit" name="submit">
              <i class="fa-regular fa-clipboard"></i>
              Добавить
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require_once "layout/footer.php" ?>