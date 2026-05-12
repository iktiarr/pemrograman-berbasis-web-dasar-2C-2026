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

$id=$_GET['id'];

$stmt=$conn->prepare("DELETE FROM buku WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: dashboard.php");
?>