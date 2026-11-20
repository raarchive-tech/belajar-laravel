@extends('layouts.app')

@section('title', 'Daftar Buku - Library System')
@section('header', 'Manajemen Data Buku')

@section('content')
    <!-- Notifikasi Sukses -->
    @if (session('success'))
        <div class="mb-6 p-4 rounded-2xl bg-gradient-to-r from-purple-50 to-pink-50 border border-pink-200 text-purple-900 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 rounded-full bg-gradient-to-tr from-purple-600 to-pink-500 text-white flex items-center justify-center text-sm font-bold">✓</span>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Header Section & Tombol Tambah -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-purple-950">Daftar Buku Perpustakaan</h2>
            <p class="text-sm text-gray-500">Kelola seluruh koleksi buku, kategori, dan ketersediaan stok.</p>
        </div>
        <a href="{{ route('books.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white text-sm font-semibold shadow-md shadow-pink-500/25 transition transform hover:-translate-y-0.5">
            <span>+ Tambah Buku Baru</span>
        </a>
    </div>

    <!-- Tabel Data Buku -->
    <div class="bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-purple-100/80 to-pink-100/60 text-purple-950 text-xs uppercase tracking-wider font-bold border-b border-purple-100">
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Judul Buku</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Penulis</th>
                        <th class="py-4 px-6">Tahun</th>
                        <th class="py-4 px-6">Stok</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-50 text-sm text-gray-700">
                    @forelse($books as $book)
                        <tr class="hover:bg-purple-50/40 transition">
                            <td class="py-4 px-6 font-medium text-gray-500">#{{ $book->id }}</td>
                            <td class="py-4 px-6 font-semibold text-purple-950">{{ $book->title }}</td>
                            <td class="py-4 px-6">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-pink-100 text-pink-700">
                                    {{ $book->category?->name ?? 'Belum ada kategori' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">{{ $book->author }}</td>
                            <td class="py-4 px-6">{{ $book->year }}</td>
                            <td class="py-4 px-6">
                                <span class="inline-block px-2.5 py-1 rounded-lg text-xs font-semibold {{ $book->stock > 0 ? 'bg-purple-100 text-purple-800' : 'bg-red-100 text-red-700' }}">
                                    {{ $book->stock }} eks
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('books.show', $book) }}"
                                       class="px-3 py-1.5 rounded-lg bg-purple-100 hover:bg-purple-200 text-purple-800 text-xs font-semibold transition">
                                        Detail
                                    </a>
                                    <a href="{{ route('books.edit', $book) }}"
                                       class="px-3 py-1.5 rounded-lg bg-fuchsia-100 hover:bg-fuchsia-200 text-fuchsia-800 text-xs font-semibold transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus buku ini?')"
                                                class="px-3 py-1.5 rounded-lg bg-pink-100 hover:bg-pink-200 text-pink-700 text-xs font-semibold transition cursor-pointer">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 px-6 text-center text-gray-400">
                                <p class="text-base font-medium text-gray-500">Belum ada data buku.</p>
                                <p class="text-xs mt-1">Klik tombol "+ Tambah Buku Baru" untuk menambahkan koleksi pertama.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection