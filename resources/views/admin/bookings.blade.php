<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="{{ asset('css/bookings.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Booking</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.doctors') }}">DOKTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.medicines') }}">OBAT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.bookings') }}">BOOKING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.antrians') }}">ANTRIAN</a>
                    </li>
                </ul>
            </div>
        </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Booking</h1>
        @if (session('success'))
    <div class="alert alert-success" style="display: block;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" style="display: block;">
        {{ session('error') }}
    </div>
@endif


        @foreach ($bookings as $booking)
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $booking->name }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $booking->email }}</p>
                    <p class="card-text"><strong>Telepon:</strong> {{ $booking->phone }}</p>
                    <p class="card-text"><strong>Tanggal:</strong> {{ $booking->date }}</p>
                    <p class="card-text"><strong>Tenaga Kerja:</strong> {{ $booking->tenaga_kerja }}</p>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus booking ini?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <script src="{{ asset('js/adminbook.js') }}"></script>
</div>
</body>
</html>
