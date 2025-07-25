<?php include './views/layouts/header.php'; ?>

<div class="row g-4 mb-4">
    <div class="col-md-7">
        <div class="card p-4 h-100">
            <h2 class="fw-bold mb-2 text-primary"><?= htmlspecialchars($product['title']) ?></h2>
            <div class="mb-2 text-muted">
                <i class="fa-solid fa-user"></i> <?= $_SESSION['user']['name'] ?? 'Ẩn danh' ?> |
                <i class="fa-solid fa-calendar"></i> <?= date('d/m/Y', strtotime($product['created_at'])) ?>
            </div>
            <div class="mb-3" style="font-size:16px;">
                <?= nl2br(htmlspecialchars($product['description'])) ?>
            </div>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $product['user_id']): ?>
                <a href="index.php?controller=product&action=edit&id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                    href="index.php?controller=product&action=delete&id=<?= $product['id'] ?>" class="btn btn-danger btn-sm ms-2">Xóa</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-5">
        <?php if (!empty($product['image'])): ?>
        <div class="card h-100 d-flex align-items-center justify-content-center p-3">
            <img src="uploads/<?= htmlspecialchars($product['image']) ?>" alt="Ảnh sản phẩm" class="img-fluid rounded" style="max-height:320px; object-fit:cover;">
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="card p-4 mb-4">
    <h4 class="fw-bold mb-3">Bình luận</h4>
    <?php if (!empty($_SESSION['user'])): ?>
    <form method="POST" action="index.php?controller=comment&action=add" class="mb-3">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <div class="mb-2">
            <textarea name="content" rows="3" class="form-control" placeholder="Nhập bình luận..." required></textarea>
        </div>
        <button class="btn btn-primary">Gửi bình luận</button>
    </form>
    <?php else: ?>
    <p><a href="index.php?controller=user&action=login">Đăng nhập để bình luận</a></p>
    <?php endif; ?>

    <div class="mt-3">
        <?php foreach ($comments as $c): ?>
    <div class="border rounded p-2 mb-2">
        <strong><?= htmlspecialchars($c['name']) ?></strong> -
        <small><?= $c['created_at'] ?></small>
        <p><?= nl2br(htmlspecialchars($c['content'])) ?></p>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $c['user_id']): ?>
        <a href="index.php?controller=comment&action=edit&id=<?= $c['id'] ?>"
            class="btn btn-sm btn-outline-warning">Sửa</a>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>

<a href="index.php?controller=product&action=index" class="btn btn-secondary mt-3">Quay lại danh sách</a>

<?php include './views/layouts/footer.php'; ?>