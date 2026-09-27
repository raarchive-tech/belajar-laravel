<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['title' => 'Hujan', 'author' => 'Tere Liye', 'year' => 2016, 'stock' => 5],
            ['title' => 'Teruslah Bodoh Jangan Pintar', 'author' => 'Tere Liye', 'year' => 2024, 'stock' => 8],
            ['title' => 'Janji', 'author' => 'Tere Liye', 'year' => 2021, 'stock' => 3],
            ['title' => 'Negeri Para Bedebah', 'author' => 'Tere Liye', 'year' => 2012, 'stock' => 10],
            ['title' => 'Negeri di Ujung Tanduk', 'author' => 'Tere Liye', 'year' => 2013, 'stock' => 4],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
