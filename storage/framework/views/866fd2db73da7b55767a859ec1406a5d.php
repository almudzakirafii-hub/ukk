<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section (Garuda Hustler Themed) -->
<section class="relative min-h-screen bg-gradient-to-br from-[#0d1b2a] via-[#1a1f35] to-[#0d1b2a] text-white overflow-hidden flex items-center py-20">

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/30"></div>

    <!-- Soft Background Blurs with Team Colors -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-32 -right-32 w-72 h-72 bg-[#FF8C00] rounded-full blur-3xl opacity-15"></div>
        <div class="absolute -bottom-32 -left-32 w-72 h-72 bg-[#FFD700] rounded-full blur-3xl opacity-15"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

            <!-- Left Content -->
            <div data-aos="fade-up" class="space-y-6">

                <span class="inline-block bg-[#FFD700]/20 text-[#FFD700] px-4 py-2 rounded-full text-sm font-semibold border border-[#FFD700]/40">
                    🏀 TIM BASKET
                </span>

                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-tight drop-shadow-lg">
                    Garuda <br />
                    <span class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] bg-clip-text text-transparent drop-shadow-md">
                        Hustler
                    </span>
                </h1>

                <p class="text-lg text-gray-100 leading-relaxed max-w-lg drop-shadow-md">
                    Tim basket profesional dari SMK Negeri 1 Garut yang berkomitmen meraih prestasi tertinggi dalam setiap kompetisi dengan semangat dan kerja keras.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <a href="<?php echo e(route('team')); ?>"
                        class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] font-bold rounded-xl hover:shadow-lg hover:shadow-[#FFD700]/50 transition-all transform hover:scale-105 shadow-lg">
                        Lihat Roster →
                    </a>

                    <a href="<?php echo e(route('schedule')); ?>"
                        class="inline-flex items-center justify-center px-8 py-4 bg-white/10 text-[#FFD700] font-bold rounded-xl border border-[#FFD700]/40 hover:bg-[#FFD700]/20 transition-all backdrop-blur-sm">
                        Jadwal Pertandingan
                    </a>
                </div>
            </div>

            <!-- Right Logo -->
            <div data-aos="fade-up" class="hidden lg:flex justify-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-[#FFD700]/20 rounded-3xl blur-2xl opacity-20"></div>

                    <div class="relative bg-white/5 backdrop-blur-lg rounded-3xl p-10 border-2 border-[#FFD700]/40 hover:border-[#FFD700] transition-all">
                        <img src="<?php echo e(asset('images/logos/LOGO GARUDA HUSTLER.png')); ?>"
                            class="w-80 h-80 object-contain drop-shadow-2xl" alt="Garuda Hustler">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2">
        <div class="animate-bounce">
            <svg class="w-6 h-6 text-white opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
            <?php
                $stats = [
                    ['number' => count($players), 'label' => 'Pemain Aktif', 'icon' => '👥', 'color' => 'from-[#FFD700] to-[#FF8C00]'],
                    ['number' => count($matches), 'label' => 'Pertandingan', 'icon' => '🏀', 'color' => 'from-[#FF8C00] to-[#FFD700]'],
                    ['number' => count($galleries) > 0 ? count($galleries) : '0', 'label' => 'Foto', 'icon' => '📸', 'color' => 'from-[#FFD700] to-[#FF8C00]'],
                    ['number' => count($news) > 0 ? count($news) : '0', 'label' => 'Berita', 'icon' => '📰', 'color' => 'from-[#FF8C00] to-[#FFD700]'],
                ];
            ?>
            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                <div class="relative bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a] rounded-2xl shadow-md shadow-[#FFD700]/10 hover:shadow-2xl hover:shadow-[#FFD700]/30 transition-all transform hover:scale-105 overflow-hidden h-full border border-[#FFD700]/20">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br <?php echo e($stat['color']); ?> opacity-0 group-hover:opacity-10 transition-opacity"></div>

                    <!-- Content -->
                    <div class="relative p-6 md:p-8 flex flex-col items-center justify-center text-center">
                        <div class="text-4xl md:text-5xl mb-3"><?php echo e($stat['icon']); ?></div>
                        <div class="text-3xl md:text-4xl font-black bg-gradient-to-r <?php echo e($stat['color']); ?> bg-clip-text text-transparent mb-2">
                            <?php echo e($stat['number']); ?>

                        </div>
                        <div class="text-gray-300 font-semibold text-sm md:text-base"><?php echo e($stat['label']); ?></div>
                    </div>

                    <!-- Bottom Border Accent -->
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r <?php echo e($stat['color']); ?> transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Players Section -->
<section class="py-20 bg-gradient-to-b from-[#0d1b2a] to-[#1a1f35]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black mb-4" data-aos="fade-up">
                Pemain <span class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] bg-clip-text text-transparent">Kami</span>
            </h2>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Talenta-talenta terbaik yang siap membawa Garuda Hustler ke level tertinggi
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 50); ?>">
                <div class="bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a] rounded-2xl shadow-lg shadow-[#FFD700]/10 overflow-hidden hover:shadow-2xl hover:shadow-[#FFD700]/30 transition-all duration-300 transform hover:scale-105 border border-[#FFD700]/20">
                    <!-- Jersey Number Background -->
                    <div class="relative h-40 bg-gradient-to-br from-[#FFD700]/30 to-[#FF8C00]/30 flex items-center justify-center overflow-hidden border-b border-[#FFD700]/20">
                        <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                            <div class="absolute inset-0 bg-[radial-gradient(circle,white_1px,transparent_1px)] bg-size-[20px_20px]"></div>
                        </div>
                        <div class="relative text-center">
                            <div class="text-6xl md:text-7xl font-black text-[#FFD700] drop-shadow-lg"><?php echo e($player->jersey_number); ?></div>
                            <div class="text-[#FF8C00] font-bold text-sm md:text-base mt-2 drop-shadow"><?php echo e($player->position); ?></div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-3 line-clamp-2 text-[#FFD700]"><?php echo e($player->name); ?></h3>

                        <?php if($player->height || $player->weight): ?>
                        <div class="space-y-2 text-sm text-gray-300">
                            <?php if($player->height): ?>
                            <div class="flex justify-between items-center py-2 border-b border-[#FFD700]/20">
                                <span class="text-gray-400">Tinggi</span>
                                <span class="font-bold text-[#FFD700]"><?php echo e($player->height); ?> cm</span>
                            </div>
                            <?php endif; ?>
                            <?php if($player->weight): ?>
                            <div class="flex justify-between items-center pt-2">
                                <span class="text-gray-400">Berat</span>
                                <span class="font-bold text-[#FF8C00]"><?php echo e($player->weight); ?> kg</span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Bottom Accent -->
                    <div class="h-1 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="col-span-full text-center text-gray-400 py-8">Belum ada pemain</p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-16">
            <a href="<?php echo e(route('team')); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] font-bold rounded-xl hover:from-[#FF8C00] hover:to-[#FFD700] transition-all transform hover:scale-105 shadow-lg">
                Lihat Semua Pemain
                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Schedule Section -->
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-12 text-[#FFD700]" data-aos="fade-up">Jadwal Pertandingan</h2>

        <div class="space-y-4">
            <?php $__empty_1 = true; $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-gradient-to-r from-[#1a1f35] to-[#0d1b2a] rounded-lg shadow shadow-[#FFD700]/10 p-6 hover:shadow-lg hover:shadow-[#FFD700]/30 transition border border-[#FFD700]/20" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                    <div>
                        <div class="text-sm text-gray-400"><?php echo e($match->match_date->format('d M Y')); ?></div>
                        <div class="font-bold text-lg text-[#FFD700]"><?php echo e($match->match_date->format('H:i')); ?></div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-400">GARUDA HUSTLER</div>
                        <div class="font-bold text-[#FFD700]"><?php echo e($match->team_score ?? '-'); ?></div>
                    </div>
                    <div class="text-center">
                        <div class="text-sm text-gray-400"><?php echo e(ucfirst($match->type)); ?></div>
                        <div class="font-bold text-[#FF8C00]"><?php echo e($match->opponent); ?></div>
                    </div>
                    <div>
                        <div class="font-bold text-[#FFD700]"><?php echo e($match->opponent_score ?? '-'); ?></div>
                        <div class="text-sm text-gray-400"><?php echo e($match->location); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-gray-400">Belum ada jadwal pertandingan</p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('schedule')); ?>" class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-8 py-3 rounded-lg font-bold hover:from-[#FF8C00] hover:to-[#FFD700] transition inline-block shadow-md">
                Lihat Jadwal Lengkap
            </a>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-20 bg-gradient-to-b from-[#0d1b2a] to-[#1a1f35]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-12 text-[#FFD700]" data-aos="fade-up">Galeri Foto</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="rounded-lg overflow-hidden shadow-lg shadow-[#FFD700]/10 hover:shadow-xl hover:shadow-[#FFD700]/30 transition transform hover:scale-105 cursor-pointer border border-[#FFD700]/20" data-aos="zoom-in">
                <img src="<?php echo e(asset($gallery->image)); ?>" alt="<?php echo e($gallery->title); ?>" class="w-full h-64 object-cover">
                <div class="p-4 bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a]">
                    <h3 class="font-bold text-lg mb-2 text-[#FFD700]"><?php echo e($gallery->title); ?></h3>
                    <p class="text-gray-400 text-sm line-clamp-2"><?php echo e($gallery->description); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="col-span-full text-center text-gray-400">Belum ada galeri foto</p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('gallery')); ?>" class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-8 py-3 rounded-lg font-bold hover:from-[#FF8C00] hover:to-[#FFD700] transition inline-block shadow-md">
                Lihat Galeri Lengkap
            </a>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-12 text-[#FFD700]" data-aos="fade-up">Berita Terbaru</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a] rounded-lg shadow-lg shadow-[#FFD700]/10 overflow-hidden hover:shadow-xl hover:shadow-[#FFD700]/30 transition border border-[#FFD700]/20" data-aos="fade-up">
                <?php if($article->featured_image): ?>
                <img src="<?php echo e(asset($article->featured_image)); ?>" alt="<?php echo e($article->title); ?>" class="w-full h-48 object-cover">
                <?php endif; ?>
                <div class="p-6">
                    <div class="text-sm text-gray-400 mb-2">
                        <?php echo e($article->created_at->format('d M Y')); ?>

                    </div>
                    <h3 class="font-bold text-xl mb-3 line-clamp-2 text-[#FFD700]"><?php echo e($article->title); ?></h3>
                    <p class="text-gray-400 mb-4 line-clamp-3"><?php echo e(strip_tags($article->content)); ?></p>
                    <a href="<?php echo e(route('news.detail', $article->slug)); ?>" class="text-[#FF8C00] font-bold hover:text-[#FFD700] transition">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="col-span-full text-center text-gray-400">Belum ada berita</p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('news')); ?>" class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-8 py-3 rounded-lg font-bold hover:from-[#FF8C00] hover:to-[#FFD700] transition inline-block shadow-md">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-[#0d1b2a] to-[#1a1f35] text-white py-16 border-t border-[#FFD700]/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6 text-[#FFD700]">Bergabunglah dengan Kami</h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Dukung tim basket kami dengan mengikuti perkembangan terbaru melalui media sosial dan website resmi kami.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="https://instagram.com/hustler_basketball" target="_blank" class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-8 py-3 rounded-lg font-bold hover:from-[#FF8C00] hover:to-[#FFD700] transition shadow-md">
                Follow Kami
            </a>
            <a href="https://wa.me/628212334705?text=Halo%20Garuda%20Hustler" target="_blank" class="bg-[#FFD700] text-[#0d1b2a] px-8 py-3 rounded-lg font-bold hover:bg-[#FF8C00] transition shadow-md">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ukk\resources\views/home/index.blade.php ENDPATH**/ ?>