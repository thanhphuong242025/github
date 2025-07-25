<?php include './views/layouts/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4 mt-4">
            <h3 class="fw-bold mb-3 text-primary text-center">✏️ Sửa bình luận</h3>
            <form method="POST" action="index.php?controller=comment&action=update">
                <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                <input type="hidden" name="product_id" value="<?= $comment['product_id'] ?>">
                <div class="mb-3">
                    <textarea name="content" rows="4" class="form-control" required><?= htmlspecialchars($comment['content']) ?></textarea>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Cập nhật</button>
                    <a href="index.php?controller=product&action=show&id=<?= $comment['product_id'] ?>" class="btn btn-secondary">Huỷ</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include './views/layouts/footer.php'; ?>