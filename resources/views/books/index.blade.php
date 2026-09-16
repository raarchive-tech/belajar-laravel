@extends ('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h3>Daftar Buku</h3>
    
    @if($stock > 0)
        <p>Jumlah buku yang tersedia : {{ $stock }}</p>
    @else
        <p style="color: red;">Seluruh buku habis dipinjam</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Author</th>
                <th>Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book['id'] }}</td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['author'] }}</td>
                    <td>{{ $book['year'] }}</td>
                    <td><a href="/books/{{ $book['id'] }}">Lihat Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection