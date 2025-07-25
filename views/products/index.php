



<?php include './views/layouts/header.php'; ?>

<div class="mb-3">
    <form method="GET" class="d-flex gap-2">
        <input type="hidden" name="controller" value="product">
        <input type="hidden" name="action" value="index">
        <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm..." value="<?= $_GET['keyword'] ?? '' ?>">
        <button class="btn btn-primary">Tìm</button>
    </form>
</div>

<div class="mb-4">
    <a href="index.php?controller=product&action=create" class="btn btn-success">Viết bài</a>
</div>

<h2 class="fw-bold mb-3">Danh sách sản phẩm</h2>

<div class="row row-cols-1 row-cols-md-3 g-3">
    <?php foreach ($products as $product): ?>
    <div class="col">
        <div class="card h-100 border">
            <?php if (!empty($product['image'])): ?>
            <img src="uploads/<?= htmlspecialchars($product['image']) ?>" alt="Ảnh sản phẩm" class="card-img-top" style="height: 160px; object-fit: cover;">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title mb-2">
                    <?= htmlspecialchars($product['title']) ?>
                </h5>
                <p class="card-text text-muted mb-2" style="font-size: 14px;">
                    <?= htmlspecialchars(mb_strimwidth($product['description'], 0, 80, "...")) ?>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-secondary">By <?= htmlspecialchars($product['user_name']) ?></small>
                    <small class="text-secondary"><?= htmlspecialchars(date('d/m/Y', strtotime($product['created_at']))) ?></small>
                </div>
                <a href="index.php?controller=product&action=show&id=<?= $product['id'] ?>" class="btn btn-outline-primary btn-sm w-100 mt-3">Xem chi tiết</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php include './views/layouts/footer.php'; ?>