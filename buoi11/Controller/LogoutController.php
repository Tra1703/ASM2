<?php
class LogoutController {
    public function logout() {
        session_start(); // Bắt đầu session
        session_destroy(); // Hủy toàn bộ session
        header('Location: index.php?route=login'); // Quay về trang đăng nhập
        exit;
    }
}
