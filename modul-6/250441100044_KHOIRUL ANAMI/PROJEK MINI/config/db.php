<?php
$conn = new mysqli("localhost", "root", "", "perpustakaan_digital");

if ($conn->connect_error) {
    die("Connection failed");
}
?>