@extends('layouts.app')

@section('title', 'Transaksi Peminjaman & Pengembalian - Library System')
@section('header', 'Transaksi Peminjaman & Pengembalian')

@section('content')
    <!-- Notifikasi Sukses (Cocok untuk bukti perubahan stok) -->
    @if (session('success'))
        <div class="mb-6 p-4 rounded-2xl bg-gradient-to-r from-purple-50 to-pink-50 border border-pink-200 text-purple-900 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 rounded-full bg-gradient-to-tr from-purple-600 to-pink-500 text-white flex items-center justify-center text-sm font-bold shrink-0">✓</span>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Header Section & Tombol Catat Peminjaman -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-purple-950">Riwayat Transaksi</h2>
            <p class="text-sm text-gray-500">Catat peminjaman buku baru dan proses pengembalian untuk memperbarui stok otomatis.</p>
        </div>
        <a href="{{ route('borrowings.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white text-sm font-semibold shadow-md shadow-pink-500/25 transition transform hover:-translate-y-0.5">
            <span>+ Catat Peminjaman</span>
        </a>
    </div>

    <!-- Tabel Transaksi -->
    <div class="bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-purple-100/80 to-pink-100/60 text-purple-950 text-xs uppercase tracking-wider font-bold border-b border-purple-100">
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Nama Peminjam</th>
                        <th class="py-4 px-6">Judul Buku</th>
                        <th class="py-4 px-6">Tgl Pinjam</th>
                        <th class="py-4 px-6">Tgl Kembali</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-50 text-sm text-gray-700">
                    @forelse($borrowings as $item)
                        <tr class="hover:bg-purple-50/40 transition">
                            <td class="py-4 px-6 font-medium text-gray-500">#{{ $item->id }}</td>
                            <td class="py-4 px-6 font-semibold text-purple-950">{{ $item->borrower_name }}</td>
                            <td class="py-4 px-6">
                                <p class="font-medium text-gray-800">{{ $item->book->title ?? 'Buku dihapus' }}</p>
                                <span class="text-xs text-gray-400">Sisa stok saat ini: {{ $item->book->stock ?? 0 }} eks</span>
                            </td>
                            <td class="py-4 px-6">{{ \Carbon\Carbon::parse($item->borrow_date)->format('d M Y') }}</td>
                            <td class="py-4 px-6">
                                {{ $item->return_date ? \Carbon\Carbon::parse($item->return_date)->format('d M Y') : '-' }}
                            </td>
                            <td class="py-4 px-6">
                                @if($item->status === 'dipinjam')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Dipinjam
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Dikembalikan
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                @if($item->status === 'dipinjam')
                                    <form action="{{ route('borrowings.return', $item) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                onclick="return confirm('Konfirmasi pengembalian buku ini? Stok akan otomatis bertambah 1.')"
                                                class="px-3.5 py-1.5 rounded-lg bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white text-xs font-semibold shadow-sm transition cursor-pointer">
                                            Kembalikan Buku
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs font-medium text-gray-400">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 px-6 text-center text-gray-400">
                                <p class="text-base font-medium text-gray-500">Belum ada transaksi peminjaman.</p>
                                <p class="text-xs mt-1">Klik tombol "+ Catat Peminjaman" untuk memulai transaksi baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection