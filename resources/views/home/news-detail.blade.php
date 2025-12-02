@extends('layouts.app')

@section('title', $article->title)

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[400px] bg-gradient-to-br from-[#0d1b2a] via-[#1a1f35] to-[#0d1b2a] text-white overflow-hidden flex items-center py-20" data-aos="fade-down">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-[#FFD700] rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-[#FF8C00] rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>
    
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <a href="{{ route('news') }}" class="inline-flex items-center text-gray-300 hover:text-[#FFD700] transition mb-6 font-semibold group">
            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>
            Kembali ke Berita
        </a>
        
        <h1 class="text-4xl md:text-5xl font-black mb-6 leading-tight text-[#FFD700]">
            {{ $article->title }}
        </h1>
        
        <div class="flex flex-wrap gap-4 text-gray-300 text-sm md:text-base">
            <span class="flex items-center">
                <span class="text-2xl mr-2">📅</span>
                {{ $article->created_at->format('d M Y') }}
            </span>
            @if($article->category)
            <span class="inline-block bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-4 py-2 rounded-full font-bold">
                {{ $article->category }}
            </span>
            @endif
            <span class="flex items-center">
                <span class="text-2xl mr-2">👤</span>
                {{ $article->user->name }}
            </span>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            <!-- Main Content -->
            <div class="lg:col-span-3">
                <!-- Featured Image -->
                @if($article->featured_image)
                <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-[#FFD700]/20 mb-10 group" data-aos="fade-up">
                    <img src="{{ asset($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0d1b2a]/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                @else
                <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-[#FFD700]/20 mb-10 bg-gradient-to-br from-[#FFD700]/20 to-[#FF8C00]/20 h-96 flex items-center justify-center group border border-[#FFD700]/20">
                    <div class="text-6xl text-[#FFD700] opacity-50">📰</div>
                </div>
                @endif
                
                <!-- Article Body -->
                <div class="prose prose-invert max-w-none mb-10 text-gray-300" data-aos="fade-up" data-aos-delay="100">
                    {!! $article->content !!}
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Share Box -->
                <div class="bg-gradient-to-br from-[#1a1f35]/80 to-[#0d1b2a]/80 rounded-2xl shadow-lg shadow-[#FFD700]/10 p-8 mb-8 sticky top-24 border border-[#FFD700]/20" data-aos="fade-left">
                    <h3 class="font-black text-lg mb-6 text-[#FFD700] flex items-center">
                        <span class="text-2xl mr-2">📤</span>
                        Bagikan
                    </h3>
                    <div class="flex gap-3 mb-4">
                        <a href="https://facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank" class="flex-1 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] p-3 rounded-xl hover:from-[#FF8C00] hover:to-[#FFD700] transition-all transform hover:scale-105 text-center font-bold text-sm shadow-md">f</a>
                        <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}&text={{ $article->title }}" target="_blank" class="flex-1 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] p-3 rounded-xl hover:from-[#FF8C00] hover:to-[#FFD700] transition-all transform hover:scale-105 text-center font-bold text-sm shadow-md">𝕏</a>
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . Request::url()) }}" target="_blank" class="flex-1 bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] p-3 rounded-xl hover:from-[#FF8C00] hover:to-[#FFD700] transition-all transform hover:scale-105 text-center font-bold text-sm shadow-md">✓</a>
                    </div>
                    <button onclick="copyToClipboard('{{ Request::url() }}')" class="w-full bg-gradient-to-r from-[#FFD700]/20 to-[#FF8C00]/20 text-[#FFD700] px-4 py-2 rounded-xl hover:from-[#FFD700]/40 hover:to-[#FF8C00]/40 transition font-bold text-sm border border-[#FFD700]/40">
                        📋 Salin Link
                    </button>
                </div>
                
                <!-- Related News -->
                @if($related->count() > 0)
                <div class="bg-gradient-to-br from-[#1a1f35]/80 to-[#0d1b2a]/80 rounded-2xl shadow-lg shadow-[#FFD700]/10 p-8 border border-[#FFD700]/20" data-aos="fade-left" data-aos-delay="100">
                    <h3 class="font-black text-lg mb-6 text-[#FFD700] flex items-center">
                        <span class="text-2xl mr-2">📰</span>
                        Berita Terkait
                    </h3>
                    <div class="space-y-4">
                        @foreach($related as $rel)
                        <a href="{{ route('news.detail', $rel->slug) }}" class="group block hover:transform hover:translate-x-1 transition">
                            <div class="font-bold text-[#FFD700] group-hover:text-[#FF8C00] transition line-clamp-2 mb-2">
                                {{ $rel->title }}
                            </div>
                            <div class="text-xs text-gray-400 flex items-center group-hover:text-[#FFD700] transition">
                                <span class="mr-1">📅</span>
                                {{ $rel->created_at->format('d M Y') }}
                            </div>
                            </div>
                            <div class="mt-2 h-0.5 bg-linear-to-r from-blue-400 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Related Articles Section at Bottom -->
@if($related->count() > 1)
<section class="py-20 bg-gradient-to-b from-[#1a1f35] to-[#0d1b2a]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-black mb-12 text-[#FFD700]">
            Baca Juga <span class="text-[#FF8C00]">Berita Lainnya</span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($related->take(4) as $rel)
            <a href="{{ route('news.detail', $rel->slug) }}" class="group" data-aos="fade-up" data-aos-delay="{{($loop->index) * 100}}">
                <div class="bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a] rounded-2xl shadow-lg shadow-[#FFD700]/10 overflow-hidden hover:shadow-2xl hover:shadow-[#FFD700]/30 transition-all duration-300 h-full flex flex-col border border-[#FFD700]/20">
                    <!-- Image -->
                    @if($rel->featured_image)
                    <div class="relative h-48 overflow-hidden bg-[#0d1b2a]">
                        <img src="{{ asset($rel->featured_image) }}" alt="{{ $rel->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    </div>
                    @else
                    <div class="relative h-48 bg-gradient-to-br from-[#FFD700]/20 to-[#FF8C00]/20 flex items-center justify-center">
                        <div class="text-5xl text-[#FFD700] opacity-50">📰</div>
                    </div>
                    @endif
                    
                    <!-- Content -->
                    <div class="p-6 flex flex-col grow">
                        <div class="flex gap-2 mb-3 flex-wrap">
                            @if($rel->category)
                            <span class="bg-gradient-to-r from-[#FFD700] to-[#FF8C00] text-[#0d1b2a] px-3 py-1 rounded-full text-xs font-bold">
                                {{ $rel->category }}
                            </span>
                            @endif
                            <span class="text-xs text-gray-400">📅 {{ $rel->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#FFD700] group-hover:text-[#FF8C00] transition line-clamp-2 mb-3">
                            {{ $rel->title }}
                        </h3>
                        <p class="text-gray-400 text-sm line-clamp-2 grow">
                            {{ strip_tags($rel->content) }}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Link disalin ke clipboard!');
    });
}
</script>
@endsection
