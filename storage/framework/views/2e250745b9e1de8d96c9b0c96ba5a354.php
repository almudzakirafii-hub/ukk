<!-- Header -->
<header class="h-16 bg-gradient-to-r from-[#1a1f35] to-[#0d1b2a] border-b border-[#FFD700]/20 flex items-center justify-between px-4 md:px-6">
    <div class="flex items-center space-x-3 flex-1">
        <!-- Hamburger Menu (Mobile) -->
        <button id="sidebarToggle" class="md:hidden text-[#FFD700] hover:text-[#FF8C00] transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        
        <img src="<?php echo e(asset('images/logos/LOGO GARUDA HUSTLER.png')); ?>" alt="Garuda Hustler" class="w-8 h-8 md:w-10 md:h-10 object-contain">
        <h1 class="text-lg md:text-2xl font-bold text-[#FFD700] truncate"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
    </div>
    
    <div class="flex items-center space-x-2 md:space-x-4">
        <a href="<?php echo e(route('home')); ?>" class="text-[#FFD700] hover:text-[#FF8C00] font-semibold transition text-xs md:text-base px-3 py-2 rounded-lg hover:bg-[#1a1f35]">
            <span class="hidden sm:inline">🏠 Website</span>
            <span class="sm:hidden">🏠</span>
        </a>
        
        <div class="border-l border-[#FFD700]/20 pl-2 md:pl-4">
            <div class="text-xs md:text-sm text-white"><?php echo e(auth()->user()->name); ?></div>
            <div class="text-xs text-[#FFD700]/70"><?php echo e(ucfirst(auth()->user()->role)); ?></div>
        </div>
        
        <!-- Logout Button (Mobile) -->
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="sm:hidden">
            <?php echo csrf_field(); ?>
            <button type="submit" class="text-[#FFD700] hover:text-[#FF8C00] transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </button>
        </form>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\ukk\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>