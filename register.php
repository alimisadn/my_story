<?php
session_start();
include "../db/koneksi.php"; // Sesuaikan path jika perlu

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('yes! kamu sudah terdaftar di sini, kamu bisa cerita sama aku. seneng deh!');</script>";
    } else {
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($koneksi, $query)) {
            // Simpan sesi user
            $_SESSION['user_id'] = mysqli_insert_id($koneksi);
            header("Location: ../auth/home.php");
            exit();
        } else {
            echo "<script>alert('yah! maaf gagal, kayaknya ada kesalahan deh, coba lagi yuk!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Curhat App</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Background & Styling */
        body {
            background: url('https://i.pinimg.com/736x/7d/f8/68/7df86824b45163aa3a2e6219f9210133.jpg') no-repeat center center fixed;
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

        .register-container {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            width: 50%;
            max-width: 400px;
            box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.2);
        }

        h1 {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
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

        /* Link ke Login */
        p {
            margin-top: 15px;
        }

        a {
            color: #ff6b81;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
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
    <div class="register-container">
        <h1><span class="typing"></span></h1>

        <form method="post">
            <div class="input-box">
                <input type="text" name="username" placeholder="Buat Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Buat Password" required>
            </div>
            <button type="submit" name="register" class="btn">Daftar</button>
        </form>

        <p>kamu sudah punya akun belum? <a href="../index.php">Login</a></p>
    </div>

    <!-- Label Nama di Pojok Kanan Bawah -->
    <a href="https://instagram.com/alimisadn_/" target="_blank" class="creator-label">✨ Dibuat oleh alimisadn</a>

    <script src="../script.js"></script>
</body>
</html>
