<?php
require_once 'controllers/AnggotaController.php';
require_once 'views/AnggotaView.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 'daftar';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Klub Basket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-purple-50 to-white min-h-screen font-sans">
    <a href="logout.php" class="fixed top-4 right-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-200">Logout</a>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-white border-r border-purple-100 shadow-lg flex flex-col py-8 px-4">
            <div class="flex flex-col items-center mb-8">
                <img src="logo.jpg" alt="Logo Klub Basket" class="w-16 h-16 rounded-full border-4 border-purple-300 shadow mb-2 bg-white object-cover">
                <span class="text-xl font-extrabold text-purple-700">Klub Basket</span>
                <span class="text-xs text-purple-400 mt-1">Dashboard</span>
            </div>
            <a href="?page=daftar" class="mb-2 px-4 py-2 rounded-lg font-semibold transition-all duration-200 <?php echo $page=='daftar' ? 'bg-purple-100 text-purple-700' : 'text-gray-700 hover:bg-purple-50'; ?>">Daftar Anggota</a>
            <a href="?page=tentang" class="mb-2 px-4 py-2 rounded-lg font-semibold transition-all duration-200 <?php echo $page=='tentang' ? 'bg-purple-100 text-purple-700' : 'text-gray-700 hover:bg-purple-50'; ?>">Tentang Klub</a>
            <a href="?page=coach" class="mb-2 px-4 py-2 rounded-lg font-semibold transition-all duration-200 <?php echo $page=='coach' ? 'bg-purple-100 text-purple-700' : 'text-gray-700 hover:bg-purple-50'; ?>">Coach</a>
        </nav>
        <!-- Main Content -->
        <main class="flex-1 p-8">
            <?php
            if ($page === 'tentang') {
                include 'tentang.php';
            } elseif ($page === 'coach') {
                include 'coach.php';
            } else {
                // Proses CRUD anggota
                $controller = new AnggotaController();
                if (isset($_GET['edit'])) {
                    $controller->getEditData(intval($_GET['edit']));
                } elseif (isset($_GET['delete'])) {
                    $controller->prosesHapus(intval($_GET['delete']));
                    header("Location: index.php?page=daftar");
                    exit;
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['daftar'])) {
                        $controller->prosesTambah($_POST);
                    } elseif (isset($_POST['update']) && isset($_POST['id'])) {
                        $controller->prosesEdit(intval($_POST['id']), $_POST);
                        header("Location: index.php?page=daftar");
                        exit;
                    } elseif (isset($_POST['hapus'])) {
                        $controller->prosesHapus(intval($_POST['hapus']));
                        header("Location: index.php?page=daftar");
                        exit;
                    }
                }
                $view = new AnggotaView($controller);
                $view->render();
            }
            ?>
        </main>
    </div>
</body>
</html>
