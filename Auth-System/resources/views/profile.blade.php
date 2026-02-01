@extends('layouts.app') 



@section('content')
<body class="min-h-screen bg-gradient-to-br from-black via-[#120509] to-[#1a0a0a] text-red-50 flex items-center justify-center p-6">
    <div class="form-container w-full max-w-md rounded-3xl border border-red-900/60 bg-black/70 p-8 text-center shadow-2xl shadow-red-950/40 backdrop-blur">

        @if (session('success'))
            <p class="success-message mb-6 rounded-xl bg-red-950/50 border border-red-900/50 p-3 text-sm text-red-300">{{ session('success') }}</p>
        @endif
        
        <h1 class="text-3xl font-bold text-red-200">Vítej, {{ Auth::user()->name }}!</h1>
        <p class="mt-4 text-red-300/70">Tvůj účet je aktivní a jsi v systému.</p>
        
        <form action="/logout" method="POST" class="mt-8">
            @csrf
            <button type="submit" class="submit-btn w-full rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-rose-500 px-4 py-3 text-sm font-semibold uppercase tracking-widest text-white shadow-lg shadow-red-900/40 transition hover:from-red-500 hover:to-rose-400">
                <span class="relative z-10">Odhlásit se</span>
            </button>
        </form>
    </div>
</body> 
@endsection
