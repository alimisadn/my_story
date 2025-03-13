<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Curhat App</title>
    <style>
        /* Gaya untuk Background */
        body {
            background: url('https://i.pinimg.com/736x/03/bf/91/03bf91d48b27de5996c9f359ef044f02.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Container */
        .container {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            width: 50%;
            max-width: 500px;
            box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.2);
        }

        h1 {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Tombol */
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            background: linear-gradient(45deg, #ff4b5c, #ff6b81);
            color: white;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background: linear-gradient(45deg, #ff6b81, #ff4b5c);
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.3);
        }

        /* Tombol Logout */
        .logout {
            display: inline-block;
            margin-top: 15px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .logout:hover {
            color: #ff4b5c;
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
    <div class="container">
        <h1 class="typing-text"><span id="typing"></span></h1>
        
        <div class="options">
            <a href="../pages/curhat.php" class="btn cute">💌 Curhat yuk ke aku</a>
            <a href="../pages/music.php" class="btn cute">🎶 Dengarkan Lagu</a>
            <a href="../pages/lihat_curhat.php" class="btn cute">📖 Lihat Curhatanmu</a>
        </div>
        
        <a href="../auth/logout.php" class="logout">🚪 Logout</a>
    </div>

    <!-- Label Nama yang Mengarah ke Instagram -->
    <a href="https://www.instagram.com/alimisadn_/" target="_blank" class="creator-label">✨ Dibuat oleh alimisadn</a>

    <script src="../rm/script.js"></script> <!-- Path JS diperbarui -->
</body>
</html>
