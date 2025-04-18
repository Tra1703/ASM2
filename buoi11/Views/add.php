<!DOCTYPE html>
<html>
    <head>
        <link href='assets/style.css' rel='stylesheet' />
    </head>
    <body>
        <form method="post" action="" enctype="multipart/form-data">
            <p><lable>Tên sản phẩm: </lable><input type="text" name="name"/></p>            
            <p><lable>Giá sản phẩm: </lable><input type="number" name="price"/></p>            
            <p><lable>Ảnh sản phẩm: </lable><input type="file" name="file_image"/></p>            
            <p>
                <lable>Mô tả sản phẩm: </lable>
                <textarea name="description" id=""></textarea>
            </p>            
            <p><button type="submit" name="add">Lưu</button></p>
        </form>
    </body>
</html>