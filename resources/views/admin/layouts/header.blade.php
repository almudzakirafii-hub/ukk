<!-- Header -->
<header class="h-16 bg-gradient-to-r from-[#1a1f35] to-[#0d1b2a] border-b border-[#FFD700]/20 flex items-center justify-between px-6">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logos/LOGO GARUDA HUSTLER.png') }}" alt="Garuda Hustler" class="w-10 h-10 object-contain">
        <h1 class="text-2xl font-bold text-[#FFD700]">@yield('page-title', 'Dashboard')</h1>
    </div>
    
    <div class="flex items-center space-x-4">
        <a href="{{ route('home') }}" class="text-[#FFD700] hover:text-[#FF8C00] font-semibold transition">
            ← Kembali ke Website
        </a>
        
        <div class="border-l border-[#FFD700]/20 pl-4">
            <div class="text-sm text-white">{{ auth()->user()->name }}</div>
            <div class="text-xs text-[#FFD700]/70">{{ ucfirst(auth()->user()->role) }}</div>
        </div>
    </div>
</header>
