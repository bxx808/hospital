<?php require_once "layout/head.php";
if (!isset ($_SESSION['admin'])) {
    header("location:authorization.php");
    exit;
}
?>
<h1>Главная страница</h1>
<div class="row">
    <div class="d-none d-sm-block col-sm-12 col-md-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Особое обращение с заголовком</h5>
                <p class="card-text">С вспомогательным текстом ниже в качестве естественного перехода к дополнительному
                    контенту.</p>
                <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Особое обращение с заголовком</h5>
                <p class="card-text">С вспомогательным текстом ниже в качестве естественного перехода к дополнительному
                    контенту.</p>
                <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
            </div>
        </div>
    </div>
</div>
<?php require_once "layout/footer.php" ?>