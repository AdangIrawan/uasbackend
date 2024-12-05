<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="{{ asset('images/medikahartono.png') }}" alt="Klinik Hartono Medika Logo" style="weight:100px;height:100px;">
        </div>

        <i class='bc bx-menu' id="menu-icon"></i>

        <nav class="navbar">
            <a href="/">Home</a>
            <a href="/antrian">Daftar Antrian</a>
            <a href="/doctor">Tenaga Medis</a>
            <a href="/medicine">Obat</a>
            <a href="/booking">Booking</a>
            <a href="/consultation">Konsultasi</a>
            <a href="/userprofile">Profile</a>
        </nav>
    </header>
    <div class="nav-bg"></div>
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>

