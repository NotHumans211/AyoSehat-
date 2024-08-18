<?php


//code ini mengarahkan langsung file ke halaman login sebelum kehalaman utama
// header("Location: login.php");
// // exit();
session_start();


if (!isset($_SESSION['login_user']) || $_SESSION['user_role'] != 'user') {
    if ($_SESSION['user_role'] == 'admin') {
        header("location: indexadmin.php");
    }
    header("location: login.php");
    require 'function.php';
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AyoSehat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <a href="https://wa.me/YourPhoneNumberHere" class="whatsapp-float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i></a>
    <header>
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>AyoSehat</a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#speciality">Speciality</a>
            <a href="#steps">Work</a>
            <a href="#about">About</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <script>
        document.getElementById('login-link').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = 'login.php';
        });

        document.getElementById('menu-bar').addEventListener('click', function() {
            document.querySelector('.navbar').classList.toggle('active');
        });

        window.onscroll = function() {
            if (document.documentElement.scrollTop > 100) {
                document.getElementById('scroll-top').style.display = 'block';
            } else {
                document.getElementById('scroll-top').style.display = 'none';
            }
        };
    </script>
    <main>
        <article>
            <section class="home" id="home">
                <div class="content black">
                    <h3>Solusi Kesehatan Untuk Keluarga Indonesia</h3>
                    <p>Pentingnya menjaga kesehatan tidak pernah berkurang nilainya, karena kesehatan adalah kekayaan terbesar kita. Dengan AyoSehat, Anda dapat dengan mudah dan cepat memantau kondisi kesehatan Anda. Kami siap membantu Anda menemukan solusi untuk setiap masalah kesehatan yang Anda hadapi, dengan layanan yang kami berikan dengan sepenuh hati dan penuh perhatian.</p>
                    <a href="order.php" class="btn">Order Now</a>
                    <a href="rujuk.php" class="btn">Rujuk Rumah Sakit</a>
                </div>
                <div class="image">
                    <img src="assets/images/medical.png" alt="">
                </div>
            </section>
            <section class="speciality" id="speciality">
                <h1 class="heading"> our <span>speciality</span> </h1>
                <div class="box-container">
                    <div class="box">
                        <div class="content">
                            <i class="fa-solid fa-stethoscope"></i>
                            <h3>Konsultasi</h3>
                            <p>Konsultasikan masalah kesehatan anda dengan dokter yang berpengalaman, tanyakan apapun keluhan anda pada kami sehingga kami dapat mengetahui apa yang terbaik buat anda.</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content">
                            <i class="fa-solid fa-capsules"></i>
                            <h3>Pesan Obat</h3>
                            <p>Kami menyediakan berbagai macam obat-obatan berkualitas yang disupply langsung oleh vendor kami, sehingga keamanan dan kemutuannya sangat terjaga sekali.</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content">
                            <i class="fa-solid fa-hospital"></i>
                            <h3>Terhubung dengan Rumah Sakit Terdekat</h3>
                            <p>Bisa digunakan untuk melakukan pemesanan layanan maupun administrasi pada rumah sakit terdekat anda.</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content">
                            <i class="fa-solid fa-face-smile"></i>
                            <h3>Terpercaya</h3>
                            <p>Pelayanan yang diberikan sudah dipercaya oleh banyak sekali customer kami di seluruh Indonesia karena selalu ada inovasi dari waktu ke waktu.</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <h3>Layanan 24 Jam</h3>
                            <p>Layanan tersedia setiap hari selama 24 jam nonstop, sehingga anda tidak perlu khawatir tentang kesehatan anda.</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <h3>Tersedia di Seluruh Indonesia</h3>
                            <p>Layanan kita sudah merata di seluruh Indonesia.</p>
                        </div>
                    </div>
                </div>
            </section>
        </article>
        <article>
            <div class="step-container" id="steps">
                <h1 class="heading center">how it <span>works</span></h1>
                <section class="steps">
                    <div class="box">
                        <i class="fa-solid fa-mortar-pestle"></i>
                        <h3>Dapatkan Resep Obat</h3>
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-paper-plane"></i>
                        <h3>Pengiriman Gratis & Cepat</h3>
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-wallet"></i>
                        <h3>Metode Pembayaran Mudah</h3>
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-gift"></i>
                        <h3>Paket Datang dengan Selamat</h3>
                    </div>
                </section>
            </div>
        </article>
        <aside>
            <section class="about" id="about">
                <h1 class="heading"> About</h1>
                <div class="box-container">
                    <div class="box-p">
                        <img src="assets/images/WhatsApp Image 2024-05-07 at 19.35.45_13625770.jpg" alt="">
                        <h3>AyoSehat</h3>
                        <p>"AyoSehat - Sumber Terpercaya untuk Gaya Hidup Sehat."</p>
                        <p>Di AyoSehat, kami menyediakan informasi terkini dan terpercaya mengenai kesehatan, gaya hidup sehat, serta tips praktis untuk membantu Anda mencapai keseimbangan dan kesehatan optimal dalam hidup Anda.</p>
                    </div>
                </div>
            </section>
        </aside>
    </main>
    <footer>
        <div class="share">
            <a href="https://www.instagram.com/yah_isme" class="btn">Instagram</a>
            <a href="https://wa.me/qr/GX4P36XGIOEKI1" class="btn">Kontak</a>
        </div>
        <h1 class="credit"> created by <span> Yahya & Roby </span></h1>
    </footer>
    <a href="#home" class="fas fa-angle-up" id="scroll-top"></a>
    <script src="assets/script.js"></script>
</body>

</html>