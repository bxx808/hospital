<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span>Моя</span>
                Больница
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">О нас</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Контакты
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Эл.почта</a></li>
                            <li><a class="dropdown-item" href="#">Номер телефона</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Адрес</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?php if (!isset($_SESSION['admin'])): ?>
                            <a class="nav-link " href="authorization.php">Войти</a>
                        <?php else: ?>
                            <form action="handler/handler_exit.php" method="post">
                                <button type="submit" class="btn btn-outline-danger" name="exit">Выйти</button>
                            </form>
                        <?php endif; ?>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Поиск</button>
                </form>
            </div>
        </div>
    </nav>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="col-12 ">
            <div class="row">
                <?php if (isset($_SESSION['admin'])): ?>
                    <div class="col-2 ">
                        <div class="sidebar">
                            <?php if ($_SESSION['role'] == 'moder' || $_SESSION['role'] == 'admin'): ?>
                                <div class="chapter">
                                    <span>
                                        Регистратура
                                    </span>
                                    <a href="add_card.php">
                                        <i class="fa-solid fa-plus"></i>
                                        Добавить карточку
                                    </a>
                                    <a href="card_list.php">
                                        <i class="fa-solid fa-address-card"></i>
                                        Картотека
                                    </a>
                                    <a href="add_reception.php">
                                        <i class="fa-solid fa-address-card"></i>
                                        Записать на прием
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <div class="chapter">
                                    <span>
                                        Отдел кадров
                                    </span>
                                    <a href="add_worker.php">
                                        <i class="fa-solid fa-plus"></i>
                                        Добавить регистратора
                                    </a>
                                    <a href="add_doctor.php">
                                        <i class="fa-solid fa-plus"></i>
                                        Добавить доктора
                                    </a>
                                    <a href="card_worker_list.php">
                                        <i class="fa-solid fa-address-card"></i>
                                        Личные дела
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'admin'): ?>
                                <div class="chapter">
                                    <span>Кабинет врача</span>
                                    <a href="">Мои приемы </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="<?= isset($_SESSION['admin']) ? 'col-10' : 'col-12' ?>">