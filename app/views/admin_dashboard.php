<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header('Location: login.php');
    exit;
}
require_once 'koneksi.php';
$anggota = [];
$sql = "SELECT * FROM anggota ORDER BY nama_lengkap ASC";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $anggota[] = $row;
    }
}
// Statistik
$total_anggota = count($anggota);
$total_laki = 0;
$total_perempuan = 0;
foreach ($anggota as $a) {
    if (strtolower($a['jenis_kelamin']) === 'laki-laki') $total_laki++;
    if (strtolower($a['jenis_kelamin']) === 'perempuan') $total_perempuan++;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-purple-50 to-white min-h-screen font-sans">
    <header class="bg-white shadow flex items-center justify-between px-8 py-4">
        <div class="flex items-center gap-4">
            <img src="logo.jpg" alt="Logo" class="w-12 h-12 rounded-full border-2 border-purple-400 shadow">
            <div>
                <div class="text-xl font-extrabold text-purple-700">Dashboard Admin</div>
                <div class="text-sm text-purple-400">Selamat datang, <span class="font-bold">admin</span>!</div>
            </div>
        </div>
        <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow transition-all duration-200">Logout</a>
    </header>
    <main class="max-w-5xl mx-auto py-8 px-4">
        <section class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="text-3xl font-bold text-purple-700"><?php echo $total_anggota; ?></div>
                <div class="text-gray-500">Total Anggota</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="text-3xl font-bold text-blue-600"><?php echo $total_laki; ?></div>
                <div class="text-gray-500">Laki-laki</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="text-3xl font-bold text-pink-500"><?php echo $total_perempuan; ?></div>
                <div class="text-gray-500">Perempuan</div>
            </div>
        </section>
        <section>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold text-purple-700 mb-4">Daftar Anggota Klub</h2>
                <div class="overflow-x-auto">
                <table class="min-w-full border border-purple-200 rounded-lg">
                    <thead class="bg-purple-100">
                        <tr>
                            <th class="px-4 py-2 border-b text-left">No</th>
                            <th class="px-4 py-2 border-b text-left">Nama</th>
                            <th class="px-4 py-2 border-b text-left">Email</th>
                            <th class="px-4 py-2 border-b text-left">Telepon</th>
                            <th class="px-4 py-2 border-b text-left">Usia</th>
                            <th class="px-4 py-2 border-b text-left">Jenis Kelamin</th>
                            <th class="px-4 py-2 border-b text-left">Posisi</th>
                            <th class="px-4 py-2 border-b text-left">Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($anggota)): ?>
                            <tr><td colspan="8" class="text-center text-gray-400 py-4">Belum ada anggota terdaftar.</td></tr>
                        <?php else: ?>
                            <?php foreach ($anggota as $i => $a): ?>
                                <tr class="hover:bg-purple-50">
                                    <td class="px-4 py-2 border-b"><?php echo $i+1; ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($a['nama_lengkap']); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($a['email']); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($a['telepon']); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($a['usia']); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($a['jenis_kelamin']); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($a['posisi']); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($a['tanggal_daftar']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html> 