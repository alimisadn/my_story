<?php
session_start();
include "../db/koneksi.php";

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM curhatan WHERE user_id='$user_id' ORDER BY isi DESC";
$result = mysqli_query($koneksi, $query);

// Cek apakah query berhasil
if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curhatan Saya</title>
    <link rel="stylesheet" href="../r/style.css">
    <style>
        /* Background dengan foto */
        body {
            background: url('https://i.pinimg.com/736x/c3/b2/81/c3b281060af01c866df478b1ae1a915d.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            color: white;
            text-align: center;
        }

        /* Container utama */
        .curhat-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 15px;
            width: 60%;
            margin: 50px auto;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
        }

        /* Judul dengan animasi mengetik */
        .typing-text {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            animation: typing 3s steps(40) infinite;
        }

        /* Animasi mengetik */
        @keyframes typing {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }

        /* List curhatan */
        .curhat-list {
            margin-top: 20px;
        }

        /* Kartu curhatan */
        .curhat-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .curhat-item:hover {
            transform: scale(1.05);
        }

        /* Tanggal curhatan */
        .curhat-date {
            font-size: 12px;
            color: #ddd;
        }

        /* Jika belum ada curhatan */
        .no-curhat {
            font-size: 18px;
            color: #ffcccb;
            font-style: italic;
        }

        /* Tombol kembali */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background: #ff4b5c;
            color: white;
            border: none;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #ff7373;
        }
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
        <h1 class="typing-text">📖 semua curhatanmu aku simpan di sini</h1>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="curhat-list">
                <?php while ($curhat = mysqli_fetch_assoc($result)): ?>
                    <div class="curhat-item">
                        <p><?= htmlspecialchars($curhat['isi']); ?></p>
                        <span class="curhat-date"><?= date("d M Y, H:i", strtotime($curhat['created_at'])); ?></span>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="no-curhat">Kamu belum curhat ke aku nih,😢 Coba curhat dulu yuk!</p>
        <?php endif; ?>

        <a href="../auth/home.php" class="btn">⬅️ Kembali</a>
        <a href="https://instagram.com/alimisadn_/" target="_blank" class="creator-label">✨ Dibuat oleh alimisadn</a>

    </div>
</body>
</html>
