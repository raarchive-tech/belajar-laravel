@extends ('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

    <h3>Daftar Buku</h3>
    <ul>
        @foreach($books as $book)
            <li>{{ $book }}</li>
        @endforeach
    </ul>

@endsection