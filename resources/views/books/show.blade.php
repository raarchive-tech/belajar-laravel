@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h3>Detail Buku</h3>
    <p>ID Buku: {{ $id }}</p>
    <a href="/books">Kembali ke Daftar Buku</a>
@endsection