@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h3>Detail Informasi Buku</h3>

    <div style="background: #f9f9f9; padding: 15px; border: 1px solid #ddd; max-width: 400px; border-radius: 5px;">
        <p><strong>ID Buku:</strong> {{ $book->id }}</p>
        <p><strong>Judul Buku:</strong> {{ $book->title }}</p>
        <p><strong>Penulis:</strong> {{ $book->author }}</p>
        <p><strong>Tahun Terbit:</strong> {{ $book->year }}</p>
        <p><strong>Stok Tersedia:</strong> {{ $book->stock }}</p>
    </div>

    <br>
    <a href="{{ route('books.index') }}">← Kembali ke Daftar Buku</a>
@endsection