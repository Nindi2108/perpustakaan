<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Perpustakaan')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body
    style="background-image: url('/images/perpustakaan.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; min-height: 100vh;">


    </li>
    </ul>
    </div>
    </div>
    </nav>

    <div class="container mt-4 p-4" style="background-color: rgba(255, 255, 255, 0.85); border-radius: 10px;">
        @yield('content')
    </div>

</body>

</html>
