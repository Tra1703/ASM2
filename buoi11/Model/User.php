<?php
class User extends Database {
    public function checkLogin($username, $password){
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'password' => md5($password) // phải mã hóa giống như trong DB
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // nếu không có, trả về false/null
    }
}
