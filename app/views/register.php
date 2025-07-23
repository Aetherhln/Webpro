<?php
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/UserView.php';

$controller = new UserController();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $controller->register($_POST);
}
$view = new UserView($controller);
$view->renderRegister(); 