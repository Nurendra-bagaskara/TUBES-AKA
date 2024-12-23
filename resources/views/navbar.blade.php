<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <nav style="background-color: blue; " class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a style="color: white;" class="navbar-brand" href="{{ route('search.index') }}">Yuk Sehat!!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="{{ route('upload') }}">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="{{ route('search.index') }}">Iteration</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="{{ route('search.recursive') }}">Rekursive</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
