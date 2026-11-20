@extends('layouts.app')

@section('title', 'Dashboard - Library System')
@section('header', 'Library System Dashboard')

@section('content')
    <!-- Hero Welcome Banner -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-purple-700 via-fuchsia-600 to-pink-500 p-8 text-white shadow-lg mb-8">
        <div class="relative z-10 max-w-2xl">
            <span class="inline-block px-3 py-1 rounded-full bg-white/20 text-xs font-semibold tracking-wide uppercase mb-3">
                Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!
            </span>
            <h2 class="text-2xl md:text-3xl font-bold mb-2">Library System Dashboard</h2>
            <p class="text-purple-100 text-sm md:text-base leading-relaxed">
                Library System adalah Sistem Informasi Perpustakaan yang dirancang untuk masyarakat Indonesia guna meningkatkan literasi serta mempermudah pengelolaan koleksi dan keanggotaan.
            </p>
        </div>
        <!-- Dekorasi Lingkaran Halus -->
        <div class="absolute -right-10 -bottom-10 w-64 h-64 rounded-full bg-white/10 blur-2xl"></div>
    </div>

    <!-- Judul Section Statistik -->
    <div class="mb-4">
        <h3 class="text-lg font-bold text-purple-950">Ringkasan Statistik Perpustakaan</h3>
        <p class="text-sm text-gray-500">Data terkini koleksi buku, kategori, dan anggota terdaftar.</p>
    </div>

    <!-- 3 Kartu Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Buku -->
        <div class="bg-white rounded-2xl p-6 border border-purple-100 shadow-sm hover:shadow-md transition flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Buku</p>
                <p class="text-3xl font-bold text-purple-900 mt-1">{{ $totalBooks }}</p>
                <a href="{{ url('/books') }}" class="inline-block mt-3 text-xs font-semibold text-purple-600 hover:text-pink-600 transition">
                    Lihat semua buku →
                </a>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl">
                📖
            </div>
        </div>

        <!-- Total Kategori -->
        <div class="bg-white rounded-2xl p-6 border border-purple-100 shadow-sm hover:shadow-md transition flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Kategori</p>
                <p class="text-3xl font-bold text-fuchsia-800 mt-1">{{ $totalCategories }}</p>
                <a href="{{ url('/categories') }}" class="inline-block mt-3 text-xs font-semibold text-fuchsia-600 hover:text-pink-600 transition">
                    Lihat kategori →
                </a>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-fuchsia-100 text-fuchsia-600 flex items-center justify-center text-2xl">
                🏷️
            </div>
        </div>

        <!-- Total Member -->
        <div class="bg-white rounded-2xl p-6 border border-purple-100 shadow-sm hover:shadow-md transition flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Member</p>
                <p class="text-3xl font-bold text-pink-700 mt-1">{{ $totalMembers }}</p>
                <a href="{{ url('/members') }}" class="inline-block mt-3 text-xs font-semibold text-pink-600 hover:text-purple-600 transition">
                    Lihat anggota →
                </a>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center text-2xl">
                👥
            </div>
        </div>
    </div>
@endsection