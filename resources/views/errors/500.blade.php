@extends('layouts.app')

@section('title', '500 - Error Server')

@section('content')
<section class="min-h-screen bg-linear-to-r from-blue-600 to-blue-800 flex items-center justify-center py-12 px-4">
    <div class="text-center text-white max-w-md">
        <div class="text-8xl font-bold mb-4">500</div>
        <h1 class="text-3xl font-bold mb-4">Error Server Internal</h1>
        <p class="text-blue-100 mb-8">
            Terjadi kesalahan di server. Tim kami sudah diberitahu dan akan segera memperbaiki.
        </p>
        <a href="{{ route('home') }}" class="inline-block bg-yellow-400 text-gray-900 px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition">
            Kembali ke Beranda
        </a>
    </div>
</section>
@endsection
