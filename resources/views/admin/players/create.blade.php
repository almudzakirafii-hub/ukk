@extends('admin.layouts.app')

@section('page-title', 'Tambah Pemain')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.players.index') }}" class="text-blue-600 hover:text-blue-700 font-bold mb-6 inline-block">
        ← Kembali
    </a>
    
    <div class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-8">Tambah Pemain Baru</h1>
        
        <form method="POST" action="{{ route('admin.players.store') }}" class="space-y-6">
            @csrf
            
            <!-- Team -->
            <div>
                <label for="team_id" class="block text-sm font-bold text-gray-900 mb-2">Tim</label>
                <select id="team_id" name="team_id" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <option value="">Pilih Tim</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                @error('team_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-bold text-gray-900 mb-2">Nama Pemain</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2" required value="{{ old('name') }}">
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Jersey Number -->
            <div>
                <label for="jersey_number" class="block text-sm font-bold text-gray-900 mb-2">No Jersey</label>
                <input type="number" id="jersey_number" name="jersey_number" class="w-full border border-gray-300 rounded-lg px-4 py-2" required value="{{ old('jersey_number') }}">
                @error('jersey_number')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Position -->
            <div>
                <label for="position" class="block text-sm font-bold text-gray-900 mb-2">Posisi</label>
                <select id="position" name="position" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <option value="">Pilih Posisi</option>
                    <option value="Point Guard">Point Guard</option>
                    <option value="Shooting Guard">Shooting Guard</option>
                    <option value="Small Forward">Small Forward</option>
                    <option value="Power Forward">Power Forward</option>
                    <option value="Center">Center</option>
                </select>
                @error('position')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Height -->
            <div>
                <label for="height" class="block text-sm font-bold text-gray-900 mb-2">Tinggi (cm)</label>
                <input type="number" id="height" name="height" class="w-full border border-gray-300 rounded-lg px-4 py-2" value="{{ old('height') }}">
                @error('height')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Weight -->
            <div>
                <label for="weight" class="block text-sm font-bold text-gray-900 mb-2">Berat (kg)</label>
                <input type="number" id="weight" name="weight" class="w-full border border-gray-300 rounded-lg px-4 py-2" value="{{ old('weight') }}">
                @error('weight')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Birth Date -->
            <div>
                <label for="birth_date" class="block text-sm font-bold text-gray-900 mb-2">Tanggal Lahir</label>
                <input type="date" id="birth_date" name="birth_date" class="w-full border border-gray-300 rounded-lg px-4 py-2" value="{{ old('birth_date') }}">
                @error('birth_date')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Biography -->
            <div>
                <label for="biography" class="block text-sm font-bold text-gray-900 mb-2">Biografi</label>
                <textarea id="biography" name="biography" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2">{{ old('biography') }}</textarea>
                @error('biography')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-bold text-gray-900 mb-2">Status</label>
                <select id="status" name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Submit -->
            <div class="flex gap-4 pt-4">
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.players.index') }}" class="bg-gray-400 text-white px-8 py-3 rounded-lg font-bold hover:bg-gray-500 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
