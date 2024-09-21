<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('students.books', compact('books'));
    }

    // Borrow a book
    public function borrowBook($id) {
        $book = Book::find($id);
        if ($book->quantity > 0) {
            Borrow::create([
                'user_id' => auth()->user()->id,
                'book_id' => $id,
                'borrow_date' => now(),
            ]);
            $book->decrement('quantity');
        }
        return redirect()->back();
    }

    // Return a book
    public function returnBook($id) {
        $borrow = Borrow::where('book_id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();
        $borrow->update(['return_date' => now()]);
        Book::find($id)->increment('quantity');
        return redirect()->back();
    }
}
