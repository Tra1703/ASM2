<!DOCTYPE html>
<html>
    <head>
        <link href='assets/style.css' rel='stylesheet' />
    </head>
    <body>
       
       <h1>Tên SP: <?php echo $product_detail['name']; ?></h1>
       <p>Giá: <?php echo number_format($product_detail['price']); ?></p> 
       <p>Mô tả: <?php echo $product_detail['description']; ?></p> 
       <p><img src="assets/images/<?php echo $product_detail['image']; ?>" /></p> 
       <a href="index.php"><button>Quay lại</button></a>
    </body>
</html>