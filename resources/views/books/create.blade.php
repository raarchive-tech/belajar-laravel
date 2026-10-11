@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h3>Tambah Buku Baru</h3>

    <form action="{{ route('books.store') }}" method="POST" style="max-width: 400px;">
        @csrf
        <p>
            <label>Judul Buku:</label><br>
            <input type="text" name="title" required style="width: 100%; padding: 8px;">
        </p>
        <p>
            <label>Penulis:</label><br>
            <input type="text" name="author" required style="width: 100%; padding: 8px;">
        </p>
        <p>
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" required style="width: 100%; padding: 8px;">
        </p>
        <p>
            <label>Stok:</label><br>
            <input type="number" name="stock" required style="width: 100%; padding: 8px;">
        </p>
        <button type="submit" style="padding: 8px 16px; background: #28a745; color: white; border: none; cursor: pointer;">Simpan</button>
        <a href="{{ route('books.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
@endsection