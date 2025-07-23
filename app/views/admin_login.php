<?php
session_start();
require_once 'models/UserModel.php';
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php');
    exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username === 'admin') {
        $userModel = new UserModel();
        $user = $userModel->verifyUser($username, $password);
        if ($user) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $user['username'];
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $error = 'Password salah!';
        }
    } else {
        $error = 'Username tidak valid!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 via-white to-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center text-purple-700">Login Admin</h2>
        <?php if ($error): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Username</label>
                <input type="text" name="username" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-200" required autofocus>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-200" required>
            </div>
            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition-all duration-200">Login</button>
        </form>
    </div>
</body>
</html> 