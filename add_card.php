<?php 
session_start();
require_once "handler/function.php";
checkRole('moder');
require_once "layout/head.php";
?>

<h1 class="head_card">Добавить карточку</h1>
<div class="card mb-3 text-bg-secondary container-fluid shadow-lg" style="max-width: 540px;">
  <div class="row g-0">
    <div class="card-body">
      <form action="handler/add_card_handler.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4">
            <div class="box_img" id="image">
              <img src="img/users/user.png" class="img-fluid rounded-start" alt="..." >
            </div>
            <input type="file" class="form-control" name="avatar" onchange="updateImageUrl(event)" required>
          </div>
          <div class="col-md-8 ">
            <h5 class="card-title">Пациент</h5>
            <div class="mb-3">
              <input type="firstName" class="form-control" id="inputFirstName" placeholder="Фамилия" name="firstName"
                required>
            </div>
            <div class="mb-3">
              <input type="name" class="form-control" id="inputName" placeholder="Имя" name="name" required>
            </div>
            <div class="">
              <input type="lastName" class="form-control" id="inputlastName" placeholder="Отчество" name="lastName"
                required>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="mb-3">
            <input type="text" class="form-control" id="inputAddress" placeholder="Адресс" name="adress" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">+7</span>
            <input type="text" class="form-control" placeholder="Номер телефона" aria-label="Number" required
              aria-describedby="basic-addon1" name="number">
          </div>
          <div class="input-group mb-3">`
            <label class="input-group-text" for="inputGroupSelect01">Группа крови</label>
            <select class="form-select" id="inputGroupSelect01" name="bloodeGroup">
              <option value="0">Не указана</option>
              <option value="O(I) Rh+">O(I) Rh+ — первая положительная</option>
              <option value="O(I) Rh−">O(I) Rh− — первая отрицательная</option>
              <option value="A(II) Rh+">A(II) Rh+ — вторая положительная</option>
              <option value="A(II) Rh−">A(II) Rh− — вторая отрицательная</option>
              <option value="B (III) Rh+">B (III) Rh+ — третья положительная</option>
              <option value="B (III) Rh−">B (III) Rh− — третья отрицательная</option>
              <option value="AB (IV) Rh+">AB (IV) Rh+ — четвёртая положительная</option>
              <option value="AB (IV) Rh−">AB (IV) Rh− — четвёртая отрицательная</option>
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