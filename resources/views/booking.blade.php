<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>

    @include('layouts.navbar')

    <main>
        @if (session('success'))
            <div class="alert-message" id="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert-message" id="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="date">Tanggal:</label>
            <input type="date" id="date" name="date" required>

            <label for="tenaga_kerja">Tenaga Medis:</label>
            <select id="tenaga_kerja" name="tenaga_kerja">
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                @endforeach
            </select>

            <button type="submit">Booking</button>
        </form>
    </main>
    <script src="{{ asset('js/booking.js') }}"></script>
</body>
</html>
