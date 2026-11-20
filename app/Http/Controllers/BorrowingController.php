<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    // Menampilkan daftar transaksi peminjaman & pengembalian
    public function index()
    {
        $borrowings = Borrowing::with('book')->latest()->get();
        return view('borrowings.index', compact('borrowings'));
    }

    // Menampilkan form peminjaman baru
    public function create()
    {
        // Hanya tampilkan buku yang stoknya masih tersedia (> 0)
        $books = Book::where('stock', '>', 0)->get();
        return view('borrowings.create', compact('books'));
    }

    // Proses simpan peminjaman & kurangi stok buku
    public function store(Request $request)
    {
        $request->validate([
            'book_id'       => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
            'borrow_date'   => 'required|date',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock < 1) {
            return back()->withErrors(['book_id' => 'Stok buku sudah habis!'])->withInput();
        }

        DB::transaction(function () use ($request, $book) {
            Borrowing::create([
                'book_id'       => $book->id,
                'borrower_name' => $request->borrower_name,
                'borrow_date'   => $request->borrow_date,
                'status'        => 'dipinjam',
            ]);

            // Kurangi stok buku sebanyak 1
            $book->decrement('stock');
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Transaksi peminjaman berhasil dicatat dan stok buku berkurang 1.');
    }

    // Proses pengembalian buku & tambah stok buku kembali
    public function returnBook(Borrowing $borrowing)
    {
        if ($borrowing->status === 'dikembalikan') {
            return back()->with('success', 'Buku ini sudah dikembalikan sebelumnya.');
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->update([
                'status'      => 'dikembalikan',
                'return_date' => now()->toDateString(),
            ]);

            // Tambah stok buku kembali sebanyak 1
            $borrowing->book->increment('stock');
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Buku berhasil dikembalikan dan stok buku bertambah 1.');
    }
}