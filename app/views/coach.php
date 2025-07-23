<?php // Tidak perlu session_start di sini, sudah dihandle index.php ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Coach Klub Basket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-transparent font-sans">
    <div class="flex justify-center items-start min-h-screen pt-12">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 max-w-2xl w-full">
            <h1 class="text-3xl font-extrabold text-purple-800 mb-6 text-center">Daftar Coach Klub Basket</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex flex-col items-center">
                    <img src="adith.jpg" alt="Coach Adith Anugrah Pratama" class="w-24 h-24 rounded-full border-4 border-purple-300 shadow mb-2 object-cover">
                    <span class="font-bold text-lg text-purple-700">Coach Adith Anugrah Pratama</span>
                    <span class="text-sm text-gray-500 mb-2">Head Coach</span>
                    <p class="text-gray-700 text-center text-sm">Berpengalaman lebih dari 15 tahun melatih tim basket nasional dan membawa klub ke berbagai kejuaraan tingkat provinsi dan nasional.</p>
                </div>
                <div class="flex flex-col items-center">
                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Coach B" class="w-24 h-24 rounded-full border-4 border-purple-300 shadow mb-2 object-cover">
                    <span class="font-bold text-lg text-purple-700">Coach Budi Santoso</span>
                    <span class="text-sm text-gray-500 mb-2">Assistant Coach</span>
                    <p class="text-gray-700 text-center text-sm">Spesialis pengembangan fisik dan teknik dasar, serta sangat berpengalaman membina pemain muda berbakat.</p>
                </div>
                <div class="flex flex-col items-center">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Coach C" class="w-24 h-24 rounded-full border-4 border-purple-300 shadow mb-2 object-cover">
                    <span class="font-bold text-lg text-purple-700">Coach Clara Wijaya</span>
                    <span class="text-sm text-gray-500 mb-2">Skill Development Coach</span>
                    <p class="text-gray-700 text-center text-sm">Ahli dalam pengembangan skill individu, shooting, dan strategi permainan modern.</p>
                </div>
                <div class="flex flex-col items-center">
                    <img src="https://randomuser.me/api/portraits/men/77.jpg" alt="Coach D" class="w-24 h-24 rounded-full border-4 border-purple-300 shadow mb-2 object-cover">
                    <span class="font-bold text-lg text-purple-700">Coach Dimas Saputra</span>
                    <span class="text-sm text-gray-500 mb-2">Tactical Coach</span>
                    <p class="text-gray-700 text-center text-sm">Fokus pada strategi tim, analisis lawan, dan pengembangan taktik pertandingan.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 