<?php
session_start();
include "../db/koneksi.php";

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isi = mysqli_real_escape_string($koneksi, trim($_POST['isi']));

    if (!empty($isi)) {
        $query = "INSERT INTO curhatan (user_id, isi, created_at) VALUES ('$user_id', '$isi', NOW())";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('aku bakalan inget semua nya kok! 😊'); window.location.href='lihat_curhat.php';</script>";
        } else {
            echo "<script>alert('maaf kayaknya ada kesalahan deh, coba lagi! 😢');</script>";
        }
    } else {
        echo "<script>alert('jangan takut! ceritain aja ke aku! ✍️');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curhat</title>
    <link rel="stylesheet" href="../r/style.css">
    <style>
        /* Background */
        body {
            background: url('https://i.pinimg.com/736x/cf/15/ca/cf15cafa038ffe5eb1344023d6534bfc.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        /* Container */
        .curhat-container {
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
            margin-bottom: 15px;
        }

        /* Textarea */
        textarea {
            width: 100%;
            height: 150px;
            padding: 15px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            resize: none;
            outline: none;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            font-family: 'Poppins', sans-serif;
        }

        textarea::placeholder {
            color: #888;
        }

        /* Tombol */
        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 20px;
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

        /* Tombol Kembali */
        .btn.back {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            margin-top: 10px;
        }

        .btn.back:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* Label Nama */
        .creator-label {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.5);
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
    <div class="curhat-container">
        <h1>💬 aku disini buat dengerin kamu. aku bakalan dengerin kok!</h1>
        <form method="post">
            <textarea name="isi" placeholder= " ceritain semuanya ke aku..." required></textarea>
            <br>
            <button type="submit" class="btn">📩 mau di simpan buat jadi kenangan</button>
        </form>
        <br>
        <a href="../auth/home.php" class="btn back">⬅️ Kembali</a>
    </div>

    <!-- Label Nama yang Mengarah ke Instagram -->
    <a href="https://instagram.com/alimisadn_/" target="_blank" class="creator-label">✨ Dibuat oleh alimisadn</a>

</body>
</html>
