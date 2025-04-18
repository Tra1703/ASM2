<?php
require_once('Controller/HomeController.php');
require_once('Model/Database.php');
require_once('Model/Product.php');
$route = $_GET['route'] ?? 'home';//Lấy tham số từ url, mặc định là home
require_once('Model/User.php');
require_once('Controller/LoginController.php');
require_once('Controller/LogoutController.php');


switch($route){
    case 'home':
        $homeController = new HomeController();
        $homeController->home();
        break;

    case 'detail':
        $homeController = new HomeController();
        $homeController->detail();
        break;
    case 'add':
        $homeController = new HomeController();
        $homeController->create();
        break;
    case'edit':
        $homeController = new HomeController();
        $homeController->edit();
        break;
    case'delete':
        $homeController = new HomeController();
        $homeController->delete();
        break;
    case 'login':
        $loginController = new LoginController();
        $loginController->login();
        break;
    case 'logout':
        $loginController = new LoginController();
        $loginController->logout();
        break;
        
}
