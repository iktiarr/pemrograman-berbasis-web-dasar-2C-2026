<?php
include 'auth/check.php';
include 'config/db.php';

$result = $conn->query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard Perpustakaan</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<nav class="bg-indigo-700 text-white p-4 flex justify-between items-center shadow">
    <h1 class="text-2xl font-bold">Perpustakaan Digital</h1>
    <a href="logout.php" class="hover:underline">Logout</a>
</nav>

<div class="p-8">

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-700">Daftar Buku</h2>

    <?php if($_SESSION['user']['peran']=='admin'): ?>
    <a href="create.php"
    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
        Tambah Buku
    </a>
    <?php endif; ?>
</div>

<div class="overflow-x-auto bg-white rounded-xl shadow">

<table class="w-full">

<tr class="bg-indigo-100 text-gray-700">
<th class="p-4">Judul</th>
<th class="p-4">Penulis</th>
<th class="p-4">Kategori</th>
<th class="p-4">Harga</th>
<th class="p-4">Tanggal Terbit</th>

<?php if($_SESSION['user']['peran']=='admin'): ?>
<th class="p-4">Aksi</th>
<?php endif; ?>
</tr>

<?php while($book=$result->fetch_assoc()): ?>
<tr class="text-center border-b hover:bg-gray-50">

<td class="p-4">
<button
onclick="openModal(
'<?= htmlspecialchars($book['judul']) ?>',
'<?= htmlspecialchars($book['penulis']) ?>',
'<?= htmlspecialchars($book['kategori']) ?>',
'<?= htmlspecialchars($book['harga']) ?>',
'<?= htmlspecialchars($book['tanggal_terbit']) ?>',
'<?= htmlspecialchars($book['deskripsi']) ?>'
)"
class="text-indigo-600 hover:underline font-semibold">
<?= htmlspecialchars($book['judul']) ?>
</button>
</td>

<td class="p-4"><?= htmlspecialchars($book['penulis']) ?></td>
<td class="p-4"><?= htmlspecialchars($book['kategori']) ?></td>
<td class="p-4">Rp <?= number_format($book['harga'],0,',','.') ?></td>
<td class="p-4"><?= htmlspecialchars($book['tanggal_terbit']) ?></td>

<?php if($_SESSION['user']['peran']=='admin'): ?>
<td class="p-4 space-x-3">

<a href="edit.php?id=<?=$book['id']?>"
class="text-blue-600 hover:text-blue-800 font-semibold">
Edit
</a>

<a href="delete.php?id=<?=$book['id']?>"
onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')"
class="text-red-500 hover:text-red-700 font-semibold">
Hapus
</a>

</td>
<?php endif; ?>

</tr>
<?php endwhile; ?>

</table>

</div>

</div>

<!-- Modal -->
<div id="modal"
class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

<div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-lg relative">

<button onclick="closeModal()"
class="absolute top-3 right-4 text-2xl text-gray-500">×</button>

<h2 id="mJudul" class="text-2xl font-bold text-indigo-700 mb-4"></h2>

<p><b>Penulis:</b> <span id="mPenulis"></span></p>
<p><b>Kategori:</b> <span id="mKategori"></span></p>
<p><b>Harga:</b> Rp <span id="mHarga"></span></p>
<p><b>Tanggal Terbit:</b> <span id="mTanggal"></span></p>

<div class="mt-4">
<b>Deskripsi:</b>
<p id="mDeskripsi" class="text-gray-700 mt-2"></p>
</div>

</div>
</div>

<script>
function openModal(j,p,k,h,t,d){
document.getElementById('mJudul').innerText=j;
document.getElementById('mPenulis').innerText=p;
document.getElementById('mKategori').innerText=k;
document.getElementById('mHarga').innerText=h;
document.getElementById('mTanggal').innerText=t;
document.getElementById('mDeskripsi').innerText=d;

document.getElementById('modal').classList.remove('hidden');
}

function closeModal(){
document.getElementById('modal').classList.add('hidden');
}
</script>

</body>
</html>