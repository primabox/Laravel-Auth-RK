<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje Appka</title>
    {{-- Načtení Tailwindu a JavaScriptu --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-black via-[#120509] to-[#1a0a0a] text-red-50 flex items-center justify-center p-6">

    {{-- Sem se automaticky vloží obsah z tvých ostatních souborů --}}
    @yield('content')

</body>
</html>