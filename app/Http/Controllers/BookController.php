<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            ['id' => 1, 'title' => 'Hujan', 'author' => 'Tere Liye', 'year' => 2016],
            ['id' => 2, 'title' => 'Teruslah Bodoh Jangan Pintar', 'author' => 'Tere Liye', 'year' => 2024],
            ['id' => 3, 'title' => 'Janji', 'author' => 'Tere Liye', 'year' => 2021],
            ['id' => 4, 'title' => 'Negeri Para Bedebah', 'author' => 'Tere Liye', 'year' => 2012],
            ['id' => 5, 'title' => 'Negeri di Ujung Tanduk', 'author' => 'Tere Liye', 'year' => 2013]           
        ];

        $stock = 5;

        return view('books.index', compact('books', 'stock'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}
