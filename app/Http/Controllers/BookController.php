<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            'Pemrograman PHP',
            'Laravel untuk Pemula',
            'Basis Data',
            'Algoritma dan Pemrograman',
            'Pemrograman Berorientasi Objek',
            'Sistem Operasi',
            'Analisis Data'
        ];

        $stock = 7;

        return view('books.index', compact('books', 'stock'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}
