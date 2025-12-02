<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<!-- Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-gray-500 text-sm">Total Pemain</div>
                <div class="text-3xl font-bold text-gray-900"><?php echo e($stats['total_players']); ?></div>
            </div>
            <div class="bg-blue-100 p-3 rounded-lg">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-gray-500 text-sm">Total Pertandingan</div>
                <div class="text-3xl font-bold text-gray-900"><?php echo e($stats['total_matches']); ?></div>
            </div>
            <div class="bg-green-100 p-3 rounded-lg">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-gray-500 text-sm">Total Galeri</div>
                <div class="text-3xl font-bold text-gray-900"><?php echo e($stats['total_galleries']); ?></div>
            </div>
            <div class="bg-yellow-100 p-3 rounded-lg">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-gray-500 text-sm">Total Berita</div>
                <div class="text-3xl font-bold text-gray-900"><?php echo e($stats['total_news']); ?></div>
            </div>
            <div class="bg-red-100 p-3 rounded-lg">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2v-5.5a2 2 0 012-2h2.5a2 2 0 012 2v5.5a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Matches -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold">Pertandingan Terbaru</h2>
        </div>
        <div class="divide-y">
            <?php $__empty_1 = true; $__currentLoopData = $recentMatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="p-4 hover:bg-gray-50">
                <div class="flex justify-between items-center mb-2">
                    <div class="font-bold"><?php echo e($match->opponent); ?></div>
                    <span class="text-xs px-2 py-1 rounded-full <?php echo e($match->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'); ?>">
                        <?php echo e(ucfirst($match->status)); ?>

                    </span>
                </div>
                <div class="text-sm text-gray-600">
                    <?php echo e($match->match_date->format('d M Y H:i')); ?> • <?php echo e($match->location); ?>

                </div>
                <?php if($match->status === 'completed'): ?>
                <div class="text-sm font-semibold mt-2 text-gray-900">
                    Skor: <?php echo e($match->team_score); ?> - <?php echo e($match->opponent_score); ?>

                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="p-4 text-gray-500">Belum ada pertandingan</div>
            <?php endif; ?>
        </div>
        <div class="p-4 border-t">
            <a href="<?php echo e(route('admin.matches.index')); ?>" class="text-blue-600 font-bold hover:text-blue-700">
                Lihat Semua →
            </a>
        </div>
    </div>
    
    <!-- Recent News -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold">Berita Terbaru</h2>
        </div>
        <div class="divide-y">
            <?php $__empty_1 = true; $__currentLoopData = $recentNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="p-4 hover:bg-gray-50">
                <div class="flex justify-between items-center mb-2">
                    <div class="font-bold line-clamp-1"><?php echo e($article->title); ?></div>
                    <span class="text-xs px-2 py-1 rounded-full <?php echo e($article->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700'); ?>">
                        <?php echo e(ucfirst($article->status)); ?>

                    </span>
                </div>
                <div class="text-sm text-gray-600">
                    <?php echo e($article->created_at->format('d M Y')); ?> • Oleh <?php echo e($article->user->name); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="p-4 text-gray-500">Belum ada berita</div>
            <?php endif; ?>
        </div>
        <div class="p-4 border-t">
            <a href="<?php echo e(route('admin.news.index')); ?>" class="text-blue-600 font-bold hover:text-blue-700">
                Lihat Semua →
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ukk\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>