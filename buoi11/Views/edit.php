<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Sửa sản phẩm</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <p><label>Tên sản phẩm: </label><input type="text" name="name" value="<?= $product['name'] ?>" /></p>
        <p><label>Giá sản phẩm: </label><input type="number" name="price" value="<?= $product['price'] ?>" /></p>
        <p>
            <label>Ảnh sản phẩm hiện tại: </label>
            <img src="assets/images/<?= $product['image'] ?>" height="80">
        </p>
        <p><label>Ảnh mới (nếu có): </label><input type="file" name="file_image" /></p>
        <p>
            <label>Mô tả sản phẩm: </label>
            <textarea name="description"><?= $product['description'] ?></textarea>
        </p>
        <p><button type="submit" name="update">Cập nhật</button></p>
    </form>
</body>
</html>