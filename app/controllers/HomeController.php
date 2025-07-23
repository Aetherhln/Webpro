<?php
require_once __DIR__ . '/../controllers/AnggotaController.php';
require_once __DIR__ . '/../views/AnggotaView.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../views/UserView.php';
class HomeController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            include __DIR__ . '/../views/landing.php';
        } else {
            $controller = new AnggotaController();
            $view = new AnggotaView($controller);
            $view->render();
        }
    }
} 