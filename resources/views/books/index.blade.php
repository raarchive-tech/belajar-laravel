@extends ('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h3>Daftar Buku</h3>
    
    @if($stock > 0)
        <p>Buku tersedia (Stok: {{ $stock }})</p>
    @else
        <p>Buku habis dipinjam</p>
    @endif

    <ul>
        @foreach($books as $book)
            <li>{{ $book }}</li>
        @endforeach
    </ul>

@endsection