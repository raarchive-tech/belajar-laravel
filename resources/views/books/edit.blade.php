@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h3>Edit Data Buku</h3>

    <form action="{{ route('books.update', $book) }}" method="POST" style="max-width: 400px;">
        @csrf
        @method('PUT')
        <p>
            <label>Judul Buku:</label><br>
            <input type="text" name="title" value="{{ $book->title }}" required style="width: 100%; padding: 8px;">
        </p>
        <p>
            <label>Penulis:</label><br>
            <input type="text" name="author" value="{{ $book->author }}" required style="width: 100%; padding: 8px;">
        </p>
        <p>
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" value="{{ $book->year }}" required style="width: 100%; padding: 8px;">
        </p>
        <p>
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ $book->stock }}" required style="width: 100%; padding: 8px;">
        </p>
        <button type="submit" style="padding: 8px 16px; background: #007bff; color: white; border: none; cursor: pointer;">Update</button>
        <a href="{{ route('books.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
@endsection