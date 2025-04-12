<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #9face6);
        }
        .card {
            border: none;
            border-radius: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            border-radius: 10px;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #00f2fe, #4facfe);
        }
        .text-primary {
            font-weight: 600;
        }
        .form-label {
            margin-bottom: 4px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg p-4 bg-white" style="width: 400px;">
    <h3 class="text-center text-primary mb-4">Login</h3>

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                icon: 'success',
                title: '{{ session('success') }}',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                toast: true,
                icon: 'error',
                title: '{{ $errors->first() }}',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label text-primary">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-primary">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>

        <div class="text-center">
            <a href="{{ route('register') }}" class="text-decoration-none text-secondary">Belum punya akun? <strong>Daftar</strong></a>
        </div>
    </form>
</div>

</body>
</html>
