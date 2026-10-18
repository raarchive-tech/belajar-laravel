@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h3>Edit Data Buku</h3>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="title">Judul Buku:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}">
            @error('title')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="author">Penulis:</label><br>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}">
            @error('author')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="year">Tahun Terbit:</label><br>
            <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}">
            @error('year')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="stock">Stok:</label><br>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $book->stock) }}">
            @error('stock')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Update</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
@endsection