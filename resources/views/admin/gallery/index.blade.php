@extends('admin.layouts.app')

@section('page-title', 'Kelola Galeri')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Daftar Galeri</h1>
    <a href="{{ route('admin.gallery.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
        + Tambah Foto
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($galleries as $gallery)
    <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
        <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="font-bold mb-2 line-clamp-2">{{ $gallery->title }}</h3>
            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $gallery->description }}</p>
            
            <div class="flex gap-2">
                <a href="{{ route('admin.gallery.edit', $gallery) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm flex-1 text-center">
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.gallery.destroy', $gallery) }}" style="display:inline; flex:1;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm" onclick="return confirm('Yakin?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <p class="col-span-full text-center text-gray-500 py-8">Belum ada galeri</p>
    @endforelse
</div>

<div class="mt-6">
    {{ $galleries->links() }}
</div>
@endsection
