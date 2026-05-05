<?php

function baru($tahun, $target) {
    if ($tahun == $target) {
        return "<span class='bg-blue-600 text-white px-3 py-1 rounded-md text-xs font-bold shadow-sm'>$tahun</span>";
    }
    return "<span class='text-blue-600 font-black text-lg'>$tahun</span>";
}

$riwayat = [
    "2023" => "Memulai kuliah di Sistem Informasi UTM.",
    "2024" => "Belajar dasar pemrograman (HTML, CSS, dan Logika).",
    "2025" => "Mulai terlibat dalam proyek pengembangan web.",
    "2026" => "Fokus pada persiapan karir dan sertifikasi.",
    "2027" => "Target mulai berkarir sebagai Fullstack Developer."
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Belajar</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 p-6 md:p-12">

    <div class="max-w-xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-gray-800 uppercase">
                Riwayat Belajar
            </h2>
        </div>

        <div class="bg-white p-8 rounded-xl relative border-gray-200 ml-5">
            <?php foreach ($riwayat as $tahun => $info): ?>
                <div class="mb-10 ml-6 relative">
                    <div class="mb-2">
                        <?= baru($tahun, "2026") ?>
                    </div>
                    
                    <p class="text-gray-600 text-sm leading-relaxed">
                        <?= $info ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 pt-6 border-gray-200 flex justify-between">
            <a href="index.php">Halaman Profil</a>
            <a href="blog.php">Halaman Blog</a>
        </div>
    </div>

</body>
</html>