<?php 
session_start();
if (isset ($_SESSION['admin'])) {
    header("location: index.php");
    exit;
}
require_once "layout/head.php";
?>
<div class="container-fluid auth_block">
    <div class="" style="margin-top:100px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Авторизация</h3>
                </div>
                <form action="handler/handler_authorization.php" method="post">
                    <div class="p-4">
                        <div class="col-md-12">
                            <input type="text"
                                class="form-control mb-3 <?= isset ($_SESSION['error']) ? 'is-invalid' : '' ?>" required
                                placeholder="login" name="login">
                            <div class="invalid-feedback is-invalid">
                                Пожалуйста, выберите имя пользователя.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control mb-3" id="validationCustom02" required
                                placeholder="password" name="password">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Запомнить
                            </label>
                        </div>
                        <button class="btn btn-primary text-center mt-2" type="submit" name="send">
                            Войти
                        </button>
                        <p class="text-center mt-5">
                            <a class="text-primary text-decoration-none" href="registration.php">Зарегистрироваться</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (isset ($_SESSION["error"])): ?>
    <?php unset($_SESSION["error"]); ?>
<?php endif; ?>
<?php require_once "layout/footer.php" ?>