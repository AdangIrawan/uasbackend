<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Tiket</title>
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
</head>
<body>

    @include('layouts.navbar')

    <header>
        <h1>Booking Tiket</h1>
    </header>

    <main>
        <form action="process_booking.php" method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="date">Tanggal:</label>
            <input type="date" id="date" name="date" required>

            <label for="ticket_type">Jenis Tiket:</label>
            <select id="ticket_type" name="ticket_type">
                <option value="vip">VIP</option>
                <option value="regular">Regular</option>
                <option value="student">Student</option>
            </select>

            <button type="submit">Booking</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Klinik PeduliSehat. All rights reserved.</p>
    </footer>
</body>
</html>
