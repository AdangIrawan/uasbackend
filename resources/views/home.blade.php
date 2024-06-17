<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Abang Amos</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <script src="{{ asset('js/slider.js') }}"></script>
    <script> src="/bootstrap-5.0.2-dist/js/boostrap.js"</script>
    <link rel="bootstrap-5.0.2-dist/css/bootstrap.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.navbar')


    @include('layouts.slider')
    <header>
        <h1>Welcome to Klinik PeduliSehat</h1>
    </header>

    <header>
        <h2>@include('layouts.slider2')</h2>
    </header>

    <main>
        <section id="history">
            <h2>Sejarah Singkat Klinik Hartono Medika</h2>
            <p>Klinik Hartono Medika didirikan pada tahun 2000 dengan tujuan memberikan layanan kesehatan berkualitas kepada masyarakat. Selama lebih dari dua dekade, kami telah melayani ribuan pasien dengan dedikasi dan profesionalisme.</p>
        </section>

        <section id="schedule" class="center">
            <h2>Jadwal Buka / Tutup Klinik</h2>
            <ul>
                <li>Senin - Jumat: 08.00 - 20.00</li>
                <li>Sabtu: 08.00 - 18.00</li>
                <li>Minggu: 08.00 - 14.00</li>
            </ul>
        </section>

        <section id="facilities" class="center">
            <h2>Fasilitas Klinik</h2>
            <ul>
                <li>Ruang Tunggu Nyaman</li>
                <li>Laboratorium Medis</li>
                <li>Unit Gawat Darurat (UGD)</li>
                <li>Apotek</li>
                <li>Ruang Rawat Inap</li>
                <li>Ruang Radiologi</li>
            </ul>
        </section>
        <section id="location" class="center">
            <h2>Lokasi Klinik</h2>
            <p>Jl. Kesehatan No. 10, Jakarta, Indonesia</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1985.8902432995775!2d106.82279576094478!3d-6.20211754336568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6991d3a3c3e477%3A0x263d3b5c6e7c5e30!2sJl.%20Kesehatan%2C%20Kebayoran%20Baru%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012150!5e0!3m2!1sen!2sid!4v1623309151519!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>
    </main>
</body>
@include('layouts.footer')
</html>



                
