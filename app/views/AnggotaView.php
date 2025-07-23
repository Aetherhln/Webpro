<?php
class AnggotaView
{
    private $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function render()
    {
        $anggotaList = $this->controller->anggotaList;
        $pesan = $this->controller->pesan;
        $editData = $this->controller->editData;
        $isEdit = isset($editData) && $editData;
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Dashboard Pendaftaran Klub Basket</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://cdn.tailwindcss.com"></script>
            <link rel="icon" href="logo.jpg" type="image/jpeg">
            <style>
                ::-webkit-scrollbar {
                    width: 8px;
                    background: #ede9fe;
                }
                ::-webkit-scrollbar-thumb {
                    background: #a78bfa;
                    border-radius: 8px;
                }
                .card-hover:hover {
                    box-shadow: 0 8px 32px 0 rgba(168,139,250,0.25);
                    transform: translateY(-2px) scale(1.01);
                    transition: all 0.2s;
                }
                .table-row-hover:hover {
                    background: #f3e8ff;
                    transition: background 0.2s;
                }
            </style>
        </head>
        <body class="bg-gradient-to-br from-purple-100 via-purple-50 to-white min-h-screen font-sans">
            <div class="container mx-auto px-4 py-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
                    <h1 class="text-4xl font-extrabold text-purple-800 mb-4 md:mb-0 flex items-center drop-shadow">
                        <img src="logo.jpg" alt="Logo Klub Basket" class="w-12 h-12 mr-3 rounded-full border-4 border-purple-300 shadow-lg bg-white object-cover">
                        Dashboard Pendaftaran Klub Basket
                    </h1>
                    <div class="hidden md:block">
                        <span class="inline-block bg-purple-200 text-purple-800 px-4 py-2 rounded-full font-semibold shadow">#BasketSquad</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <!-- Formulir Pendaftaran -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 card-hover border border-purple-100">
                        <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
                            Formulir Pendaftaran
                        </h2>
                        <?php if (!empty($pesan)) : ?>
                            <div><?php echo $pesan; ?></div>
                        <?php endif; ?>
                        <form method="post" class="space-y-4">
                            <?php if ($isEdit): ?>
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($editData['id']); ?>">
                            <?php endif; ?>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-purple-700 font-semibold mb-1">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50" required value="<?php echo $isEdit ? htmlspecialchars($editData['nama_lengkap']) : ''; ?>">
                                </div>
                                <div>
                                    <label class="block text-purple-700 font-semibold mb-1">Email</label>
                                    <input type="email" name="email" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50" required value="<?php echo $isEdit ? htmlspecialchars($editData['email']) : ''; ?>">
                                </div>
                                <div>
                                    <label class="block text-purple-700 font-semibold mb-1">Telepon</label>
                                    <input type="text" name="telepon" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50" required value="<?php echo $isEdit ? htmlspecialchars($editData['telepon']) : ''; ?>">
                                </div>
                                <div>
                                    <label class="block text-purple-700 font-semibold mb-1">Usia</label>
                                    <input type="number" name="usia" min="10" max="60" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50" required value="<?php echo $isEdit ? htmlspecialchars($editData['usia']) : ''; ?>">
                                </div>
                                <div>
                                    <label class="block text-purple-700 font-semibold mb-1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50" required>
                                        <option value="">Pilih</option>
                                        <option value="Laki-laki" <?php echo ($isEdit && $editData['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?php echo ($isEdit && $editData['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-purple-700 font-semibold mb-1">Tinggi Badan (cm)</label>
                                    <input type="number" name="tinggi_badan" min="100" max="250" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50" required value="<?php echo $isEdit ? htmlspecialchars($editData['tinggi_badan']) : ''; ?>">
                                </div>
                                <div>
                                    <label class="block text-purple-700 font-semibold mb-1">Posisi</label>
                                    <select name="posisi" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50" required>
                                        <option value="">Pilih Posisi</option>
                                        <option value="Point Guard" <?php echo ($isEdit && $editData['posisi'] == 'Point Guard') ? 'selected' : ''; ?>>Point Guard</option>
                                        <option value="Shooting Guard" <?php echo ($isEdit && $editData['posisi'] == 'Shooting Guard') ? 'selected' : ''; ?>>Shooting Guard</option>
                                        <option value="Small Forward" <?php echo ($isEdit && $editData['posisi'] == 'Small Forward') ? 'selected' : ''; ?>>Small Forward</option>
                                        <option value="Power Forward" <?php echo ($isEdit && $editData['posisi'] == 'Power Forward') ? 'selected' : ''; ?>>Power Forward</option>
                                        <option value="Center" <?php echo ($isEdit && $editData['posisi'] == 'Center') ? 'selected' : ''; ?>>Center</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-purple-700 font-semibold mb-1">Pengalaman</label>
                                    <textarea name="pengalaman" rows="2" class="w-full border-2 border-purple-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50" required><?php echo $isEdit ? htmlspecialchars($editData['pengalaman']) : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="flex justify-end gap-2 pt-2">
                                <?php if ($isEdit): ?>
                                    <button type="submit" name="update" class="bg-gradient-to-r from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800 text-white font-bold px-8 py-2 rounded-lg shadow-lg transition-all duration-200 flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        Update
                                    </button>
                                    <a href="?" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-6 py-2 rounded-lg shadow transition-all duration-200">Batal</a>
                                <?php else: ?>
                                    <button type="submit" name="daftar" class="bg-gradient-to-r from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800 text-white font-bold px-8 py-2 rounded-lg shadow-lg transition-all duration-200 flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        Daftar
                                    </button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    <!-- Daftar Anggota Terdaftar -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 card-hover border border-purple-100">
                        <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
                            Daftar Anggota Terdaftar
                        </h2>
                        <div class="overflow-x-auto rounded-lg border border-purple-100 shadow-inner">
                            <table class="min-w-full divide-y divide-purple-200 text-sm">
                                <thead class="bg-gradient-to-r from-purple-100 to-purple-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">No</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Nama Lengkap</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Email</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Telepon</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Usia</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Jenis Kelamin</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Tinggi Badan</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Posisi</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Pengalaman</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Tanggal Daftar</th>
                                        <th class="px-4 py-3 text-left font-bold text-purple-700 uppercase">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-purple-100">
                                    <?php if (!empty($anggotaList)) : ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($anggotaList as $anggota) : ?>
                                            <tr class="table-row-hover">
                                                <td class="px-4 py-3"><?php echo $no++; ?></td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['nama_lengkap']); ?></td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['email']); ?></td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['telepon']); ?></td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['usia']); ?></td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['jenis_kelamin']); ?></td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['tinggi_badan']); ?> cm</td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['posisi']); ?></td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['pengalaman']); ?></td>
                                                <td class="px-4 py-3"><?php echo htmlspecialchars($anggota['tanggal_daftar']); ?></td>
                                                <td class="px-4 py-3 flex gap-2">
                                                    <a href="?edit=<?php echo $anggota['id']; ?>" class="bg-yellow-200 hover:bg-yellow-300 text-yellow-800 font-bold px-3 py-1 rounded shadow transition-all duration-200">Edit</a>
                                                    <form method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                        <input type="hidden" name="hapus" value="<?php echo $anggota['id']; ?>">
                                                        <button type="submit" class="bg-red-200 hover:bg-red-400 text-red-800 font-bold px-3 py-1 rounded shadow transition-all duration-200">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="11" class="px-4 py-8 text-center text-gray-400 font-semibold">
                                                Belum ada anggota yang terdaftar.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <footer class="mt-12 text-center text-purple-400 text-xs">
                    &copy; 2025 Klub Basket. Dibuat dengan <span class="text-pink-400">❤</span> oleh Tim PemWeb.
                </footer>
            </div>
        </body>
        </html>
        <?php
    }
}
?>
