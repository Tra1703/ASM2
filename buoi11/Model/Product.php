<?php
//Product kế thừa từ Database
class Product extends Database{
    public function getAll($page, $limit){
        $start = ($page - 1) * $limit;//Tính vị trí bắt đầu của 1 trang
        
        $sql = "SELECT * FROM products LIMIT $start , $limit";//Câu lệnh sql lấy giới hạn 50 sản phẩm
        //:start , :limit là name param
        
        $stmt = $this->conn->prepare($sql);//Nạp câu lệnh $sql vào PDO
        //Thực hiện câu lệnh sql truyền vào  name param :start , :limit
        $stmt->execute();
        
        $result = $stmt->fetchAll();//Trả về dữ liệu dạng FETCH_BOTH
        // result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // ✓Type gồm
        // FETCH_ASSOC: Trả về dữ liệu dạng mảng với key là tên củacolumn (column của các table trong database)        // 
        // FETCH_BOTH (default): Trả về dữ liệu dạng mảng với key là tên của column và cả số thứ tự của column        
        // FETCH_NUM: Trả về dữ liệu dạng mảng với key là số thứ tự của column
        return $result;//Trả về kết quả
    }
    public function totalProduct(){
        $sql = 'SELECT count(*) as total FROM products';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();        
        $result = $stmt->fetch();//Chỉ có 1 hàng dữ liệu nên dùng fetch
        return $result;
    }

    public function getProductById($id){
        //Câu lệnh sql có điều kiện
        $sql = "SELECT * FROM products WHERE id = $id";
        $stmt = $this->conn->prepare($sql);//Nạp câu sql
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function search($keyword){
        //Tìm kiếm tương đối theo tên sản phẩm
        //:keyword  là name param
        //ORDER BY id ASC là sắp xếp id theo tăng dần
        //ORDER BY id DESC là sắp xếp id theo giảm dần
        $sql = "SELECT * FROM products WHERE name LIKE :keyword ORDER BY id ASC";
        $stmt = $this->conn->prepare($sql);//Nạp câu sql
        $stmt->execute(['keyword' => '%'.$keyword .'%']);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * Model thêm sản phẩm
     */
    public function store($name, $price, $description , $image = "",$status = 1){
        //Dấu `` gọi là backticks, là 1 kỹ thuật sử dụng để tránh SQL injection
        $sql = "INSERT INTO products(`name`, `price`,  `description`, `image`,`status`)
                        VALUES (:name, :price,  :description, :image, :status)";
                        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'description' => $description,
            'status' => $status

        ]);
        return 'Thêm thành công';
    }

    public function update($id, $name, $price, $description, $image = ""){
        $sql = "UPDATE products SET name = :name, price = :price, description = :description, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ]);
        return true;
    }

    public function delete($id){
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;
    }
}