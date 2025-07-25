
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>USER MODEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-2">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php?controller=product&action=index">SẢN PHẨM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=product&action=index"></a>
                    </li>
                    <?php if (!empty($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <span class="nav-link text-success fw-bold"> <?= $_SESSION['user']['name'] ?> </span>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?controller=user&action=logout" class="nav-link text-danger">Đăng xuất</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?controller=user&action=login" class="nav-link text-primary">Đăng nhập</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">