<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;

class BookController extends Controller
{
    // 1. READ - Menampilkan semua daftar buku
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    // 2. CREATE - Menampilkan form tambah buku
    public function create()
    {
        $title = "Tambah Buku";
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('title', 'categories'));
    }

    // 3. STORE - Menyimpan data buku baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'author' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.\',]+$/'],
            'year'   => 'required|integer|digits:4|min:1900',
            'stock'  => 'required|integer|min:0|max:100',
            'category_id' => 'required|exists:categories,id'
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku Berhasil Ditambahkan');
    }

    // 4. READ DETAIL - Menampilkan detail satu buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // 5. EDIT - Menampilkan form edit buku
    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    // 6. UPDATE - Menyimpan perubahan data buku
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'author' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.\',]+$/'],
            'year'   => 'required|integer|digits:4|min:1900',
            'stock'  => 'required|integer|min:0|max:100',
            'category_id' => 'required|exists:categories,id'
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku Berhasil Diperbarui');
    }

    // 7. DELETE - Menghapus data buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku Berhasil Dihapus');
    }
}