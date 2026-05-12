<?php
session_start();
session_destroy();
header("Location: login.php");
?>


<?php
include 'auth.php'; // <- cek login dulu
include 'koneksi.php';
// ... kode halaman seperti biasa ...
?>


