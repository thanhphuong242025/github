<?php
require_once './models/User.php';

class UserController
{
    public function login()
    {
        include './views/auth/login.php';
    }

    public function register()
    {
        include './views/auth/register.php';
    }

    public function handleLogin($pdo)
    {
        $model = new User($pdo);
        $user = $model->login($_POST['email'], $_POST['password']);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: index.php?controller=product&action=index");
        } else {
            echo "Login failed.";
        }
    }

    public function handleRegister($pdo)
    {
        $model = new User($pdo);
        if ($model->register($_POST['name'], $_POST['email'], $_POST['password'])) {
            header("Location: index.php?controller=user&action=login");
        } else {
            echo "Register failed.";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?controller=user&action=login");
    }
}