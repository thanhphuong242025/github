<!-- <form method="POST" action="index.php?controller=user&action=handleRegister">
    <input name="name" placeholder="Name"><br>
    <input name="email" placeholder="Email"><br>
    <input name="password" type="password" placeholder="Password"><br>
    <button>Register</button>
</form> -->

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="/2handhub/publics/assets/css/Login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4 shadow" style="max-width:400px; width:100%;">
            <h2 class="fw-bold text-center mb-4 text-primary">Đăng ký</h2>
            <form method="POST" action="index.php?controller=user&action=handleRegister">
                <div class="mb-3">
                    <input class="form-control" name="name" type="text" placeholder="Họ và tên" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" name="email" type="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" name="password" type="password" placeholder="Mật khẩu" required>
                </div>
                <button class="btn btn-primary w-100 fw-bold" type="submit">Đăng ký</button>
            </form>
            <p class="text-center mt-3">
                Đã có tài khoản? <a href="index.php?controller=user&action=login">Đăng nhập</a>
            </p>
        </div>
    </div>
</body>

</html>