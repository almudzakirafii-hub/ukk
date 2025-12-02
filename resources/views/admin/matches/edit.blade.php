@extends('admin.layouts.app')

@section('page-title', 'Edit Pertandingan')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.matches.index') }}" class="text-[#FFD700] hover:text-[#FF8C00] font-bold mb-6 inline-block">← Kembali</a>
    
    <div class="bg-[#1a1f35]/50 border border-[#FFD700]/30 rounded-lg shadow-xl p-8">
        <h1 class="text-3xl font-bold mb-8 text-[#FFD700]">Edit Pertandingan</h1>
        
        <form method="POST" action="{{ route('admin.matches.update', $match) }}" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="team_id" class="block text-sm font-bold text-[#FFD700] mb-2">Tim</label>
                <select id="team_id" name="team_id" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id === $match->team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="opponent" class="block text-sm font-bold text-[#FFD700] mb-2">Tim Lawan</label>
                <input type="text" id="opponent" name="opponent" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white placeholder-white/50 focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required value="{{ $match->opponent }}">
            </div>
            
            <div>
                <label for="match_date" class="block text-sm font-bold text-[#FFD700] mb-2">Tanggal & Waktu</label>
                <input type="datetime-local" id="match_date" name="match_date" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required value="{{ $match->match_date->format('Y-m-d\TH:i') }}">
            </div>
            
            <div>
                <label for="location" class="block text-sm font-bold text-[#FFD700] mb-2">Lokasi</label>
                <input type="text" id="location" name="location" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white placeholder-white/50 focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required value="{{ $match->location }}">
            </div>
            
            <div>
                <label for="type" class="block text-sm font-bold text-[#FFD700] mb-2">Tipe</label>
                <select id="type" name="type" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required>
                    <option value="home" {{ $match->type === 'home' ? 'selected' : '' }}>Home</option>
                    <option value="away" {{ $match->type === 'away' ? 'selected' : '' }}>Away</option>
                </select>
            </div>
            
            <div>
                <label for="status" class="block text-sm font-bold text-[#FFD700] mb-2">Status</label>
                <select id="status" name="status" class="w-full bg-[#0d1b2a]/50 border border-[#FFD700]/30 rounded-lg px-4 py-2 text-white focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" required>
                    <option value="scheduled" {{ $match->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="completed" {{ $match->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $match->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <!-- Score Fields (Optional) -->
            <div class="bg-[#0d1b2a]/30 border border-[#FF8C00]/20 rounded-lg p-6">
                <h3 class="text-sm font-bold text-[#FFD700] mb-4 uppercase tracking-wide">Skor Pertandingan (Opsional)</h3>
                <p class="text-xs text-white/60 mb-4">Isikan skor jika pertandingan sudah selesai atau jika Anda sudah mengetahui hasilnya</p>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="team_score" class="block text-sm font-bold text-[#FFD700] mb-2">Skor Garuda Hustler</label>
                        <input type="number" id="team_score" name="team_score" min="0" class="w-full bg-[#0d1b2a]/50 border border-[#FF8C00]/30 rounded-lg px-4 py-2 text-white placeholder-white/50 focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" value="{{ $match->team_score ?? '' }}" placeholder="0">
                    </div>
                    
                    <div>
                        <label for="opponent_score" class="block text-sm font-bold text-[#FFD700] mb-2">Skor Lawan</label>
                        <input type="number" id="opponent_score" name="opponent_score" min="0" class="w-full bg-[#0d1b2a]/50 border border-[#FF8C00]/30 rounded-lg px-4 py-2 text-white placeholder-white/50 focus:border-[#FFD700] focus:outline-none focus:ring-2 focus:ring-[#FFD700]/20" value="{{ $match->opponent_score ?? '' }}" placeholder="0">
                    </div>
                </div>
            </div>
            
            <div class="flex gap-4 pt-4">
                <button type="submit" class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-8 py-3 rounded-lg font-bold hover:shadow-lg hover:shadow-[#FFD700]/30 transition">Simpan Perubahan</button>
                <a href="{{ route('admin.matches.index') }}" class="bg-[#0d1b2a]/50 border border-[#FFD700]/30 text-[#FFD700] px-8 py-3 rounded-lg font-bold hover:bg-[#1a1f35] transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
