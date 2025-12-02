

<?php $__env->startSection('title', 'Galeri Foto'); ?>

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
            Galeri <span class="text-[#FFD700]">Foto</span>
        </h1>
        <p class="text-xl text-gray-200 max-w-2xl drop-shadow-md" data-aos="fade-down" data-aos-delay="100">
            Koleksi momen-momen berharga dan spesial dari Garuda Hustler
        </p>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($loop->first): ?>
        <div class="mb-12">
            <div class="group" data-aos="zoom-in">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-[#FFD700]/20 hover:shadow-[0_20px_60px_rgba(255,215,0,0.2)] transition-all duration-300 border border-[#FFD700]/20">
                    <img src="<?php echo e(asset($gallery->image)); ?>" alt="<?php echo e($gallery->title); ?>" class="w-full h-96 object-cover transform group-hover:scale-110 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0d1b2a] via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white transform translate-y-10 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-3xl font-black mb-2 text-[#FFD700]"><?php echo e($gallery->title); ?></h3>
                        <p class="text-gray-300 line-clamp-2 mb-3"><?php echo e($gallery->description); ?></p>
                        <div class="flex gap-4 text-sm">
                            <?php if($gallery->taken_date): ?>
                            <span class="flex items-center">📅 <?php echo e($gallery->taken_date->format('d M Y')); ?></span>
                            <?php endif; ?>
                            <?php if($gallery->category): ?>
                            <span class="flex items-center">🏷️ <?php echo e($gallery->category); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__empty_2 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
            <div class="group" data-aos="zoom-in" data-aos-delay="<?php echo e($loop->index * 50); ?>">
                <div class="relative rounded-2xl overflow-hidden shadow-lg shadow-[#FFD700]/10 hover:shadow-2xl hover:shadow-[#FFD700]/30 transition-all duration-300 h-72 bg-[#1a1f35] border border-[#FFD700]/20">
                    <img src="<?php echo e(asset($gallery->image)); ?>" alt="<?php echo e($gallery->title); ?>" class="w-full h-full object-cover transform group-hover:scale-120 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0d1b2a] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform duration-300">
                        <h4 class="font-bold text-lg line-clamp-1 text-[#FFD700]"><?php echo e($gallery->title); ?></h4>
                        <p class="text-sm text-gray-300 line-clamp-1"><?php echo e($gallery->description); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
            <div class="col-span-full text-center py-16">
                <div class="text-6xl mb-4">📸</div>
                <p class="text-lg text-gray-400">Belum ada galeri foto</p>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Pagination -->
        <?php if($galleries->hasPages()): ?>
        <div class="mt-12 flex justify-center">
            <?php echo e($galleries->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\garuda-smkn-ukk\resources\views/home/gallery.blade.php ENDPATH**/ ?>