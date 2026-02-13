@extends('layouts.app') 



@section('content')
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
        <div class="mt-8 border-t border-red-900/30 pt-8">
            <h2 class="text-xl font-semibold text-red-200 mb-4 text-left">Napiš něco světu</h2>
            
            <form action="/post" method="POST" class="space-y-4">
                @csrf
                {{-- Textové pole pro příspěvek --}}
                <textarea 
                    name="content" 
                    rows="3" 
                    class="w-full rounded-xl bg-black/50 border border-red-900/40 p-3 text-red-50 placeholder-red-900/50 focus:border-red-500 focus:outline-none"
                    placeholder="Co máš na srdci?"
                ></textarea>
                
                <button type="submit" class="w-full rounded-2xl bg-red-600 px-4 py-2 text-sm font-bold uppercase tracking-widest text-white hover:bg-red-500 transition">
                    Zveřejnit příspěvek
                </button>
            </form>
        </div>
    </div>
@endsection
