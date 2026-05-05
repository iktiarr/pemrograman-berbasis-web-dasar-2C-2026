<?php

$daftarTulisan = [
    [
        "judul" => "Belajar HTML Pertama Kali",
        "tanggal" => "01 Mei 2026",
        "isi" => "Awalnya bingung dengan tag-tag seperti div dan section, tapi setelah dicoba ternyata sangat logis.",
        "gambar" => "gambar/3.webp" 
    ],
    [
        "judul" => "Error Pertama",
        "tanggal" => "02 Mei 2026",
        "isi" => "Lupa menutup tag atau kurang titik koma sempat membuat pusing, tapi dari sana saya belajar teliti.",
        "gambar" => "gambar/1.jpg" 
    ]
];

$kumpulanMotivasi = [
    "Koding hari ini, istirahat nanti.",
    "Setiap error adalah langkah menuju kesuksesan.",
    "Satu baris kode lebih baik daripada seribu ide tanpa eksekusi."
];
$kutipanAcak = $kumpulanMotivasi[array_rand($kumpulanMotivasi)];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Reflektif</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 p-6 md:p-12 text-gray-800">

    <div class="max-w-4xl mx-auto">
        <header class="text-center mb-12">
            <h1 class="text-3xl font-black text-gray-800">
                Blog Reflektif Developer
            </h1>
            <br>
            <p class="mt-4 text-sm text-blue-600 font-medium px-4 py-2">
                "<?= $kutipanAcak ?>"
            </p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="bg-white p-6 rounded-2xl">
                    <h3 class="font-bold text-gray-800 mb-4 uppercase text-xs pb-2">Daftar Artikel</h3>
                
                    <ul class="space-y-3">
                        <?php foreach ($daftarTulisan as $indeks => $tulisan): ?>
                            <li>
                                <a href="blog.php?id=<?= $indeks ?>" 
                                   class="block text-sm p-3 rounded-xl <?= isset($_GET['id']) && $_GET['id'] == $indeks ? 'text-black font-bold' : 'text-black' ?>">
                                    <?= $tulisan['judul'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="mt-6 text-center">
                        <a href="blog.php" class="text-xs font-bold text-blue-500">Beranda</a>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white p-8 rounded-2xl min-h-[400px]">
                    <?php 
                    if (isset($_GET['id']) && isset($daftarTulisan[$_GET['id']])): 
                        $pilihan = $daftarTulisan[$_GET['id']];
                    ?>
                        <h2 class="text-2xl font-bold text-gray-800 mb-1"><?= $pilihan['judul'] ?></h2>
                        <span class="text-xs text-gray-400 block mb-6">Diposting: <?= $pilihan['tanggal'] ?></span>
                        
                        <p class="text-gray-600 leading-relaxed mb-8 text-sm">
                            <?= $pilihan['isi'] ?>
                        </p>

                        <div class="rounded-2xl overflow-hidden  mb-6">
                            <img src="<?= $pilihan['gambar'] ?>" alt="Gambar <?= $pilihan['judul'] ?>" class="w-full h-auto object-cover">
                        </div>

                        <div class="pt-6 flex justify-between items-center">
                            <a href="https://w3schools.com" target="_blank" class="text-blue-600 text-xs font-bold">
                                Pelajari Dasar PHP Lebih Lanjut →
                            </a>
                        </div>

                    <?php else: ?>
                        <div class="flex flex-col items-center justify-center h-full text-center py-20">
                            <p class="text-gray-400 font-medium">Silakan pilih tulisan di samping untuk mulai membaca.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-6 border-gray-200 flex justify-between">
            <a href="timeline.php">Halaman Timeline</a>
            <a href="index.php">Halaman Profil</a>
        </div>
    </div>

</body>
</html>