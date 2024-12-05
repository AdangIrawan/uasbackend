<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-s
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    @include('layouts.navbar')

    <div class="profile-container">
        <h1>Profil Pengguna</h1>
        
        
        <section class="profile-section">
            <h2>Profil</h2>
            <p><strong>Nama Pengguna:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Usia:</strong> {{ Auth::user()->position }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ Auth::user()->qualification1 }}</p>
        </section>

        
        <section class="biography-section">
            <h2>Berat Badan</h2>
            <p>{{ Auth::user()->department }}</p>
        </section>

        
        <section class="qualifications-section">
            <h2>Tinggi Badan</h2>
            <p>{{ Auth::user()->biography }}</p>
        </section>

        
        <section class="contact-section">
            <h2>Kontak</h2>
            <p><strong>Telepon:</strong> {{ Auth::user()->phone }}</p>
            <p><strong>Alamat:</strong> {{ Auth::user()->address }}</p>
        </section>

        
        <section class="edit-profile-section">
            <h2>Edit Profil</h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>

                <label for="position">Usia:</label>
                <input type="text" id="position" name="position" value="{{ Auth::user()->position }}">

                <label for="department">Berat Badan:</label>
                <input type="text" id="department" name="department" value="{{ Auth::user()->department }}">

                <label for="biography">Tinggi Badan:</label>
                <textarea id="biography" name="biography">{{ Auth::user()->biography }}</textarea>

                <label for="qualification1">Tanggal Lahir:</label>
                <input type="text" id="qualification1" name="qualification1" value="{{ Auth::user()->qualification1 }}">

                <label for="phone">Telepon:</label>
                <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}">

                <label for="address">Alamat:</label>
                <input type="text" id="address" name="address" value="{{ Auth::user()->address }}">

                <button type="submit">Simpan Perubahan</button>
            </form>
        </section>
    <div class="user-container">
        <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <section class="logout-section">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </section>
    </div>
</body>
</html>
