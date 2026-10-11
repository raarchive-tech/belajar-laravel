<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. READ - Menampilkan semua daftar buku
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // 2. CREATE - Menampilkan form tambah buku
    public function create()
    {
        return view('books.create');
    }

    // 3. STORE - Menyimpan data buku baru ke database
    public function store(Request $request)
    {
        Book::create([
            'title'  => $request->title,
            'author' => $request->author,
            'year'   => $request->year,
            'stock'  => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    // 4. READ DETAIL - Menampilkan detail satu buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // 5. EDIT - Menampilkan form edit buku
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // 6. UPDATE - Menyimpan perubahan data buku
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title'  => $request->title,
            'author' => $request->author,
            'year'   => $request->year,
            'stock'  => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    // 7. DELETE - Menghapus data buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}