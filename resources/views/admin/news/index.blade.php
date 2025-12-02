@extends('admin.layouts.app')

@section('page-title', 'Kelola Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Daftar Berita</h1>
    <a href="{{ route('admin.news.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
        + Buat Berita
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full">
        <thead class="bg-gray-100 border-b border-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Judul</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Kategori</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Penulis</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Tanggal</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Status</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($news as $article)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-semibold line-clamp-1">{{ $article->title }}</td>
                <td class="px-6 py-4 text-sm">{{ $article->category ?? '-' }}</td>
                <td class="px-6 py-4 text-sm">{{ $article->user->name }}</td>
                <td class="px-6 py-4 text-sm">{{ $article->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $article->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ ucfirst($article->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.news.edit', $article) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                        <form method="POST" action="{{ route('admin.news.destroy', $article) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada berita</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $news->links() }}
</div>
@endsection
