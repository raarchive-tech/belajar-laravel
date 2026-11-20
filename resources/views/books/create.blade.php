@extends('layouts.app')

@section('title', 'Tambah Buku Baru - Library System')
@section('header', 'Tambah Buku Baru')

@section('content')
    <div class="max-w-2xl mx-auto">
        <!-- Breadcrumb / Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('books.index') }}" class="text-sm font-medium text-purple-600 hover:text-pink-600 transition">
                ← Kembali ke Daftar Buku
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
            <!-- Header Card Gradasi -->
            <div class="bg-gradient-to-r from-purple-700 via-fuchsia-600 to-pink-500 px-8 py-6 text-white">
                <h2 class="text-xl font-bold">Tambah Buku Baru</h2>
                <p class="text-purple-100 text-sm mt-1">Lengkapi informasi detail buku untuk ditambahkan ke katalog perpustakaan.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('books.store') }}" method="POST" class="p-8 space-y-5">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-1.5">Judul Buku</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                           placeholder="Masukkan judul lengkap buku"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition text-gray-800">
                    @error('title')
                        <p class="mt-1.5 text-xs font-medium text-pink-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="author" class="block text-sm font-semibold text-gray-700 mb-1.5">Penulis</label>
                    <input type="text" id="author" name="author" value="{{ old('author') }}"
                           placeholder="Nama penulis atau pengarang"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition text-gray-800">
                    @error('author')
                        <p class="mt-1.5 text-xs font-medium text-pink-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="year" class="block text-sm font-semibold text-gray-700 mb-1.5">Tahun Terbit</label>
                        <input type="number" id="year" name="year" value="{{ old('year') }}"
                               placeholder="Contoh: 2024"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition text-gray-800">
                        @error('year')
                            <p class="mt-1.5 text-xs font-medium text-pink-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1.5">Stok</label>
                        <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                               placeholder="Jumlah eksemplar"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition text-gray-800">
                        @error('stock')
                            <p class="mt-1.5 text-xs font-medium text-pink-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Kategori Buku</label>
                    <select id="category_id" name="category_id"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition text-gray-800 bg-white">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1.5 text-xs font-medium text-pink-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-purple-50">
                    <a href="{{ route('books.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-600 text-sm font-semibold transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white text-sm font-semibold shadow-md shadow-pink-500/25 transition cursor-pointer">
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection