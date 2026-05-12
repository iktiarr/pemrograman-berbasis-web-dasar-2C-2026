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

$id = $_GET['id'];

if($_POST){

if($_POST['harga'] < 10000){
echo "<script>alert('Harga minimal Rp10.000');history.back();</script>";
exit();
}

$stmt=$conn->prepare("UPDATE buku 
SET judul=?,penulis=?,kategori=?,harga=?,tanggal_terbit=?,deskripsi=? 
WHERE id=?");

$stmt->bind_param(
"sssissi",
$_POST['judul'],
$_POST['penulis'],
$_POST['kategori'],
$_POST['harga'],
$_POST['tanggal_terbit'],
$_POST['deskripsi'],
$id
);

$stmt->execute();

header("Location: dashboard.php");
exit();
}
$data=$conn->query("SELECT * FROM buku WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
<title>Edit Buku</title>
</head>

<body class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-2xl">

<h2 class="text-3xl font-bold text-center text-indigo-700 mb-8">
Edit Buku
</h2>

<form method="POST" class="space-y-5">

<input name="judul"
value="<?= htmlspecialchars($data['judul']) ?>"
required
class="w-full p-3 border rounded-lg">

<input name="penulis"
value="<?= htmlspecialchars($data['penulis']) ?>"
required
class="w-full p-3 border rounded-lg">

<input name="kategori"
value="<?= htmlspecialchars($data['kategori']) ?>"
class="w-full p-3 border rounded-lg">

<input
type="number"
name="harga"
min="10000"
value="<?= htmlspecialchars($data['harga']) ?>"
required
class="w-full p-3 border rounded-lg">

<input type="date"
name="tanggal_terbit"
value="<?= htmlspecialchars($data['tanggal_terbit']) ?>"
class="w-full p-3 border rounded-lg">

<textarea name="deskripsi"
rows="4"
class="w-full p-3 border rounded-lg"><?= htmlspecialchars($data['deskripsi']) ?></textarea>

<div class="flex gap-4">

<a href="dashboard.php"
class="w-1/2 bg-gray-400 text-white p-3 rounded-lg text-center">
Kembali
</a>

<button
class="w-1/2 bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-700">
Update Buku
</button>

</div>

</form>

</div>

</body>
</html>