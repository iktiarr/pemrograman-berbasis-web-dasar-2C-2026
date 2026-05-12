<?php
include 'auth/check.php';
include 'config/db.php';

if($_SESSION['user']['peran']!='admin'){
    echo "<script>
    alert('Akses ditolak! Anda bukan admin');
    window.location='dashboard.php';
    </script>";
    exit();
}

if($_POST){

    if($_POST['harga'] < 10000){
        echo "<script>alert('Harga minimal Rp10.000');history.back();</script>";
        exit();
    }

    $stmt=$conn->prepare("INSERT INTO buku
    (judul,penulis,kategori,harga,tanggal_terbit,deskripsi)
    VALUES(?,?,?,?,?,?)");

    $stmt->bind_param(
    "sssiss",
    $_POST['judul'],
    $_POST['penulis'],
    $_POST['kategori'],
    $_POST['harga'],
    $_POST['tanggal_terbit'],
    $_POST['deskripsi']
    );

    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Buku</title>
</head>

<body class="bg-gradient-to-r from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-2xl">

    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-8">
        Tambah Buku
    </h2>

    <form method="POST" class="space-y-5">

        <input name="judul" required
        placeholder="Judul Buku"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400">

        <input name="penulis" required
        placeholder="Nama Penulis"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400">

        <input name="kategori"
        placeholder="Kategori"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400">

        <input
        type="number"
        name="harga"
        min="10000"
        required
        placeholder="Minimal Rp10.000"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400">

        <input type="date" name="tanggal_terbit"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400">

        <textarea name="deskripsi"
        placeholder="Deskripsi Buku"
        rows="4"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-400"></textarea>

        <div class="flex gap-4">

            <a href="dashboard.php"
            class="w-1/2 bg-gray-400 text-white p-3 rounded-lg text-center hover:bg-gray-500">
                Kembali
            </a>

            <button
            class="w-1/2 bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-700">
                Simpan Buku
            </button>

        </div>

    </form>

</div>

</body>
</html>