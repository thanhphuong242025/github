<?php
class Comment
{
    private $pdo;

    private $tablename = 'comments';
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getByPost($post_id)
    {
        $stmt = $this->pdo->prepare("SELECT {$this->tablename}.*, users.name FROM comments JOIN users ON comments.user_id = users.id WHERE product_id=?");
        $stmt->execute([$post_id]);
        return $stmt->fetchAll();
    }

    public function add($post_id, $user_id, $content)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->tablename}(product_id, user_id, content) VALUES (?, ?, ?)");
        return $stmt->execute([$post_id, $user_id, $content]);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tablename} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $content)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->tablename} SET content = ?, updated_at = NOW() WHERE id = ?");
        return $stmt->execute([$content, $id]);
    }
}