<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            'Aksi',
            'Fantasi',
            'Thriller',
            'Romance',
            'Slice of Life'
        ];

        return view('categories.index', compact('categories'));
    }
}
