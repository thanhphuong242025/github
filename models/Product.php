<?php
class Product

{
    private $pdo;
    private $tablename = 'products';
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function all($keyword = null)
    {
        if ($keyword) {
            $stmt = $this->pdo->prepare("SELECT {$this->tablename}.*, users.name AS user_name FROM products JOIN users ON products.user_id = users.id WHERE title LIKE ?");
            $stmt->execute(["%$keyword%"]);
        } else {
            $stmt = $this->pdo->query("SELECT products.*, users.name AS user_name FROM products JOIN users ON products.user_id = users.id ORDER BY created_at DESC");
        }
        return $stmt->fetchAll();
    }

    public function create($user_id, $title, $description, $image)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->tablename}(user_id, title, description, image) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$user_id, $title, $description, $image]);
    }

    public function update($id, $title, $description, $image)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->tablename} SET title=?, description=?, image=? WHERE id=?");
        return $stmt->execute([$title, $description, $image, $id]);
    }

    public function delete($id)
    {
        return $this->pdo->prepare("DELETE FROM {$this->tablename} WHERE id=?")->execute([$id]);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tablename} WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}