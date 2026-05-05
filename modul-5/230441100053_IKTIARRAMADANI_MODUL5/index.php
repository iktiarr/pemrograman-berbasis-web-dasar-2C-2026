<?php

$hasil_data = null;
$pesan_khusus = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['input_framework']) && !empty($_POST['input_pengalaman']) && !empty($_POST['input_minat'])) {
        
        $input_teks = $_POST['input_framework'];
        $daftar_framework = explode(",", $input_teks);
        
        if (count($daftar_framework) > 2) {
            $pesan_khusus = "Skill Anda cukup luas di bidang development!";
        }

        $hasil_data = [
            "framework"  => implode(", ", $daftar_framework),
            "minat"      => $_POST['input_minat'],
            "alat"       => isset($_POST['input_alat']) ? implode(", ", $_POST['input_alat']) : "-",
            "tingkat"    => $_POST['input_tingkat'],
            "pengalaman" => htmlspecialchars($_POST['input_pengalaman'])
        ];
    } else {
        echo "<script>alert('Mohon isi semua kolom yang wajib!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Interaktif Developer</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 p-6 md:p-12 text-gray-800">

    <div class="max-w-2xl mx-auto space-y-8">
        <div class="bg-white p-8 rounded-xl">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 uppercase">
                Profil Interaktif Developer Pemula
            </h2>
            <div class="grid grid-cols-1 gap-3 text-sm">
                <div class="flex border-b border-gray-50 pb-2">
                    <span class="font-bold w-50">Nama</span>
                    <span class="text-gray-600">Iktiar Ramadani</span>
                </div>
                <div class="flex border-b border-gray-50 pb-2">
                    <span class="font-bold w-50">ID Developer</span>
                    <span class="text-gray-600">DEV-2026-UTM</span>
                </div>
                <div class="flex border-b border-gray-50 pb-2">
                    <span class="font-bold w-50">Kota/Tgl Lahir</span>
                    <span class="text-gray-600">Pamekasan, 7 April 2004</span>
                </div>
                <div class="flex border-b border-gray-50 pb-2">
                    <span class="font-bold w-50">Email</span>
                    <span class="text-gray-600">iktiar@student.trunojoyo.ac.id</span>
                </div>
                <div class="flex">
                    <span class="font-bold w-50">WhatsApp</span>
                    <span class="text-gray-600">081081081081</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-xl">
            <h3 class="text-lg font-bold mb-6 text-blue-600">Form Isian Dinamis</h3>
            <form method="POST" class="space-y-5 text-sm">
                <div>
                    <label class="block font-bold mb-2">Framework </label>
                    <input type="text" name="input_framework" class="w-full border border-gray-200 p-3 rounded-xl" required>
                </div>

                <div>
                    <label class="block font-bold mb-2">Cerita Pengalaman</label>
                    <textarea name="input_pengalaman" rows="4" class="w-full border border-gray-200 p-3 rounded-xl" required></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-bold mb-3">Tools</label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2"><input type="checkbox" name="input_alat[]" value="VS Code"> VS Code</label>
                            <label class="flex items-center gap-2"><input type="checkbox" name="input_alat[]" value="GitHub"> GitHub</label>
                            <label class="flex items-center gap-2"><input type="checkbox" name="input_alat[]" value="Figma"> Figma</label>
                        </div>
                    </div>

                    <div>
                        <label class="block font-bold mb-3">Minat Bidang</label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2"><input type="radio" name="input_minat" value="Frontend" required> Frontend</label>
                            <label class="flex items-center gap-2"><input type="radio" name="input_minat" value="Backend"> Backend</label>
                            <label class="flex items-center gap-2"><input type="radio" name="input_minat" value="Fullstack"> Fullstack</label>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block font-bold mb-2">Tingkat Skill Coding</label>
                    <select name="input_tingkat" class="w-full border border-gray-200 p-3 rounded-xl bg-white">
                        <option value="Dasar">Dasar</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Profesional">Profesional</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3">
                    Simpan
                </button>
            </form>
        </div>

        <?php if ($hasil_data): ?>
            <div class="bg-white p-8 rounded-xl">
                <h3 class="text-lg font-bold mb-4 text-gray-800">HASIL</h3>

                <?php if ($pesan_khusus): ?>
                    <p class="p-5 text-sm text-center">
                        "<?php echo $pesan_khusus; ?>"
                    </p>
                <?php endif; ?>

                <div class="grid grid-cols-1 gap-4 text-sm mb-6">
                    <div class="flex border-b border-gray-50 pb-2">
                        <span class="font-bold w-50 text-gray-500">Framework</span>
                        <span class="text-gray-800"><?php echo $hasil_data['framework']; ?></span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-2">
                        <span class="font-bold w-50 text-gray-500">Minat Bidang</span>
                        <span class="text-gray-800"><?php echo $hasil_data['minat']; ?></span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-2">
                        <span class="font-bold w-50 text-gray-500">Tools</span>
                        <span class="text-gray-800"><?php echo $hasil_data['alat']; ?></span>
                    </div>
                    <div class="flex">
                        <span class="font-bold w-50 text-gray-500">Tingkat Skill</span>
                        <span class="text-gray-800"><?php echo $hasil_data['tingkat']; ?></span>
                    </div>
                </div>

                <div class="pt-4">
                    <p class="font-bold mb-2">Cerita Pengalaman:</p>
                    <p class="text-gray-600 leading-relaxed text-sm p-4 rounded-xl">
                        <?php echo $hasil_data['pengalaman']; ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>

        <div class="mt-12 pt-6 border-gray-200 flex justify-between">
            <a href="timeline.php">Halaman Timeline</a>
            <a href="blog.php">Halaman Blog</a>
        </div>
    </div>

</body>
</html>