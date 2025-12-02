<?php $__env->startSection('title', 'Jadwal Pertandingan'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section -->
<section class="relative min-h-[350px] bg-gradient-to-br from-[#0d1b2a] via-[#1a1f35] to-[#0d1b2a] text-white overflow-hidden flex items-center py-16">

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-[#FFD700] rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-[#FF8C00] rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <h1 class="text-5xl md:text-6xl font-black mb-4 drop-shadow-lg" data-aos="fade-down">
            Jadwal <span class="text-[#FFD700]">Pertandingan</span>
        </h1>
        <p class="text-xl text-gray-200 max-w-2xl drop-shadow-md" data-aos="fade-down" data-aos-delay="100">
            Ikuti setiap pertandingan seru Garuda Hustler
        </p>
    </div>

</section>

<!-- Schedule List -->
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Filter Tabs -->
        <div class="mb-12 flex flex-wrap gap-3 justify-center" data-aos="fade-up">
            <a href="<?php echo e(route('schedule', ['filter' => 'all'])); ?>" class="px-6 py-3 rounded-full font-bold transition-all duration-300 <?php echo e(request('filter', 'all') === 'all' ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] shadow-lg shadow-[#FFD700]/50' : 'bg-[#1a1f35] border-2 border-[#FFD700]/30 text-[#FFD700] hover:border-[#FFD700]/60'); ?>">
                📅 Semua Jadwal
            </a>
            <a href="<?php echo e(route('schedule', ['filter' => 'upcoming'])); ?>" class="px-6 py-3 rounded-full font-bold transition-all duration-300 <?php echo e(request('filter') === 'upcoming' ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] shadow-lg shadow-[#FFD700]/50' : 'bg-[#1a1f35] border-2 border-[#FF8C00]/30 text-[#FF8C00] hover:border-[#FF8C00]/60'); ?>">
                🔔 Yang Akan Datang
            </a>
            <a href="<?php echo e(route('schedule', ['filter' => 'completed'])); ?>" class="px-6 py-3 rounded-full font-bold transition-all duration-300 <?php echo e(request('filter') === 'completed' ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] shadow-lg shadow-[#FFD700]/50' : 'bg-[#1a1f35] border-2 border-green-500/30 text-green-400 hover:border-green-500/60'); ?>">
                ✓ Sudah Selesai
            </a>
        </div>

        <?php $__empty_1 = true; $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="group mb-6" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
            <div class="bg-gradient-to-r from-[#1a1f35] to-[#0d1b2a] rounded-2xl shadow-lg shadow-[#FFD700]/10 hover:shadow-2xl hover:shadow-[#FFD700]/30 transition-all duration-300 overflow-hidden border border-[#FFD700]/20">
                <?php $borderColor = $match->status === 'completed' ? '#FFD700' : ($match->status === 'scheduled' ? '#FF8C00' : '#6b7280'); ?>
                <div class="p-6 md:p-8 border-l-4 group-hover:border-l-[#FFD700] transition-colors" style="border-left-color: <?php echo $borderColor; ?>">
                    
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 items-center">
                        <!-- Date -->
                        <div class="md:text-center bg-gradient-to-br from-[#FFD700]/20 to-[#FF8C00]/20 rounded-xl p-4 md:p-6 border border-[#FFD700]/30">
                            <div class="text-sm font-black text-[#FFD700] uppercase tracking-wide"><?php echo e($match->match_date->format('M')); ?></div>
                            <div class="text-5xl font-black text-[#FFD700]"><?php echo e($match->match_date->format('d')); ?></div>
                            <div class="text-sm font-semibold text-[#FF8C00]"><?php echo e($match->match_date->format('H:i')); ?> WIB</div>
                        </div>

                        <!-- Teams & Score -->
                        <div class="md:col-span-3">
                            <div class="grid grid-cols-3 gap-3 items-center">
                                <div class="text-right">
                                    <div class="font-black text-lg text-[#FFD700]">GARUDA<br/>HUSTLER</div>
                                    <div class="text-[#FF8C00]/70 text-xs mt-1 font-semibold uppercase"><?php echo e(ucfirst($match->type)); ?></div>
                                </div>

                                <div class="text-center py-4 border-y-2 border-[#FFD700]/30">
                                    <?php if($match->status === 'completed'): ?>
                                        <div class="text-4xl font-black text-[#FFD700]">
                                            <?php echo e($match->team_score ?? '0'); ?> - <?php echo e($match->opponent_score ?? '0'); ?>

                                        </div>
                                        <div class="text-xs text-[#FFD700] font-bold mt-1">✓ SELESAI</div>
                                    <?php else: ?>
                                        <div class="text-3xl font-black text-[#FF8C00]/50">VS</div>
                                        <div class="text-xs text-[#FF8C00] font-bold mt-1 uppercase"><?php echo e(ucfirst($match->status)); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="text-left">
                                    <div class="font-black text-lg text-[#FF8C00]"><?php echo e(strtoupper($match->opponent)); ?></div>
                                    <div class="text-gray-400 text-xs mt-1 font-semibold">📍 <?php echo e($match->location); ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        <div class="text-center">
                            <?php if($match->status === 'completed'): ?>
                                <span class="inline-flex items-center px-5 py-3 bg-linear-to-r from-green-400 to-green-500 text-white rounded-full text-sm font-bold shadow-lg">
                                    ✓ Selesai
                                </span>
                            <?php elseif($match->status === 'scheduled'): ?>
                                <span class="inline-flex items-center px-5 py-3 bg-linear-to-r from-yellow-400 to-yellow-500 text-gray-900 rounded-full text-sm font-bold shadow-lg">
                                    🔔 Jadwal
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-5 py-3 bg-linear-to-r from-gray-400 to-gray-500 text-white rounded-full text-sm font-bold shadow-lg">
                                    ✕ Batal
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Notes -->
                    <?php if(!empty($match->notes)): ?>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <p class="text-gray-600 text-sm"><strong>Catatan:</strong> <?php echo e($match->notes); ?></p>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center py-16">
            <div class="text-6xl mb-4">📋</div>
            <p class="text-lg text-gray-400 mb-6">
                <?php if(request('filter') === 'upcoming'): ?>
                    Belum ada jadwal pertandingan yang akan datang
                <?php elseif(request('filter') === 'completed'): ?>
                    Belum ada pertandingan yang selesai
                <?php else: ?>
                    Belum ada jadwal pertandingan
                <?php endif; ?>
            </p>
            <a href="<?php echo e(route('schedule')); ?>" class="inline-block px-6 py-3 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] rounded-full font-bold hover:shadow-lg hover:shadow-[#FFD700]/30 transition">
                Lihat Semua Jadwal
            </a>
        </div>
        <?php endif; ?>

        <!-- Pagination if using LengthAwarePaginator -->
        <div class="mt-8">
            <?php if(method_exists($matches, 'links')): ?>
                <?php echo e($matches->links()); ?>

            <?php endif; ?>
        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ukk\resources\views/home/schedule.blade.php ENDPATH**/ ?>