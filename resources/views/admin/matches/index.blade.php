@extends('admin.layouts.app')

@section('page-title', 'Kelola Pertandingan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-[#FFD700]">Daftar Pertandingan</h1>
    <a href="{{ route('admin.matches.create') }}" class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-6 py-3 rounded-lg font-bold hover:shadow-lg hover:shadow-[#FFD700]/30 transition">
        + Tambah Pertandingan
    </a>
</div>

<div class="bg-[#1a1f35]/50 border border-[#FFD700]/30 rounded-lg shadow-xl overflow-x-auto">
    <table class="w-full">
        <thead class="bg-[#0d1b2a]/50 border-b border-[#FFD700]/30">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-bold text-[#FFD700]">Tanggal</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-[#FFD700]">Lawan</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-[#FFD700]">Lokasi</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-[#FFD700]">Tipe</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-[#FFD700]">Skor</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-[#FFD700]">Status</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-[#FFD700]">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-[#FFD700]/20">
            @forelse($matches as $match)
            <tr class="hover:bg-[#0d1b2a]/30 transition">
                <td class="px-6 py-4 font-semibold text-white">{{ $match->match_date->format('d M Y H:i') }}</td>
                <td class="px-6 py-4 text-white">{{ $match->opponent }}</td>
                <td class="px-6 py-4 text-sm text-white">{{ $match->location }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-sm font-semibold {{ $match->type === 'home' ? 'bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a]' : 'bg-[#0d1b2a]/50 border border-[#FFD700]/30 text-[#FFD700]' }}">
                        {{ ucfirst($match->type) }}
                    </span>
                </td>
                <td class="px-6 py-4 font-bold text-[#FFD700]">
                    @if($match->status === 'completed')
                        {{ $match->team_score }} - {{ $match->opponent_score }}
                    @else
                        <span class="text-white/50">-</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $match->status === 'completed' ? 'bg-green-500/30 border border-green-500/50 text-green-300' : ($match->status === 'scheduled' ? 'bg-yellow-500/30 border border-yellow-500/50 text-yellow-300' : 'bg-red-500/30 border border-red-500/50 text-red-300') }}">
                        {{ ucfirst($match->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.matches.edit', $match) }}" class="bg-[#FF8C00] text-white px-3 py-1 rounded hover:bg-[#FFD700] hover:text-[#0d1b2a] transition">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.matches.destroy', $match) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600/50 text-red-200 px-3 py-1 rounded hover:bg-red-600 hover:text-white transition" onclick="return confirm('Yakin?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-8 text-center text-white/50">Belum ada data pertandingan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6 text-[#FFD700]">
    {{ $matches->links() }}
</div>
@endsection
