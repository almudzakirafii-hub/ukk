<?php $__env->startSection('page-title', 'Tambah Pertandingan'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl">
    <a href="<?php echo e(route('admin.matches.index')); ?>" class="text-[#FFD700] hover:text-[#FF8C00] font-bold mb-6 inline-block">← Kembali</a>
    
    <div class="bg-[#1a1f35]/50 border border-[#FFD700]/30 rounded-lg shadow-xl p-8">
        <h1 class="text-3xl font-bold mb-8 text-[#FFD700]">Tambah Pertandingan Baru</h1>
        
        <form method="POST" action="<?php echo e(route('admin.matches.store')); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>
            
            <div>
                <label for="team_id" class="block text-sm font-bold text-[#FFD700] mb-2">Tim</label>
                <select id="team_id" name="team_id" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required>
                    <option value="">Pilih Tim</option>
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($team->id); ?>"><?php echo e($team->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            
            <div>
                <label for="opponent" class="block text-sm font-bold text-[#FFD700] mb-2">Tim Lawan</label>
                <input type="text" id="opponent" name="opponent" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white placeholder-white/50 focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required value="<?php echo e(old('opponent')); ?>" placeholder="Nama tim lawan">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="match_date" class="block text-sm font-bold text-[#FFD700] mb-2">Tanggal (Opsional)</label>
                    <input type="date" id="match_date" name="match_date" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" value="<?php echo e(old('match_date')); ?>">
                </div>
                
                <div>
                    <label for="match_time" class="block text-sm font-bold text-[#FFD700] mb-2">Waktu (Opsional)</label>
                    <input type="time" id="match_time" name="match_time" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" value="<?php echo e(old('match_time')); ?>">
                </div>
            </div>
            
            <div>
                <label for="location" class="block text-sm font-bold text-[#FFD700] mb-2">Lokasi</label>
                <input type="text" id="location" name="location" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white placeholder-white/50 focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required value="<?php echo e(old('location')); ?>" placeholder="Lokasi pertandingan">
            </div>
            
            <div>
                <label for="type" class="block text-sm font-bold text-[#FFD700] mb-2">Tipe</label>
                <select id="type" name="type" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required>
                    <option value="home">Home</option>
                    <option value="away">Away</option>
                </select>
            </div>
            
            <div>
                <label for="status" class="block text-sm font-bold text-[#FFD700] mb-2">Status</label>
                <select id="status" name="status" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required>
                    <option value="scheduled">Scheduled</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <!-- Score Fields (Optional) -->
            <div class="bg-[#0d1b2a]/30 border border-[#FF8C00]/20 rounded-lg p-6">
                <h3 class="text-sm font-bold text-[#FFD700] mb-4 uppercase tracking-wide">Skor Pertandingan (Opsional)</h3>
                <p class="text-xs text-white/60 mb-4">Anda bisa mengisi skor sekarang atau nanti saat edit pertandingan</p>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="team_score" class="block text-sm font-bold text-[#FFD700] mb-2">Skor Garuda Hustler</label>
                        <input type="number" id="team_score" name="team_score" min="0" class="w-full bg-[#0d1b2a]/50 border border-[#FF8C00]/30 rounded-lg px-4 py-2 text-white placeholder-white/50 focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" value="<?php echo e(old('team_score', '')); ?>" placeholder="0">
                    </div>
                    
                    <div>
                        <label for="opponent_score" class="block text-sm font-bold text-[#FFD700] mb-2">Skor Lawan</label>
                        <input type="number" id="opponent_score" name="opponent_score" min="0" class="w-full bg-[#0d1b2a]/50 border border-[#FF8C00]/30 rounded-lg px-4 py-2 text-white placeholder-white/50 focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" value="<?php echo e(old('opponent_score', '')); ?>" placeholder="0">
                    </div>
                </div>
            </div>
            
            <div class="flex gap-4 pt-4">
                <button type="submit" class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-8 py-3 rounded-lg font-bold hover:shadow-lg hover:shadow-[#FFD700]/30 transition">Simpan</button>
                <a href="<?php echo e(route('admin.matches.index')); ?>" class="bg-[#0d1b2a]/50 border border-[#FFD700]/30 text-[#FFD700] px-8 py-3 rounded-lg font-bold hover:bg-[#1a1f35] transition">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ukk\resources\views/admin/matches/create.blade.php ENDPATH**/ ?>