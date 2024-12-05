
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi</title>
    <link rel="stylesheet" href="{{ asset('css/consul.css') }}">    
</head>
<body>
    @include('layouts.navbar')

    <main>
        <section id="consultation" class="center">
            @if (session('success'))
                <div class="alert alert-success" id="alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('send.email') }}" method="post">
            @csrf
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Pesan:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Kirim</button>
            </form>
        </section>
    </main>
    <script src="{{ asset('js/consul.js') }}"></script>
</body>
</html>
