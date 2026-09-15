@extends('layouts.app')

@section('title', 'Kategori Buku')

@section('content')

    <h3>Kategori Buku</h3>

    <ul>
        @foreach($categories as $category)
            <li>{{ $category }}</li>
        @endforeach
    </ul>

@endsection