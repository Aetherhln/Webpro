<?php
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/UserView.php';
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] === 'admin') {
        header('Location: admin_dashboard.php');
        exit;
    } else {
        header('Location: index.php');
        exit;
    }
}
$controller = new UserController();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if ($controller->login($_POST)) {
        if ($_SESSION['user'] === 'admin') {
            header('Location: admin_dashboard.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
}
$view = new UserView($controller);
$view->renderLogin(); 