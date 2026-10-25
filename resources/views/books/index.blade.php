@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h3>Daftar Buku Perpustakaan</h3>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('books.create') }}">+ Tambah Buku Baru</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category?->name ?? 'Belum ada kategori' }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route('books.show', $book) }}">Detail</a> | 
                        <a href="{{ route('books.edit', $book) }}">Edit</a> | 
                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection