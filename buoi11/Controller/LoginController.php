<?php
class LoginController {
    public function login() {
        if (isset($_POST['login'])) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $userModel = new User();
            $user = $userModel->checkLogin($username, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: index.php'); // login thành công
            } else {
                $error = "Sai tài khoản hoặc mật khẩu!";
            }
        }

        include('Views/login.php');
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?route=login');
    }
}
