@extends('admin.layouts.app')

@section('page-title', 'Buat Berita')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.news.index') }}" class="text-blue-600 hover:text-blue-700 font-bold mb-6 inline-block">← Kembali</a>
    
    <div class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-8">Buat Berita Baru</h1>
        
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="space-y-6">
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
                <label for="category" class="block text-sm font-bold text-gray-900 mb-2">Kategori</label>
                <input type="text" id="category" name="category" class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="mis. Berita, Analisa" value="{{ old('category') }}">
            </div>
            
            <div>
                <label for="content" class="block text-sm font-bold text-gray-900 mb-2">Konten</label>
                <textarea id="content" name="content" rows="10" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>{{ old('content') }}</textarea>
                <p class="text-sm text-gray-500 mt-1">HTML tags seperti &lt;p&gt;, &lt;strong&gt;, &lt;em&gt; didukung</p>
            </div>
            
            <div>
                <label for="featured_image" class="block text-sm font-bold text-gray-900 mb-2">Gambar Utama (Opsional)</label>
                <input type="file" id="featured_image" name="featured_image" class="w-full border border-gray-300 rounded-lg px-4 py-2" accept="image/*">
            </div>
            
            <div>
                <label for="status" class="block text-sm font-bold text-gray-900 mb-2">Status</label>
                <select id="status" name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            
            <div class="flex gap-4 pt-4">
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">Simpan</button>
                <a href="{{ route('admin.news.index') }}" class="bg-gray-400 text-white px-8 py-3 rounded-lg font-bold hover:bg-gray-500 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
