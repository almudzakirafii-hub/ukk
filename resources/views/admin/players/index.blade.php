@extends('admin.layouts.app')

@section('page-title', 'Kelola Pemain')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Daftar Pemain</h1>
    <a href="{{ route('admin.players.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
        + Tambah Pemain
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full">
        <thead class="bg-gray-100 border-b border-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">No Jersey</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Nama</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Posisi</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Tim</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Status</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($players as $player)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <span class="font-bold text-lg text-blue-600">{{ $player->jersey_number }}</span>
                </td>
                <td class="px-6 py-4 font-semibold">{{ $player->name }}</td>
                <td class="px-6 py-4">{{ $player->position }}</td>
                <td class="px-6 py-4">{{ $player->team->name }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $player->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ ucfirst($player->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.players.edit', $player) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.players.destroy', $player) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition" onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                    Belum ada data pemain
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $players->links() }}
</div>
@endsection
