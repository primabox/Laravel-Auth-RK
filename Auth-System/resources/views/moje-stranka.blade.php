<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel stránka</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-black via-[#120509] to-[#1a0a0a] text-red-50 flex items-center justify-center p-6">
        <form action="/registrace" method="POST" class="form-container w-full max-w-md rounded-3xl border border-red-900/60 bg-black/70 p-8 shadow-2xl shadow-red-950/40 backdrop-blur">
            @csrf
            <div class="form-field mb-6 text-center">
                <h1 class="text-2xl font-semibold tracking-wide text-red-200">Registrace</h1>
                <p class="mt-1 text-sm text-red-300/70">Vytvoř si účet</p>
            </div>

            <div class="form-field">
                <label class="mb-2 block text-sm text-red-200">Jméno</label>
                <input type="text" name="name" placeholder="Např. Jan Novak" class="field-ring mb-4 w-full rounded-2xl border border-red-900/70 bg-black/60 px-4 py-3 text-red-50 placeholder-red-300/60 outline-none transition focus:border-red-400">
                @error('name')
                    <p class="error-message mb-4 text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label class="mb-2 block text-sm text-red-200">Email</label>
                <input type="email" name="email" placeholder="např. jan@email.cz" class="field-ring mb-4 w-full rounded-2xl border border-red-900/70 bg-black/60 px-4 py-3 text-red-50 placeholder-red-300/60 outline-none transition focus:border-red-400">
                @error('email')
                    <p class="error-message mb-4 text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label class="mb-2 block text-sm text-red-200">Heslo</label>
                <input type="password" name="password" placeholder="••••••••" class="field-ring mb-6 w-full rounded-2xl border border-red-900/70 bg-black/60 px-4 py-3 text-red-50 placeholder-red-300/60 outline-none transition focus:border-red-400">
                @error('password')
                    <p class="error-message mb-4 text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="form-field submit-btn w-full rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-rose-500 px-4 py-3 text-sm font-semibold uppercase tracking-widest text-white shadow-lg shadow-red-900/40 transition hover:from-red-500 hover:to-rose-400">
                <span class="relative z-10">Odeslat</span>
            </button>

            @if (session('success'))
                <p class="success-message mt-4 text-red-300 text-center">{{ session('success') }}</p>
            @endif

            <p class="mt-4 text-center text-sm text-red-300/60">
                Už máš účet? <a href="/login" class="text-red-400 hover:underline">Přihlas se zde</a>
            </p>
        </form>
</body>
</html>