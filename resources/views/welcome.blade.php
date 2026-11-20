<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library System - Sistem Informasi Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-pink-50 text-gray-800 flex flex-col justify-between antialiased">

    <!-- Navbar Atas -->
    <header class="w-full max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-600 to-pink-500 text-white flex items-center justify-center text-lg shadow-md shadow-pink-500/20">
                📚
            </div>
            <span class="text-xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-purple-800 to-pink-600">
                Library System
            </span>
        </div>

        @if (Route::has('login'))
            <nav class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white text-sm font-semibold shadow-md shadow-pink-500/25 transition">
                        Buka Dashboard →
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white text-sm font-semibold shadow-md shadow-pink-500/25 transition transform hover:-translate-y-0.5">
                        Masuk (Login)
                    </a>
                @endauth
            </nav>
        @endif
    </header>

    <!-- Hero Section Utama -->
    <main class="max-w-6xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-block px-4 py-1.5 rounded-full bg-purple-100 text-purple-700 text-xs font-bold uppercase tracking-wider mb-4">
                Sistem Informasi Perpustakaan
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-purple-950 leading-tight mb-5">
                Kelola Koleksi & Literasi Lebih
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-500">
                    Modern & Cepat
                </span>
            </h1>
            <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-8">
                Platform digital terpadu untuk manajemen katalog buku, pengelompokan kategori bacaan, serta administrasi keanggotaan perpustakaan secara efisien.
            </p>

            <div class="flex flex-wrap items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white font-semibold shadow-lg shadow-pink-500/30 transition transform hover:-translate-y-0.5">
                        Masuk ke Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white font-semibold shadow-lg shadow-pink-500/30 transition transform hover:-translate-y-0.5">
                        Mulai Sekarang
                    </a>
                @endauth
            </div>
        </div>

        <!-- Kartu Fitur Kanan -->
        <div class="relative">
            <div class="absolute -inset-2 rounded-3xl bg-gradient-to-r from-purple-500 to-pink-500 opacity-20 blur-xl"></div>
            <div class="relative bg-white/90 backdrop-blur-md rounded-3xl p-8 border border-purple-100 shadow-xl space-y-5">
                <div class="flex items-start gap-4 p-4 rounded-2xl bg-purple-50/70 border border-purple-100">
                    <div class="w-11 h-11 rounded-xl bg-purple-600 text-white flex items-center justify-center text-xl shrink-0">📖</div>
                    <div>
                        <h3 class="font-bold text-purple-950">Katalog Buku Terstruktur</h3>
                        <p class="text-xs text-gray-600 mt-1">Pencatatan judul, penulis, tahun terbit, hingga pemantauan stok eksemplar secara real-time.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-2xl bg-fuchsia-50/70 border border-fuchsia-100">
                    <div class="w-11 h-11 rounded-xl bg-fuchsia-600 text-white flex items-center justify-center text-xl shrink-0">🏷️</div>
                    <div>
                        <h3 class="font-bold text-purple-950">Klasifikasi Kategori</h3>
                        <p class="text-xs text-gray-600 mt-1">Pengelompokan koleksi buku berdasarkan genre untuk memudahkan pencarian bacaan.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-2xl bg-pink-50/70 border border-pink-100">
                    <div class="w-11 h-11 rounded-xl bg-pink-500 text-white flex items-center justify-center text-xl shrink-0">🔐</div>
                    <div>
                        <h3 class="font-bold text-purple-950">Hak Akses Multi-Role</h3>
                        <p class="text-xs text-gray-600 mt-1">Pemisahan akses yang aman antara Administrator dan Petugas Perpustakaan.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-6xl mx-auto px-6 py-6 text-center text-xs text-gray-400">
        &copy; {{ date('Y') }} Library System — Sistem Informasi Perpustakaan
    </footer>

</body>
</html>