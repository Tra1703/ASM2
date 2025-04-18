<?php
class Database{
    public $conn;
    function __construct()
    {
        $servername = 'localhost';
        $dbname = 'asm_php1';
        $username = 'root';
        $password = '';
        try{
            $this->conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password); 
            // echo 'Kết nối thành công';  
        }catch(Exception $e){
            echo 'Lỗi kết nối<br>';
            echo $e->getMessage();
        }
    }

}