@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h3>Daftar Buku Perpustakaan</h3>
    <a href="{{ route('books.create') }}" style="display: inline-block; margin-bottom: 15px; text-decoration: none; padding: 6px 12px; background: #28a745; color: white; border-radius: 4px;">+ Tambah Buku Baru</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route('books.show', $book) }}">Detail</a> | 
                        <a href="{{ route('books.edit', $book) }}">Edit</a> | 
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus buku ini?')" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection