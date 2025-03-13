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
    <title>🎶 Playlist Lagu</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Styling Umum */
        body {
            background: url('https://i.pinimg.com/736x/95/03/26/950326eefea2b78fbe8fea2fac65495c.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 15px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.2);
        }

        h1 {
            font-size: 26px;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .song-list {
            list-style: none;
            padding: 0;
        }

        .song-list li {
            background: rgba(255, 255, 255, 0.2);
            margin: 10px 0;
            padding: 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .song-list li:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: scale(1.05);
        }

        audio {
            width: 100%;
            margin-top: 15px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: linear-gradient(45deg, #ff4b5c, #ff6b81);
            color: white;
            border-radius: 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            background: linear-gradient(45deg, #ff6b81, #ff4b5c);
            transform: scale(1.1);
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
        <h1>🎶 Pilih Lagu Favoritmu</h1>

        <ul class="song-list">
            <li onclick="playSong('../musik/c:\Users\Asus A442U\Downloads\SpotifyMate.com - Kesempurnaan Cinta - Rizky Febian.mp3')">💖 Kesempurnaan Cinta - Rizky Febian</li>
            <li onclick="playSong('song2.mp3')">🌙 Runtuh - Feby Putri ft. Fiersa Besari</li>
            <li onclick="playSong('song3.mp3')">✨ Akad - Payung Teduh</li>
            <li onclick="playSong('song4.mp3')">🌿 To The Bone - Pamungkas</li>
            <li onclick="playSong('song5.mp3')">💫 Hingga Tua Bersama - Rizky Febian</li>
        </ul>

        <audio id="audio-player" controls>
            <source id="audio-source" src="../musik/" type="audio/mp3">
            Browser Anda tidak mendukung pemutar audio.
        </audio>

        <a href="../auth/home.php" class="btn">⬅️ Kembali ke Home</a>
    </div>

    <!-- Label Nama di Pojok Kanan Bawah -->
    <a href="https://instagram.com/alimisadn_/" target="_blank" class="creator-label">✨ Dibuat oleh alimisadn</a>

    <script>
        function playSong(song) {
            let audio = document.getElementById('audio-player');
            let source = document.getElementById('audio-source');
            source.src = '../musik/' + song;
            audio.load();
            audio.play();
        }
    </script>
    <script src="../dm/script.js"></script>

</body>
</html>
