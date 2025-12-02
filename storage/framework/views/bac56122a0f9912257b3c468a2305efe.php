<nav class="sticky top-0 z-50 bg-gradient-to-r from-[#0d1b2a] to-[#1a1f35] border-b-2 border-[#FFD700] shadow-lg shadow-[#FF8C00]/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-3">
            <!-- Left: Logo & Brand -->
            <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-2 group shrink-0">
                <img src="<?php echo e(asset('images/logos/LOGO GARUDA HUSTLER.png')); ?>" alt="Garuda Hustler" class="w-12 h-12 object-contain transform group-hover:scale-110 transition duration-300">
                <div class="hidden sm:block">
                    <div class="text-[#FFD700] font-bold text-sm">Garuda Hustler</div>
                    <div class="text-[#FF8C00] text-xs">SMKN 1 Garut</div>
                </div>
            </a>
            
            <!-- Center: Desktop Menu -->
            <div class="hidden lg:flex items-center bg-[#1a1f35]/50 rounded-full px-8 py-2 space-x-1 mx-auto border border-[#FF8C00]/30">
                <a href="<?php echo e(route('home')); ?>" class="text-[#FFD700] hover:text-[#FF8C00] px-4 py-2 rounded-full font-medium text-sm transition duration-200 hover:bg-[#FF8C00]/10">Home</a>
                <a href="<?php echo e(route('team')); ?>" class="text-[#FFD700] hover:text-[#FF8C00] px-4 py-2 rounded-full font-medium text-sm transition duration-200 hover:bg-[#FF8C00]/10">Tim</a>
                <a href="<?php echo e(route('schedule')); ?>" class="text-[#FFD700] hover:text-[#FF8C00] px-4 py-2 rounded-full font-medium text-sm transition duration-200 hover:bg-[#FF8C00]/10">Jadwal</a>
                <a href="<?php echo e(route('gallery')); ?>" class="text-[#FFD700] hover:text-[#FF8C00] px-4 py-2 rounded-full font-medium text-sm transition duration-200 hover:bg-[#FF8C00]/10">Galeri</a>
                <a href="<?php echo e(route('news')); ?>" class="text-[#FFD700] hover:text-[#FF8C00] px-4 py-2 rounded-full font-medium text-sm transition duration-200 hover:bg-[#FF8C00]/10">Berita</a>
            </div>
            
            <!-- Right: Auth & Admin -->
            <div class="flex items-center space-x-3 lg:space-x-4">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="hidden sm:inline-block bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-6 py-2 rounded-full font-bold text-sm hover:shadow-lg hover:shadow-[#FFD700]/50 transition">
                            Admin Panel
                        </a>
                    <?php endif; ?>
                    <div class="relative group hidden sm:block">
                        <button class="text-[#FFD700] font-semibold text-sm hover:text-[#FF8C00] transition">
                            <?php echo e(auth()->user()->name); ?>

                        </button>
                        <div class="absolute right-0 w-48 bg-[#1a1f35] text-white rounded-xl shadow-xl shadow-[#FF8C00]/20 opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto z-50 border border-[#FF8C00]/30">
                            <a href="#" class="block px-4 py-3 hover:bg-[#FF8C00]/20 rounded-t-xl font-medium text-sm text-[#FFD700]">Profil</a>
                            <form method="POST" action="<?php echo e(route('logout')); ?>" class="block">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="w-full text-left px-4 py-3 hover:bg-red-500/20 rounded-b-xl font-medium text-sm text-red-400">Logout</button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="hidden sm:inline-block text-[#FFD700] hover:text-[#FF8C00] font-semibold text-sm transition">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-6 py-2 rounded-full font-bold text-sm hover:shadow-lg hover:shadow-[#FFD700]/50 transition">
                        Daftar
                    </a>
                <?php endif; ?>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-[#FFD700] hover:text-[#FF8C00] ml-2" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4 space-y-2 border-t border-[#FF8C00]/30">
            <a href="<?php echo e(route('home')); ?>" class="block text-[#FFD700] hover:bg-[#FF8C00]/20 px-4 py-2 rounded-lg font-medium text-sm">Home</a>
            <a href="<?php echo e(route('team')); ?>" class="block text-[#FFD700] hover:bg-[#FF8C00]/20 px-4 py-2 rounded-lg font-medium text-sm">Tim</a>
            <a href="<?php echo e(route('schedule')); ?>" class="block text-[#FFD700] hover:bg-[#FF8C00]/20 px-4 py-2 rounded-lg font-medium text-sm">Jadwal</a>
            <a href="<?php echo e(route('gallery')); ?>" class="block text-[#FFD700] hover:bg-[#FF8C00]/20 px-4 py-2 rounded-lg font-medium text-sm">Galeri</a>
            <a href="<?php echo e(route('news')); ?>" class="block text-[#FFD700] hover:bg-[#FF8C00]/20 px-4 py-2 rounded-lg font-medium text-sm">Berita</a>
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->role === 'admin'): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="block bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-4 py-2 rounded-lg font-bold text-sm">Admin Panel</a>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="block">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full text-left px-4 py-2 bg-red-500/20 text-red-400 rounded-lg font-medium text-sm">Logout</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="block text-[#FFD700] hover:bg-[#FF8C00]/20 px-4 py-2 rounded-lg font-medium text-sm">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="block bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-4 py-2 rounded-lg font-bold text-sm text-center">Daftar</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\ukk\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>