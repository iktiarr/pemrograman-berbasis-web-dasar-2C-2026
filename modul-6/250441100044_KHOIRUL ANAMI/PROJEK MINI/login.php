<?php
session_start();
include 'config/db.php';

$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $stmt=$conn->prepare("SELECT * FROM pengguna WHERE nama_pengguna=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();

    $result=$stmt->get_result();

    if($user=$result->fetch_assoc()){

        if(password_verify($password,$user['kata_sandi'])){
            $_SESSION['user']=$user;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah";
        }

    } else {
        $error = "User tidak ditemukan";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-cyan-500 flex justify-center items-center h-screen">

<form method="POST" class="bg-white p-8 rounded-2xl shadow-xl w-96">
    <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>

    <?php if($error): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 text-center shadow">
        <?= htmlspecialchars($error) ?>
    </div>
    <?php endif; ?>

    <input 
        name="username" 
        required 
        placeholder="Username"
        class="w-full p-3 border rounded mb-4"
    >

    <input 
        type="password" 
        name="password" 
        required
        placeholder="Password"
        class="w-full p-3 border rounded mb-4"
    >

    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg">
        Login
    </button>

    <p class="text-center mt-4 text-gray-600">
        Belum punya akun?
        <a href="register.php" class="text-blue-600 font-semibold hover:underline">
            Daftar di sini
        </a>
    </p>
</form>
</body>
</html>