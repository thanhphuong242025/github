<?php
require_once './models/Comment.php';

class CommentController
{
    public function add($pdo)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=user&action=login");
            exit;
        }

        $commentModel = new Comment($pdo);
        $commentModel->add($_POST['product_id'], $_SESSION['user']['id'], $_POST['content']);

        header("Location: index.php?controller=product&action=show&id=" . $_POST['product_id']);
    }

    public function edit($pdo)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $commentModel = new Comment($pdo);
        $comment = $commentModel->find($_GET['id']);

        if (!$comment || $comment['user_id'] != $_SESSION['user']['id']) {
            die("Không có quyền sửa bình luận này.");
        }

        include './views/comments/edit.php';
    }

    public function update($pdo)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $commentModel = new Comment($pdo);
        $comment = $commentModel->find($_POST['id']);

        if ($comment['user_id'] != $_SESSION['user']['id']) {
            die("Không có quyền sửa.");
        }

        $commentModel->update($_POST['id'], $_POST['content']);
        header("Location: index.php?controller=product&action=show&id=" . $_POST['product_id']);
    }
}