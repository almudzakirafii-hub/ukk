@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-[#0d1b2a] via-[#1a1f35] to-[#0d1b2a] flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full">
        <div class="bg-gradient-to-br from-[#1a1f35]/95 to-[#0d1b2a]/95 backdrop-blur-md rounded-2xl shadow-2xl shadow-[#FFD700]/20 p-8 border border-[#FFD700]/30">
            <div class="text-center mb-8">
                <div class="inline-block mb-4">
                    <img src="{{ asset('images/logos/LOGO GARUDA HUSTLER.png') }}" alt="Garuda Hustler" class="w-20 h-20 object-contain drop-shadow-lg">
                </div>
                <h1 class="text-4xl font-black bg-gradient-to-r from-[#FFD700] to-[#FF8C00] bg-clip-text text-transparent">Garuda Hustler</h1>
                <p class="text-gray-300 mt-3 font-semibold">Daftar akun baru</p>
            </div>
            
            @if ($errors->any())
                <div class="mb-4 bg-red-500/20 border border-red-500/40 text-red-300 px-4 py-3 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-bold text-[#FFD700] mb-2">👤 Nama Lengkap</label>
                    <input id="name" name="name" type="text" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 text-white rounded-lg px-4 py-3 focus:border-[#FFD700] focus:ring-2 focus:ring-[#FFD700]/30 focus:outline-none transition" placeholder="Nama Anda" required value="{{ old('name') }}">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-bold text-[#FFD700] mb-2">📧 Email</label>
                    <input id="email" name="email" type="email" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 text-white rounded-lg px-4 py-3 focus:border-[#FFD700] focus:ring-2 focus:ring-[#FFD700]/30 focus:outline-none transition" placeholder="nama@email.com" required value="{{ old('email') }}">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-bold text-[#FFD700] mb-2">🔐 Password</label>
                    <input id="password" name="password" type="password" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 text-white rounded-lg px-4 py-3 focus:border-[#FFD700] focus:ring-2 focus:ring-[#FFD700]/30 focus:outline-none transition" placeholder="••••••••" required>
                </div>
                
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-[#FFD700] mb-2">🔐 Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 text-white rounded-lg px-4 py-3 focus:border-[#FFD700] focus:ring-2 focus:ring-[#FFD700]/30 focus:outline-none transition" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-4 py-3 rounded-lg font-bold hover:from-[#FF8C00] hover:to-[#FFD700] transition transform hover:scale-105 shadow-lg shadow-[#FFD700]/30 mt-6">
                    ✨ Daftar Sekarang
                </button>
            </form>
            
            <!-- Divider -->
            <div class="relative mt-8 mb-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-[#FFD700]/20"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-gradient-to-br from-[#1a1f35]/95 to-[#0d1b2a]/95 text-gray-400">atau</span>
                </div>
            </div>
            
            <!-- Login Link -->
            <div class="text-center">
                <p class="text-gray-300 text-sm">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-[#FF8C00] font-bold hover:text-[#FFD700] transition">
                        Masuk di sini →
                    </a>
                </p>
            </div>
        </div>
        
        <!-- Info Card -->
        <div class="mt-6 bg-[#FFD700]/10 border border-[#FFD700]/20 rounded-lg p-4 text-center text-sm text-gray-300">
            <p>✓ Daftar untuk menjadi bagian dari keluarga Garuda Hustler</p>
        </div>
    </div>
</section>
@endsection
