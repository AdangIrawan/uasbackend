<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    showAlert("{{ $error }}");
                @endforeach
            @endif
        });
    </script>
    <script src="{{ asset('js/adminlogin.js') }}"></script>
</body>
</html>
