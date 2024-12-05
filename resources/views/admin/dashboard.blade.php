<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
    <title>Admin Dashboard</title>
    
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin Dashboard</h1>
        
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
                <form class="form-inline" method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </nav>
        
        <h2 class="my-4">Akun Pengguna</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="d-flex justify-content-center">
            <table class="table table-bordered w-75">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Umur</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Tanggal lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <form method="POST" action="{{ route('admin.updateUser', $user->id) }}" class="form-inline">
                                    @csrf
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                    <button type="submit" class="btn btn-primary ml-2">Update</button>
                                </form>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->position }}</td>
                            <td>{{ $user->department }}</td>
                            <td>{{ $user->biography }}</td>
                            <td>{{ $user->qualification1 }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.deleteUser', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admindashboard.js') }}"></script>
</body>
</html>
