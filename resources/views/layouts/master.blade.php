<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pagetitle', 'TasmimYar - DecisionHelper')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/metro.css') }}">
</head>
<body>
<body>

    <header class="container mt-4 mb-3">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="page-title m-0">@yield('header')</h1>
            </div>
            <div class="col-md-4 text-md-start text-start mt-3 mt-md-0">
                @if (session()->has('success'))
                    <div class="alert alert-success border-0 rounded-0" style="background-color: rgba(4, 160, 85, 0.9); color: white;">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </header>

    <main class="container">
        <div class="row">
            
            <div class="col-lg-{{ View::hasSection('sidebar') ? '8' : '12' }}">
                @yield('content')
            </div>

            @hasSection('sidebar')
                <div class="col-lg-4">
                    <div class="p-4 h-100" style="background-color: var(--glass-bg); border-left: 4px solid var(--metro-orange);">
                        <h4 class=" mb-3 text-warning"><i class="bi bi-lightbulb text-warning me-2"></i> Info :</h4>
                        <hr>
                        <div style="font-size: 15px; opacity: 0.85;">
                            @yield('sidebar')
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </main>

    <footer class="footer d-flex justify-content-between">
        <span class=" fs-5">Version 1.00</span>
        <a href="{{ route('dashboard') }}" class="text-white">
            <i class="bi bi-grid-3x3-gap-fill fs-3"></i>
        </a>
        <span class="fs-5">Made by Arman</span>
    </footer> 

</body>
</html>