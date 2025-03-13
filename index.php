<?php
session_start();
include "db/koneksi.php"; // Sesuaikan path jika perlu

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: auth/home.php");
            exit();
        } else {
            echo "<script>alert('yah!password mu salah, kamu masih inget kan😊');</script>";
        }
    } else {
        echo "<script>alert('kayaknya aku belum kenal kamu deh,daftar dulu yu, biar aku kenal kamu.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Curhat App</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styling Background */
        body {
            background: url('https://i.pinimg.com/736x/8b/ea/21/8bea218b7a798fc2e92329bc4bb32c8c.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            width: 50%;
            max-width: 400px;
            box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.2);
        }

        /* Animasi Mengetik */
        .typing-container {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            overflow: hidden;
            white-space: nowrap;
            display: inline-block;
            border-right: 3px solid white;
            animation: blinkCursor 0.8s infinite;
        }

        @keyframes blinkCursor {
            50% { border-color: transparent; }
        }

        /* Input Box */
        .input-box {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
        }

        /* Tombol */
        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #ff4b5c, #ff6b81);
            color: white;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background: linear-gradient(45deg, #ff6b81, #ff4b5c);
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.3);
        }

        /* Label Nama */
        .creator-label {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 10px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .creator-label:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="typing-container" id="typing-text"></div>

        <form method="post">
            <div class="input-box">
                <input type="text" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" name="login" class="btn">Masuk</button>
        </form>

        <p>Belum punya akun? <a href="auth/register.php">Daftar</a></p>
    </div>

    <!-- Label Nama di Pojok Kanan Bawah -->
    <a href="https://instagram.com/alimisadn_/" target="_blank" class="creator-label">✨ Dibuat oleh alimisadn</a>

    <script>
        const text = "🌸ayo curhat ke aku, login dulu ya!🌸";
        let i = 0;

        function typeEffect() {
            if (i < text.length) {
                document.getElementById("typing-text").innerHTML += text.charAt(i);
                i++;
                setTimeout(typeEffect, 100);
            }
        }

        window.onload = typeEffect;
    </script>
</body>
</html>
