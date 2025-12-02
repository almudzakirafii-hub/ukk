<?php $__env->startSection('title', 'Berita'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative min-h-[350px] bg-gradient-to-br from-[#0d1b2a] via-[#1a1f35] to-[#0d1b2a] text-white overflow-hidden flex items-center py-16">
    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/20"></div>
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-[#FFD700] rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-[#FF8C00] rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <h1 class="text-5xl md:text-6xl font-black mb-4 drop-shadow-lg" data-aos="fade-down">
            Berita <span class="text-[#FFD700]">Terbaru</span>
        </h1>
        <p class="text-xl text-gray-200 max-w-2xl drop-shadow-md" data-aos="fade-down" data-aos-delay="100">
            Tetap update dengan informasi dan berita terkini dari Garuda Hustler
        </p>
    </div>
</section>

<!-- News List -->
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <article class="group mb-8" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
            <div class="bg-gradient-to-r from-[#1a1f35] to-[#0d1b2a] rounded-2xl shadow-lg shadow-[#FFD700]/10 overflow-hidden hover:shadow-2xl hover:shadow-[#FFD700]/30 transition-all duration-300 grid grid-cols-1 md:grid-cols-3 border border-[#FFD700]/20">
                <!-- Featured Image -->
                <?php if($article->featured_image): ?>
                <div class="relative md:col-span-1 h-64 md:h-auto overflow-hidden bg-[#0d1b2a]">
                    <img src="<?php echo e(asset($article->featured_image)); ?>" alt="<?php echo e($article->title); ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                </div>
                <?php else: ?>
                <div class="relative md:col-span-1 h-64 md:h-auto bg-gradient-to-br from-[#FFD700]/20 to-[#FF8C00]/20 flex items-center justify-center">
                    <div class="text-5xl text-[#FFD700] opacity-50">📰</div>
                </div>
                <?php endif; ?>
                
                <!-- Content -->
                <div class="p-6 md:p-8 md:col-span-2 flex flex-col justify-between">
                    <!-- Meta Info -->
                    <div class="flex gap-3 mb-4 flex-wrap">
                        <span class="text-sm font-semibold text-[#FF8C00] flex items-center">
                            📅 <?php echo e($article->created_at->format('d M Y')); ?>

                        </span>
                        <?php if($article->category): ?>
                        <span class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-4 py-1 rounded-full text-sm font-bold">
                            <?php echo e($article->category); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Title -->
                    <h2 class="text-2xl md:text-3xl font-black mb-3 text-[#FFD700] line-clamp-2 group-hover:text-[#FF8C00] transition-colors">
                        <?php echo e($article->title); ?>

                    </h2>
                    
                    <!-- Excerpt -->
                    <p class="text-gray-300 mb-6 line-clamp-2 text-sm md:text-base">
                        <?php echo e(strip_tags($article->content)); ?>

                    </p>
                    
                    <!-- Read More Button -->
                    <a href="<?php echo e(route('news.detail', $article->slug)); ?>" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] font-bold rounded-xl hover:from-[#FF8C00] hover:to-[#FFD700] transition-all transform hover:scale-105 w-fit shadow-md group/btn">
                        Baca Selengkapnya
                        <svg class="w-5 h-5 ml-2 transform group-hover/btn:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    </a>
                </div>
            </div>
        </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center py-16">
            <div class="text-6xl mb-4">📰</div>
            <p class="text-lg text-gray-400">Belum ada berita</p>
        </div>
        <?php endif; ?>
        
        <!-- Pagination -->
        <?php if($news->hasPages()): ?>
        <div class="mt-12 flex justify-center">
            <?php echo e($news->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ukk\resources\views/home/news.blade.php ENDPATH**/ ?>