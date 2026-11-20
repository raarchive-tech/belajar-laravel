@extends('layouts.app')

@section('title', 'Detail Buku - Library System')
@section('header', 'Detail Informasi Buku')

@section('content')
    <div class="max-w-xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('books.index') }}" class="text-sm font-medium text-purple-600 hover:text-pink-600 transition">
                ← Kembali ke Daftar Buku
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
            <!-- Banner Atas Gradasi -->
            <div class="bg-gradient-to-r from-purple-700 via-fuchsia-600 to-pink-500 p-8 text-white">
                <div class="flex items-center justify-between mb-3">
                    <span class="px-3 py-1 rounded-full bg-white/20 text-xs font-semibold">
                        ID Buku: #{{ $book->id }}
                    </span>
                    <span class="px-3 py-1 rounded-full bg-pink-950/30 text-xs font-semibold">
                        {{ $book->category?->name ?? 'Tanpa Kategori' }}
                    </span>
                </div>
                <h2 class="text-2xl font-bold leading-snug">{{ $book->title }}</h2>
                <p class="text-purple-100 text-sm mt-1">Ditulis oleh <span class="font-semibold text-white">{{ $book->author }}</span></p>
            </div>

            <!-- Rincian Metadata -->
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 rounded-xl bg-purple-50/70 border border-purple-100">
                        <p class="text-xs font-medium text-gray-500 uppercase">Tahun Terbit</p>
                        <p class="text-lg font-bold text-purple-950 mt-1">{{ $book->year }}</p>
                    </div>
                    <div class="p-4 rounded-xl bg-pink-50/70 border border-pink-100">
                        <p class="text-xs font-medium text-gray-500 uppercase">Stok Tersedia</p>
                        <p class="text-lg font-bold text-pink-700 mt-1">{{ $book->stock }} Eksemplar</p>
                    </div>
                </div>

                <!-- Tombol Aksi Bawah -->
                <div class="pt-6 flex items-center justify-between border-t border-purple-50">
                    <a href="{{ route('books.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-600 text-sm font-semibold transition">
                        Kembali
                    </a>
                    <a href="{{ route('books.edit', $book) }}"
                       class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white text-sm font-semibold shadow-md shadow-pink-500/25 transition">
                        Edit Buku Ini
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection