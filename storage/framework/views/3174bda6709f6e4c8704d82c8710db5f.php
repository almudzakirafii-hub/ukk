<!-- Sidebar -->
<div class="sidebar w-64 bg-[#0d1b2a] text-white flex flex-col border-r border-[#FFD700]/20">

    <!-- Logo + Nama Club -->
    <div class="flex flex-col items-center justify-center py-6 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a]">
        <img 
            src="<?php echo e(asset('images/logos/LOGO GARUDA HUSTLER.png')); ?>" 
            alt="Garuda Hustler" 
            class="h-16 w-auto mb-3 object-contain drop-shadow-md"
        >

        <!-- Nama Club -->
        <div class="text-2xl font-extrabold uppercase tracking-wider drop-shadow">
            Garuda Hustler
        </div>

        <!-- Subjudul -->
        <div class="text-sm font-bold opacity-90 tracking-wide">
            Admin Panel
        </div>
    </div>

    <!-- Menu Items -->
    <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
        <a href="<?php echo e(route('admin.dashboard')); ?>" 
           class="block px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] font-bold' : 'text-white hover:bg-[#1a1f35]'); ?> transition">
            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l4-4m0 0l4 4m-4-4v4">
                </path>
            </svg>
            Dashboard
        </a>
        
        <a href="<?php echo e(route('admin.players.index')); ?>" 
           class="block px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.players.*') ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] font-bold' : 'text-white hover:bg-[#1a1f35]'); ?> transition">
            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20h12a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                </path>
            </svg>
            Pemain
        </a>

        <a href="<?php echo e(route('admin.matches.index')); ?>" 
           class="block px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.matches.*') ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] font-bold' : 'text-white hover:bg-[#1a1f35]'); ?> transition">
            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            Pertandingan
        </a>

        <a href="<?php echo e(route('admin.gallery.index')); ?>" 
           class="block px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.gallery.*') ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] font-bold' : 'text-white hover:bg-[#1a1f35]'); ?> transition">
            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            Galeri
        </a>

        <a href="<?php echo e(route('admin.news.index')); ?>" 
           class="block px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.news.*') ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] font-bold' : 'text-white hover:bg-[#1a1f35]'); ?> transition">
            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2v-5.5a2 2 0 012-2h2.5a2 2 0 012 2v5.5a2 2 0 01-2 2z">
                </path>
            </svg>
            Berita
        </a>
    </nav>

    <!-- Logout -->
    <div class="px-4 py-4 border-t border-[#FFD700]/20">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" 
                    class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800 transition flex items-center font-semibold">
                <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\ukk\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>