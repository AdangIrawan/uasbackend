<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet">
    <script src="{{ asset('js/regis.js') }}"></script>
</head>
<body>
    <img src="{{ asset('images/hartonomedika.png') }}" style="background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 120vh;
            ">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" value="{{ old('name') }}" />
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                    @error('name')
                                        <div id="error" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" value="{{ old('email') }}" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                    @error('email')
                                        <div id="error" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    @error('password')
                                        <div id="error" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="password_confirmation" />
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    @error('password_confirmation')
                                        <div id="error" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="1" id="form2Example3cg" name="terms" />
                                    <label class="form-check-label" for="form2Example3cg">
                                        I agree to all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                    @error('terms')
                                        <div id="error" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
