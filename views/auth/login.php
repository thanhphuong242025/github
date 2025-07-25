<!DOCTYPE html>
<html lang="vi">

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4 shadow" style="max-width:400px; width:100%;">
            <h2 class="fw-bold text-center mb-4 text-primary">Đăng nhập</h2>
            <form method="POST" action="index.php?controller=user&action=handleLogin">
                <div class="mb-3">
                    <input class="form-control" name="email" type="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" name="password" type="password" placeholder="Mật khẩu" required>
                </div>
                <button class="btn btn-primary w-100 fw-bold" type="submit">Đăng nhập</button>
            </form>
            <p class="text-center mt-3">
                Chưa có tài khoản? <a href="index.php?controller=user&action=register">Đăng ký ngay</a>
            </p>
        </div>
    </div>
</body>
                <button class="btn btn-primary w-100" type="submit">Đăng nhập</button>
            </form>
            <p class="text-center mt-3">
                Chưa có tài khoản? <a href="index.php?controller=user&action=register">Đăng ký ngay</a>
            </p>
        </div>
    </div>
</body>

</html>