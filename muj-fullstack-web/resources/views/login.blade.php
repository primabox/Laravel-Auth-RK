<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-black via-[#120509] to-[#1a0a0a] text-red-50 flex items-center justify-center p-6">

    <form action="/login" method="POST" class="form-container w-full max-w-md rounded-3xl border border-red-900/60 bg-black/70 p-8 shadow-2xl shadow-red-950/40 backdrop-blur">
        @csrf
        
        <div class="form-field mb-6 text-center">
            <h1 class="text-2xl font-semibold tracking-wide text-red-200">Přihlášení</h1>
            <p class="mt-1 text-sm text-red-300/70">Vstup do systému</p>
        </div>

        @if ($errors->any())
            <div class="error-message mb-4 rounded-xl bg-red-950/50 border border-red-900/50 p-3 text-sm text-red-400">
                Špatný e-mail nebo heslo.
            </div>
        @endif

        <div class="form-field">
            <label class="mb-2 block text-sm text-red-200">Email</label>
            <input type="email" name="email" required placeholder="např. jan@email.cz" class="field-ring mb-4 w-full rounded-2xl border border-red-900/70 bg-black/60 px-4 py-3 text-red-50 placeholder-red-300/60 outline-none transition focus:border-red-400">
        </div>

        <div class="form-field">
            <label class="mb-2 block text-sm text-red-200">Heslo</label>
            <input type="password" name="password" required placeholder="••••••••" class="field-ring mb-6 w-full rounded-2xl border border-red-900/70 bg-black/60 px-4 py-3 text-red-50 placeholder-red-300/60 outline-none transition focus:border-red-400">
        </div>

        <button type="submit" class="form-field submit-btn w-full rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-rose-500 px-4 py-3 text-sm font-semibold uppercase tracking-widest text-white shadow-lg shadow-red-900/40 transition hover:from-red-500 hover:to-rose-400">
            <span class="relative z-10">Přihlásit se</span>
        </button>
        
        <p class="mt-4 text-center text-sm text-red-300/60">
            Nemáš účet? <a href="/registrace" class="text-red-400 hover:underline">Zaregistruj se</a>
        </p>
    </form>

</body>
</html>