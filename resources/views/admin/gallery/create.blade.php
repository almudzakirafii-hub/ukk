@extends('admin.layouts.app')

@section('page-title', 'Tambah Foto')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.gallery.index') }}" class="text-blue-600 hover:text-blue-700 font-bold mb-6 inline-block">← Kembali</a>
    
    <div class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-8">Tambah Foto Galeri</h1>
        
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label for="team_id" class="block text-sm font-bold text-gray-900 mb-2">Tim</label>
                <select id="team_id" name="team_id" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <option value="">Pilih Tim</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="title" class="block text-sm font-bold text-gray-900 mb-2">Judul</label>
                <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded-lg px-4 py-2" required value="{{ old('title') }}">
            </div>
            
            <div>
                <label for="description" class="block text-sm font-bold text-gray-900 mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2">{{ old('description') }}</textarea>
            </div>
            
            <div>
                <label for="image" class="block text-sm font-bold text-gray-900 mb-2">Gambar (Max 2MB)</label>
                <input type="file" id="image" name="image" class="w-full border border-gray-300 rounded-lg px-4 py-2" accept="image/*" required>
            </div>
            
            <div>
                <label for="taken_date" class="block text-sm font-bold text-gray-900 mb-2">Tanggal Foto</label>
                <input type="date" id="taken_date" name="taken_date" class="w-full border border-gray-300 rounded-lg px-4 py-2" value="{{ old('taken_date') }}">
            </div>
            
            <div>
                <label for="category" class="block text-sm font-bold text-gray-900 mb-2">Kategori</label>
                <input type="text" id="category" name="category" class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="mis. Latihan, Kompetisi" value="{{ old('category') }}">
            </div>
            
            <div class="flex gap-4 pt-4">
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">Simpan</button>
                <a href="{{ route('admin.gallery.index') }}" class="bg-gray-400 text-white px-8 py-3 rounded-lg font-bold hover:bg-gray-500 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
