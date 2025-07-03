<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Warehouse Rumah Sakit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 70px;
        }

        .navbar-nav .nav-link.active {
            color: #ffffff !important;
            font-weight: 600;
            border-bottom: 2px solid #ffffff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">🏥 Data Warehouse Rumah Sakit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('kunjungan.index') ? 'active' : '' }}"
                            href="{{ route('kunjungan.index') }}">Fakta_Kunjungan</a>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('pasien') ? 'active' : '' }}"
                            href="/pasien">Dim_Pasien</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('dokter') ? 'active' : '' }}"
                            href="/dokter">Dim_Dokter</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('diagnosa') ? 'active' : '' }}"
                            href="/diagnosa">Dim_Diagnosa</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('ruang') ? 'active' : '' }}"
                            href="/ruang">Dim_Ruang</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('waktu') ? 'active' : '' }}"
                            href="/waktu">Dim_Waktu</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
