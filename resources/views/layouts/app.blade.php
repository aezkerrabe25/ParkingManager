<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Parking Manager')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-blue-600 text-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Parking Manager</h1>
            <ul class="flex gap-4">
                <li><a href="/" class="hover:text-blue-200">Zerrenda</a></li>
                <li><a href="/autoa" class="hover:text-blue-200">Autoa Gehitu</a></li>
                <li><a href="/bilaketa-aurreratua" class="hover:text-blue-200">Bilaketa</a></li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <p>&copy; 2026 Parking Manager. Eskubide guztiak gordetzen dira.</p>
    </footer>
</body>
</html>
