<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    @vite(['resources/css/admin/sb-admin-2.min.css', 'resources/js/admin/sb-admin-2.min.js'])
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-10 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Atur Ulang Password</h1>
                            </div>
                            <form action="{{ route('password.update') }}" method="POST" class="user">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email"
                                        aria-describedby="emailHelp" placeholder="Masukan email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        id="password" placeholder="Masukan password baru">
                                    @error('password')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password_confirmation"
                                        id="password_confirmation" placeholder="Konfirmasi password baru">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Tetapkan Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>
</html>
