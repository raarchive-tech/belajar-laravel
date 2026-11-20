@extends('layouts.app')

@section('title', 'Kategori Buku - Library System')
@section('header', 'Kategori Buku')

@section('content')
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-purple-950">Daftar Kategori Buku</h2>
            <p class="text-sm text-gray-500">Pengelompokan koleksi buku berdasarkan genre dan topik bacaan.</p>
        </div>
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-purple-100 shadow-sm">
            <span class="text-xs font-medium text-gray-500">Total Kategori:</span>
            <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-500">
                {{ count($categories) }}
            </span>
        </div>
    </div>

    <!-- Grid Kartu Kategori -->
    @if(count($categories) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($categories as $index => $category)
                @php
                    // Menangani baik format string maupun object model Category
                    $categoryName = is_object($category) ? $category->name : $category;
                    $booksCount = is_object($category) && isset($category->books_count) ? $category->books_count : null;
                @endphp

                <div class="group bg-white rounded-2xl p-6 border border-purple-100 shadow-sm hover:shadow-md hover:border-pink-200 transition duration-200 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <!-- Nomor / Ikon Urutan Gradasi -->
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-600 to-pink-500 text-white flex items-center justify-center font-bold text-base shadow-md shadow-pink-500/20 group-hover:scale-105 transition">
                            {{ $index + 1 }}
                        </div>

                        <div>
                            <h3 class="text-base font-bold text-purple-950 group-hover:text-pink-600 transition">
                                {{ $categoryName }}
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">
                                @if(!is_null($booksCount))
                                    {{ $booksCount }} koleksi buku
                                @else
                                    Kategori Perpustakaan
                                @endif
                            </p>
                        </div>
                    </div>

                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-700 group-hover:bg-pink-50 group-hover:text-pink-600 transition">
                        Aktif
                    </span>
                </div>
            @endforeach
        </div>
    @else
        <!-- Tampilan Jika Data Kosong -->
        <div class="bg-white rounded-2xl border border-purple-100 p-12 text-center shadow-sm">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center text-2xl mb-3">
                🏷️
            </div>
            <h3 class="text-base font-bold text-purple-950">Belum Ada Kategori</h3>
            <p class="text-sm text-gray-500 mt-1">Data kategori buku masih kosong.</p>
        </div>
    @endif
@endsection