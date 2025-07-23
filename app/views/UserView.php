<?php
// View untuk user authentication (register & login)
class UserView {
    private $controller;
    public function __construct($controller) {
        $this->controller = $controller;
    }
    public function renderLogin() {
        $pesan = $this->controller->pesan;
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Login</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://cdn.tailwindcss.com"></script>
        </head>
        <body class="bg-gradient-to-br from-purple-200 via-purple-50 to-white min-h-screen flex items-center justify-center">
            <div class="w-full max-w-md mx-auto">
                <div class="bg-white rounded-2xl shadow-2xl p-8 border border-purple-100 flex flex-col items-center">
                    <img src="logo.jpg" alt="Logo" class="w-16 h-16 rounded-full border-4 border-purple-300 shadow mb-4 bg-white object-cover">
                    <h2 class="text-3xl font-extrabold text-purple-700 mb-2 text-center">Login</h2>
                    <p class="text-purple-400 mb-4 text-center">Masuk ke dashboard klub basket</p>
                    <?php if (!empty($pesan)): ?>
                        <div class="w-full mb-4 text-center"> <?php echo $pesan; ?> </div>
                    <?php endif; ?>
                    <form method="post" class="space-y-4 w-full">
                        <div>
                            <label class="block text-purple-700 font-semibold mb-1">Username</label>
                            <input type="text" name="username" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 bg-purple-50 focus:outline-none focus:ring-2 focus:ring-purple-400" required autofocus>
                        </div>
                        <div>
                            <label class="block text-purple-700 font-semibold mb-1">Password</label>
                            <input type="password" name="password" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 bg-purple-50 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
                        </div>
                        <button type="submit" name="login" class="w-full bg-gradient-to-r from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800 text-white font-bold px-8 py-2 rounded-lg shadow-lg transition-all duration-200">Login</button>
                    </form>
                    <div class="mt-4 text-center text-sm">
                        Belum punya akun? <a href="register.php" class="text-purple-700 font-semibold hover:underline">Register</a>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
    public function renderRegister() {
        $pesan = $this->controller->pesan;
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Register</title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>
        <body class="bg-gradient-to-br from-purple-100 via-purple-50 to-white min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md border border-purple-100">
                <h2 class="text-2xl font-bold text-purple-700 mb-6 text-center">Register</h2>
                <?php if (!empty($pesan)) echo $pesan; ?>
                <form method="post" class="space-y-4">
                    <div>
                        <label class="block text-purple-700 font-semibold mb-1">Username</label>
                        <input type="text" name="username" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 bg-purple-50" required>
                    </div>
                    <div>
                        <label class="block text-purple-700 font-semibold mb-1">Password</label>
                        <input type="password" name="password" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 bg-purple-50" required>
                    </div>
                    <div>
                        <label class="block text-purple-700 font-semibold mb-1">Ulangi Password</label>
                        <input type="password" name="password2" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 bg-purple-50" required>
                    </div>
                    <button type="submit" name="register" class="w-full bg-gradient-to-r from-purple-500 to-purple-700 text-white font-bold px-8 py-2 rounded-lg shadow-lg">Register</button>
                </form>
                <div class="mt-4 text-center text-sm">
                    Sudah punya akun? <a href="login.php" class="text-purple-700 font-semibold">Login</a>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
} 