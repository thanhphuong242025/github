<?php
class User
{
    private $pdo;
    private $tablename = 'users';
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function register($name, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO {$this->tablename}(name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hash]);
    }

    public function login($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tablename} WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tablename} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}