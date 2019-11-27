<!DOCTYPE html>
<html>

<head>
    <title>PERCOBAAN UNTUK DYNAMIC PAGE</title>
</head>

<body>
    <header>
        <nav>
            <a href="/home">HOME</a>
            |
            <a href="/home/about">TENTANG</a>
            |
            <a href="/home/contact">KONTAK</a>
        </nav>
    </header>
    <br>
    <h2>@yield('judul')</h2>

    @yield('content')
</body>
</html>