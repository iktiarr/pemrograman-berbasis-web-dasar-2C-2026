<?php
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO pengguna(nama_pengguna,kata_sandi) VALUES (?,?)");
    $stmt->bind_param("ss", $username, $password);

    if($stmt->execute()){
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 to-purple-600 flex justify-center items-center h-screen">

<form method="POST" class="bg-white p-8 rounded-2xl shadow-xl w-96">
<h2 class="text-3xl font-bold mb-6 text-center">Register</h2>

<input name="username" required placeholder="Username"
class="w-full p-3 border rounded mb-4">

<input type="password" name="password" required
placeholder="Password"
class="w-full p-3 border rounded mb-4">

<button class="w-full bg-indigo-600 text-white p-3 rounded">
Register
</button>

<a href="login.php" class="block mt-4 text-center text-indigo-600">
Login
</a>

<p class="text-center mt-4 text-gray-600">
    Sudah punya akun?
    <a href="login.php" class="text-indigo-600 font-semibold hover:underline">
        Login di sini
    </a>
</p>

</form>

</body>
</html>
