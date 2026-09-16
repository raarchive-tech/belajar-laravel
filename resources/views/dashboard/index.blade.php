@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Library System Dashboard</h2>
    <p>Selamat datang di Sistem Informasi Perpustakaan.</p>

    <h3?>Apa itu Library System?</h3>
    <p>Library System adalah Sistem Informasi Perpustakaan yang dirancang untuk masyarakat Indonesia untuk meningkatkan literasi.</p>
   
    <p?>Berikut merupakan ringkasan statistik kami: </p>
    <ul?> 
        <li>Total Buku: {{ $totalBooks }}</li>
        <li>Total Kategori: {{ $totalCategories }}</li>
        <li>Total Member: {{ $totalMembers }}</li>
    </ul>
@endsection