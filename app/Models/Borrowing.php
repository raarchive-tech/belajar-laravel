<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'borrower_name',
        'borrow_date',
        'return_date',
        'status',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}