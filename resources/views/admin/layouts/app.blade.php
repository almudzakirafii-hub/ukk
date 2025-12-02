<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin {{ config('app.name') }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('css')
</head>
<body class="bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a]">
    <div class="flex h-screen bg-gradient-to-br from-[#1a1f35] to-[#0d1b2a]">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            @include('admin.layouts.header')
            
            <!-- Page Content -->
            <main class="flex-1 overflow-auto">
                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-500/20 border border-red-500/50 text-red-200 px-4 py-3 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if (session('success'))
                        <div class="mb-4 bg-green-500/20 border border-green-500/50 text-green-200 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    
    @stack('js')
</body>
</html>
