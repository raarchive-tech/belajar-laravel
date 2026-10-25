@extends('layouts.app')

@section('title', 'Tambah Buku Baru')

@section('content')
    <h2>Tambah Buku Baru</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Judul Buku</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="author">Penulis</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}">
            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="year">Tahun Terbit</label>
            <input type="number" id="year" name="year" value="{{ old('year') }}">
            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock">Stok</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Kategori Buku</label>
            <select name="category_id">
                <option value="">Pilih Kategori</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>


        <button type="submit">Simpan Buku</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
@endsection