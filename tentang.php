<?php // Tidak perlu session_start atau pengecekan login di sini, sudah dihandle index.php ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Klub Basket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-transparent font-sans">
    <div class="flex justify-center items-start min-h-screen pt-12">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 max-w-2xl w-full">
            <div class="flex flex-col items-center mb-6">
                <img src="logo.jpg" alt="Logo Klub Basket" class="w-20 h-20 rounded-full border-4 border-purple-300 shadow mb-4 bg-white object-cover">
                <h1 class="text-3xl font-extrabold text-purple-800 mb-2 text-center">Tentang Klub Basket</h1>
            </div>
            <p class="text-gray-700 mb-4 text-justify">
                Klub Basket kami berdiri sejak tahun 2010 dan telah menjadi wadah bagi para pecinta olahraga basket di kota ini. Dengan semangat kebersamaan dan sportivitas, klub ini terus berkembang dan menjadi salah satu klub basket terbaik di daerah.
            </p>
            <h2 class="text-xl font-bold text-purple-700 mt-6 mb-2">Visi</h2>
            <p class="mb-4 text-gray-700">Menjadi klub basket yang unggul, berprestasi, dan berkontribusi positif bagi masyarakat serta menginspirasi generasi muda untuk hidup sehat dan aktif.</p>
            <h2 class="text-xl font-bold text-purple-700 mt-6 mb-2">Misi</h2>
            <ul class="list-disc pl-6 text-gray-700 mb-4">
                <li>Mengembangkan bakat dan potensi anggota dalam olahraga basket.</li>
                <li>Mengadakan pelatihan rutin dan kompetisi internal maupun eksternal.</li>
                <li>Membangun karakter, disiplin, dan kerjasama tim.</li>
                <li>Menjadi komunitas yang inklusif dan ramah bagi semua kalangan.</li>
            </ul>
            <h2 class="text-xl font-bold text-purple-700 mt-6 mb-2">Keunggulan Klub</h2>
            <ul class="list-disc pl-6 text-gray-700 mb-6">
                <li>Pelatih profesional dan berpengalaman.</li>
                <li>Fasilitas latihan lengkap dan modern.</li>
                <li>Jaringan kompetisi yang luas.</li>
                <li>Lingkungan yang mendukung pengembangan diri.</li>
            </ul>
        </div>
    </div>
</body>
</html> 