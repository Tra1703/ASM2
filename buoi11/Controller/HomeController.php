<?php
class HomeController{
    public function home(){        
        $page = $_GET['p'] ?? 1;
        $limit = 10;//3 sản phẩm 1 trang
        // $db = new Database();//Test kết nối
        $modelProduct = new Product();
        $allProduct = $modelProduct->getAll($page, $limit);
        $totalProduct = $modelProduct->totalProduct();
        $total = $totalProduct['total'] ?? 0;
        $numPage = ceil($total / $limit) ;
        // echo $numPage;
        //Dùng isset kiểm tra người dùng click nút tìm kiếm hay không
        if(isset($_GET['search'])){
            $keyword = $_GET['keyword'] ?? '';
            $arrSearch = $modelProduct->search($keyword);
            // print_r($arrSearch);die();
        }
        // echo '<pre>';
        // print_r($allProduct);
        include('Views/home.php');
    }
    public function detail(){
        $id = $_GET['id'] ?? 0;//Nếu không tồn tại $_GET['id'] thì lấy mặc định = 0
        // $db = new Database();//Test kết nối
        // echo $id;die();
        $modelProduct = new Product();
        $product_detail = $modelProduct->getProductById($id);
        // print_r($product_detail);die();
        include('Views/detail.php');
    }

    /**
     * Controller thêm sản phẩm
     */
    public function create(){
        //Xử lý thêm sản phẩm
        //Dùng isset để kiểm tra người dùng có click nút thêm hay không
        if(isset($_POST['add'])){
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            $description = $_POST['description'] ?? '';
            $file_image = $_FILES['file_image'] ?? '';
            $image = '';
            // print_r($file_image);//Kiểm tra các tham số của $file_image
            // die();
            if($file_image['name'] != ''){
                $image = $file_image['name'];//Gán tên ảnh bằng tên file upload
                move_uploaded_file($file_image['tmp_name'], 'assets/images/'.$image );//Thực hiện upload
            }
            $modelProduct = new Product();
            $product_detail = $modelProduct->store($name, $price, $description, $image);
            header('Location: index.php');
        }
        include('Views/add.php');
    }

    public function edit(){
        $id = $_GET['id'] ?? 0;
        $modelProduct = new Product();
        $product = $modelProduct->getProductById($id);

        if (isset($_POST['update'])) {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            $description = $_POST['description'] ?? '';
            $file_image = $_FILES['file_image'] ?? '';
            $image = $product['image'];

        if ($file_image['name'] != '') {
            $image = $file_image['name'];
            move_uploaded_file($file_image['tmp_name'], 'assets/images/' . $image);   
        } 

        $modelProduct->update($id, $name, $price, $description, $image);
        header('Location: index.php');       
    
    }
        include('Views/edit.php');
    }

        public function delete(){
        $id = $_GET['id'] ?? 0;
        $modelProduct = new Product();
        $modelProduct->delete($id);
        header('Location: index.php');
        }
    }

    
