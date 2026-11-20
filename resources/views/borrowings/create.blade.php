@extends('layouts.app')

@section('title', 'Catat Peminjaman Baru - Library System')
@section('header', 'Catat Peminjaman Buku')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('borrowings.index') }}" class="text-sm font-medium text-purple-600 hover:text-pink-600 transition">
                ← Kembali ke Daftar Transaksi
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
            <!-- Header Card Gradasi -->
            <div class="bg-gradient-to-r from-purple-700 via-fuchsia-600 to-pink-500 px-8 py-6 text-white">
                <h2 class="text-xl font-bold">Form Peminjaman Buku</h2>
                <p class="text-purple-100 text-sm mt-1">Stok buku yang dipilih akan otomatis berkurang 1 setelah disimpan.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('borrowings.store') }}" method="POST" class="p-8 space-y-5">
                @csrf

                <div>
                    <label for="borrower_name" class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Peminjam</label>
                    <input type="text" id="borrower_name" name="borrower_name" value="{{ old('borrower_name') }}"
                           placeholder="Masukkan nama anggota / peminjam"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition text-gray-800">
                    @error('borrower_name')
                        <p class="mt-1.5 text-xs font-medium text-pink-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="book_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Pilih Buku (Tersedia)</label>
                    <select id="book_id" name="book_id"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition text-gray-800 bg-white">
                        <option value="">-- Pilih Judul Buku --</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" @selected(old('book_id') == $book->id)>
                                {{ $book->title }} — (Stok tersedia: {{ $book->stock }} eks)
                            </option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <p class="mt-1.5 text-xs font-medium text-pink-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="borrow_date" class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal Pinjam</label>
                    <input type="date" id="borrow_date" name="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition text-gray-800">
                    @error('borrow_date')
                        <p class="mt-1.5 text-xs font-medium text-pink-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-purple-50">
                    <a href="{{ route('borrowings.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-600 text-sm font-semibold transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white text-sm font-semibold shadow-md shadow-pink-500/25 transition cursor-pointer">
                        Simpan Peminjaman
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection