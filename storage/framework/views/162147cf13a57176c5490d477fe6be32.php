

<?php $__env->startSection('title', 'Tim Kami'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative min-h-[400px] bg-gradient-to-br from-[#0d1b2a] via-[#1a1f35] to-[#0d1b2a] text-white overflow-hidden flex items-center py-16">
    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/20"></div>
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-[#FFD700] rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-[#FF8C00] rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <h1 class="text-5xl md:text-6xl font-black mb-4 drop-shadow-lg" data-aos="fade-down">
            Tim <span class="text-[#FFD700]">Kami</span>
        </h1>
        <p class="text-xl text-gray-200 max-w-2xl drop-shadow-md" data-aos="fade-down" data-aos-delay="100">
            Mengenal lebih jauh tentang pemain-pemain berbakat Garuda Hustler
        </p>
    </div>
</section>

<!-- Team Info Section -->
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if($team): ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Left Content -->
            <div class="lg:col-span-2" data-aos="fade-right">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-[#FFD700]"><?php echo e($team->name); ?></h2>
                <p class="text-lg text-gray-200 leading-relaxed mb-8"><?php echo e($team->description); ?></p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php if($team->founded_year): ?>
                    <div class="bg-gradient-to-br from-[#FFD700]/20 to-[#FF8C00]/20 rounded-2xl p-6 border border-[#FFD700]/40">
                        <h3 class="font-bold text-[#FFD700] text-sm uppercase tracking-wider mb-2">Tahun Berdiri</h3>
                        <p class="text-4xl font-black text-[#FFD700]"><?php echo e($team->founded_year); ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if($team->achievements): ?>
                    <div class="bg-gradient-to-br from-[#FF8C00]/20 to-[#FFD700]/20 rounded-2xl p-6 border border-[#FF8C00]/40">
                        <h3 class="font-bold text-[#FF8C00] text-sm uppercase tracking-wider mb-2">Prestasi Utama</h3>
                        <p class="text-gray-200 font-semibold"><?php echo e($team->achievements); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Right Logo Card -->
            <div class="lg:col-span-1" data-aos="fade-left">
                <div class="bg-gradient-to-br from-[#FFD700]/20 to-[#FF8C00]/20 rounded-3xl p-8 text-white shadow-2xl shadow-[#FFD700]/20 group hover:shadow-[0_0_30px_rgba(255,215,0,0.3)] transition-all border border-[#FFD700]/40">
                    <div class="text-center">
                        <img src="<?php echo e(asset('images/logos/LOGO GARUDA HUSTLER.png')); ?>" alt="Garuda Hustler" class="w-40 h-40 mx-auto mb-6 object-contain filter drop-shadow-lg group-hover:drop-shadow-[0_0_20px_rgba(255,215,0,0.8)] transition-all">
                        <div class="text-5xl font-black text-[#FFD700] mb-2"><?php echo e(count($players)); ?></div>
                        <div class="text-[#FF8C00] text-lg font-semibold">Pemain Aktif</div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Players Section -->
<section class="py-20 bg-gradient-to-b from-[#0d1b2a] to-[#1a1f35]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black mb-4" data-aos="fade-up">
                Roster <span class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] bg-clip-text text-transparent">Pemain</span>
            </h2>
            <p class="text-gray-300 text-lg" data-aos="fade-up" data-aos-delay="100">Inilah para talenta yang siap membawa tim ke prestasi tertinggi</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 50); ?>">
                <div class="bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a] rounded-2xl shadow-lg shadow-[#FFD700]/10 overflow-hidden hover:shadow-2xl hover:shadow-[#FFD700]/30 transition-all duration-300 transform hover:scale-105 border border-[#FFD700]/20">
                    <!-- Jersey Background -->
                    <div class="relative h-44 bg-gradient-to-br from-[#FFD700]/30 to-[#FF8C00]/30 flex items-center justify-center overflow-hidden border-b border-[#FFD700]/20">
                        <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                            <div class="absolute inset-0 bg-[radial-gradient(circle,white_1px,transparent_1px)] bg-size-[20px_20px]"></div>
                        </div>
                        <div class="relative text-center">
                            <div class="text-6xl font-black text-[#FFD700] drop-shadow-lg"><?php echo e($player->jersey_number); ?></div>
                            <div class="text-[#FF8C00] font-bold text-sm mt-2 drop-shadow"><?php echo e($player->position); ?></div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-3 line-clamp-2 text-[#FFD700]"><?php echo e($player->name); ?></h3>
                        
                        <?php if($player->height || $player->weight): ?>
                        <div class="space-y-2 text-sm mb-4 pb-4 border-b border-[#FFD700]/20 text-gray-300">
                            <?php if($player->height): ?>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tinggi</span>
                                <span class="font-bold text-blue-600"><?php echo e($player->height); ?> cm</span>
                            </div>
                            <?php endif; ?>
                            <?php if($player->weight): ?>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Berat</span>
                                <span class="font-bold text-blue-600"><?php echo e($player->weight); ?> kg</span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($player->birth_date): ?>
                        <div class="text-xs text-gray-600 mb-3">
                            📅 <?php echo e($player->birth_date->format('d M Y')); ?>

                        </div>
                        <?php endif; ?>
                        
                        <div class="inline-block bg-linear-to-r from-green-400 to-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            <?php echo e(ucfirst($player->status)); ?>

                        </div>
                    </div>
                    
                    <!-- Bottom Accent -->
                    <div class="h-1 bg-linear-to-r from-yellow-400 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="col-span-full text-center text-gray-500 py-12 text-lg">Belum ada data pemain</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Positions Guide -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-12 text-center">Posisi Pemain</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            <?php
                $positions = [
                    ['name' => 'Point Guard', 'desc' => 'Pembawa bola dan pengontrol permainan'],
                    ['name' => 'Shooting Guard', 'desc' => 'Penembak dan penyerang utama'],
                    ['name' => 'Small Forward', 'desc' => 'Pendukung penyerangan dan pertahanan'],
                    ['name' => 'Power Forward', 'desc' => 'Pemain kuat di area paint'],
                    ['name' => 'Center', 'desc' => 'Pertahanan dan pencetak poin area dalam'],
                ];
            ?>
            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a] rounded-lg shadow shadow-[#FFD700]/10 p-6 text-center hover:shadow-lg hover:shadow-[#FFD700]/30 transition border border-[#FFD700]/20" data-aos="zoom-in">
                <div class="bg-blue-100 text-blue-600 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 font-bold">
                    <?php echo e(substr($pos['name'], 0, 1)); ?>

                </div>
                <h3 class="font-bold mb-2"><?php echo e($pos['name']); ?></h3>
                <p class="text-gray-600 text-sm"><?php echo e($pos['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\garuda-smkn-ukk\resources\views/home/team.blade.php ENDPATH**/ ?>