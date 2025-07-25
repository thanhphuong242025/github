<?php
$product = $product ?? [];
include './views/layouts/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold mb-3 text-primary text-center">
                <?= isset($product['id']) ? 'Sửa sản phẩm' : 'Thêm sản phẩm' ?>
            </h3>
            <form method="POST" enctype="multipart/form-data" action="index.php?controller=product&action=<?= isset($product['id']) ? 'update' : 'store' ?>">
                <?php if (isset($product['id'])): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                <?php endif; ?>
                <div class="row g-3">
                    <div class="col-md-7">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tiêu đề</label>
                            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($product['title'] ?? '') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nội dung</label>
                            <textarea name="content" rows="6" class="form-control" required><?= htmlspecialchars($product['content'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Hình ảnh</label>
                            <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                            <?php if (isset($product['image'])): ?>
                            <input type="hidden" name="old_image" value="<?= htmlspecialchars($product['image']) ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex align-items-center justify-content-center">
                        <img id="preview" src="<?= !empty($product['image']) ? 'uploads/' . htmlspecialchars($product['image']) : '#' ?>" style="max-width:220px; <?= empty($product['image']) ? 'display:none;' : '' ?>" alt="Preview" class="rounded shadow">
                    </div>
                </div>
                <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-success">Lưu</button>
                    <a href="index.php?controller=product&action=index" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('imageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});
</script>

<?php include './views/layouts/footer.php'; ?>