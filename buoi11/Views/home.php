<!DOCTYPE html>
<html>
    <head>
        <link href='assets/style.css' rel='stylesheet' />
    </head>
    <body>
        <form method="GET" action="">
            <p><input type="text" name="keyword"/>
                <button type="submit" name="search">Tìm kiếm</button>
            </p>            
        </form>
        <h1>Danh sách sản phẩm</h1>
        <a href="index.php?route=logout"><button>Đăng xuất</button></a>

        <hr>
        <a href="index.php?route=add"><button>Thêm mới</button></a>
        <hr>
        <table>
            <tr>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th>Chi tiết</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <?php
            //Lặp mảng $allProduct để in dữ liệu ra table
            foreach($arrSearch ?? $allProduct as $row){
            ?>
                <tr>
                    <td><?php echo $row['name'] ;?></td>
                    <td><?php echo $row['price'] ;?></td>
                    <td><img src="assets/images/<?php echo $row['image'] ;?>" alt="" height="80"> </td>
                    <td><?php echo $row['description'] ;?></td>
                    <td><a href="index.php?route=detail&id=<?php echo $row['id'];?>"><button>Detail</button></a></td>
                    <td><a href="index.php?route=edit&id=<?= $row['id'] ?>"><button>Sửa</button></a></td>
                    <td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="index.php?route=delete&id=<?= $row['id'] ?>"><button>Xóa</button></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <ul class="pagination">
            <?php
            for($i = 1; $i <= $numPage; $i++){
                ?>
                    <li><a href="index.php?p=<?php echo $i;?>">Trang <?php echo $i;?></a></li>
                <?php
            }
            ?>

        </ul>
    </body>
</html>