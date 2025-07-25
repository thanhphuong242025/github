<?php
require_once './models/Product.php';

class ProductController
{
    public function index($pdo)
    {
        $model = new Product($pdo);
        $keyword = $_GET['keyword'] ?? null;
        $products = $model->all($keyword);
        include './views/products/index.php';
    }

    public function create()
    {
        include './views/products/form.php';
    }

    public function store($pdo)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $user_id = $_SESSION['user']['id'] ?? null;
        $title = $_POST['title'] ?? '';
        $content = $_POST['description'] ?? '';

        $imageName = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmp = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = mime_content_type($fileTmp);
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (!in_array($fileType, $allowedTypes)) {
                die("Chỉ cho phép upload ảnh JPG, PNG, GIF");
            }

            if ($fileSize > 2 * 1024 * 1024) {
                die("File quá lớn. Vui lòng chọn ảnh < 2MB.");
            }

            $imageName = time() . '-' . basename($fileName);
            $destination = __DIR__ . '/../uploads/' . $imageName;
            move_uploaded_file($fileTmp, $destination);
        }

        $model = new Product($pdo);
        $model->create($user_id, $title, $content, $imageName);
        header("Location: index.php?controller=product&action=index");
    }


    public function edit($pdo)
    {
        $model = new Product($pdo);
        $products = $model->find($_GET['id']);
        include './views/products/form.php';
    }

    public function update($pdo)
    {
        $model = new Product($pdo);

        $image = $_POST['old_image'] ?? '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];

            move_uploaded_file($tmp_name, './uploads/' . $image);
        }

        $model->update($_POST['id'], $_POST['title'], $_POST['description'], $image);

        header("Location: index.php?controller=product&action=index");
    }

    public function delete($pdo)
    {
        $model = new Product($pdo);
        $model->delete($_GET['id']);
        header("Location: index.php?controller=product&action=index");
    }

    public function show($pdo)
    {
        $model = new Product($pdo);
        $product = $model->find($_GET['id']);

        require_once './models/Comment.php';
        $commentModel = new Comment($pdo);
        $comments = $commentModel->getByPost($_GET['id']);

        include './views/products/show.php';
    }
}