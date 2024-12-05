<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/crudDoctor.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Dokter</h1>

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

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <section class="mb-4 form-section">
            <h2 class="section-title">{{ isset($doctor) ? 'Edit Dokter' : 'Tambah Dokter' }}</h2>
            <form method="POST" action="{{ isset($doctor) ? route('admin.updateDoctor', $doctor->id) : route('admin.storeDoctor') }}" enctype="multipart/form-data" class="form-group">
                @csrf
                @if (isset($doctor))
                @method('PUT')
                @endif
                <input type="text" name="name" class="form-control mb-3" placeholder="Nama Dokter" value="{{ old('name', isset($doctor) ? $doctor->name : '') }}" required>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email Dokter" value="{{ old('email', isset($doctor) ? $doctor->email : '') }}" required>
                <input type="text" name="specialization" class="form-control mb-3" placeholder="Spesialisasi" value="{{ old('specialization', isset($doctor) ? $doctor->specialization : '') }}" required>
                <input type="text" name="address" class="form-control mb-3" placeholder="Alamat" value="{{ old('address', isset($doctor) ? $doctor->address : '') }}" required>
                <input type="text" name="working_hours" class="form-control mb-3" placeholder="Jam Kerja" value="{{ old('working_hours', isset($doctor) ? $doctor->working_hours : '') }}" required>    
                @if (isset($doctor) && $doctor->image)
                    <p>Gambar saat ini:</p>
                    <img src="{{ asset('images/' . $doctor->image) }}" alt="Gambar Dokter" class="mb-3">
                @endif
                
                <input type="file" name="image" accept="image/*" class="form-control-file mb-3">
                <button type="submit" class="btn btn-primary">{{ isset($doctor) ? 'Update' : 'Tambah' }}</button>
            </form>
        </section>

        <section>
        <h2>Daftar Dokter</h2>
        <table border="1">
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>
                            <form method="POST" action="{{ isset($doctor) ? route('admin.updateDoctor', $doctor->id) : route('admin.storeDoctor') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" placeholder="Nama Dokter" value="{{ old('name', isset($doctor) ? $doctor->name : '') }}" required><br><br>
                                <input type="email" name="email" placeholder="Email Dokter" value="{{ old('email', isset($doctor) ? $doctor->email : '') }}" required><br><br>
                                <input type="text" name="specialization" placeholder="Spesialisasi" value="{{ old('specialization', isset($doctor) ? $doctor->specialization : '') }}" required><br><br>
                                <input type="text" name="address" placeholder="Alamat" value="{{ old('address', isset($doctor) ? $doctor->address : '') }}" required><br><br>
                                <input type="text" name="working_hours" placeholder="Jam Kerja" value="{{ old('working_hours', isset($doctor) ? $doctor->working_hours : '') }}" required><br><br>                           
                                <input type="file" name="image" accept="image/*"><br><br>
                                <button type="submit">{{ isset($doctor) ? 'Update' : 'Tambah' }}</button>
                            </form>
                            <form method="POST" action="{{ route('admin.deleteDoctor', $doctor->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    </div>
    <script>
        $(document).ready(function(){
            $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                $(".alert-success").slideUp(500);
            });
        });
    </script>
    <script src="{{ asset('js/admindokter.js') }}"></script>
</body>
</html>
