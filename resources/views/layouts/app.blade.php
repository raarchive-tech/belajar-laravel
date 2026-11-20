<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Perpustakaan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-purple-50/40 text-gray-800 antialiased">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-purple-900 via-purple-800 to-pink-700 text-white flex flex-col shadow-xl shrink-0">
            <div class="p-6 border-b border-white/10">
                <h2 class="text-xl font-bold tracking-wide flex items-center gap-2.5">
                    <span class="p-2 bg-white/20 rounded-xl">📚</span>
                    <span>Library System</span>
                </h2>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1.5">
                <p class="px-4 pb-2 text-xs font-semibold uppercase tracking-wider text-purple-200/70">Menu Utama</p>
                
                <a href="{{ url('/dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('dashboard*') ? 'bg-white/20 font-semibold shadow-sm' : 'hover:bg-white/10 text-purple-100' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ url('/books') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('books*') ? 'bg-white/20 font-semibold shadow-sm' : 'hover:bg-white/10 text-purple-100' }}">
                    <span>Data Buku</span>
                </a>
                <a href="{{ url('/categories') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('categories*') ? 'bg-white/20 font-semibold shadow-sm' : 'hover:bg-white/10 text-purple-100' }}">
                    <span>Kategori</span>
                </a>
                <a href="{{ url('/members') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('members*') ? 'bg-white/20 font-semibold shadow-sm' : 'hover:bg-white/10 text-purple-100' }}">
                    <span>Anggota</span>
                </a>
                <a href="{{ route('borrowings.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('borrowings*') ? 'bg-white/20 font-semibold shadow-sm' : 'hover:bg-white/10 text-purple-100' }}">
                    <span>Peminjaman</span>
                </a>

                <!-- Menu Khusus Admin (Sinkron dengan Gate manage-users & role admin) -->
                @if(Auth::check() && (Auth::user()->can('manage-users') || Auth::user()->role === 'admin'))
                    <div class="pt-5 pb-2 px-4 text-xs font-semibold uppercase tracking-wider text-pink-200/80">
                        Administrator
                    </div>
                    <a href="{{ url('/users') }}" 
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('users*') ? 'bg-white/20 font-semibold shadow-sm' : 'hover:bg-white/10 text-purple-100' }}">
                        <span>User Management</span>
                    </a>
                @endif
            </nav>

            <!-- Tombol Logout -->
            <div class="p-4 border-t border-white/10">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-pink-500/30 hover:bg-pink-500/50 text-white text-sm font-medium transition cursor-pointer">
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </aside>

        <!-- Konten Utama -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Topbar -->
            <header class="bg-white/80 backdrop-blur-md border-b border-purple-100 px-8 py-4 flex justify-between items-center sticky top-0 z-10">
                <h1 class="text-lg font-semibold text-purple-950">@yield('header', 'Sistem Informasi Perpustakaan')</h1>
                
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800 leading-none">{{ Auth::user()->name ?? 'User' }}</p>
                        <span class="inline-block mt-1 px-2 py-0.5 text-[11px] font-semibold uppercase rounded-full {{ (Auth::user()->role ?? '') === 'admin' ? 'bg-pink-100 text-pink-700' : 'bg-purple-100 text-purple-700' }}">
                            {{ Auth::user()->role ?? 'Staff' }}
                        </span>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-600 to-pink-500 text-white flex items-center justify-center font-bold shadow-sm">
                        {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Area Dinamis Halaman -->
            <main class="p-8 flex-1">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>