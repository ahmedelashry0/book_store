<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display available books for borrowing
    public function index()
    {
        $books = Book::all();
        return view('students.books', compact('books'));
    }

    // Borrow a book
    public function borrowBook($id)
    {
        $book = Book::findOrFail($id);

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

    // View borrowed books
    public function borrowedBooks()
    {
        $borrowedBooks = Borrow::where('user_id', auth()->id())->with('book')->get();
        return view('students.borrowed_books', compact('borrowedBooks'));
    }

    // Return a book
    public function returnBook($id)
    {
        $borrow = Borrow::where('user_id', auth()->id())->where('book_id', $id)->first();
        $borrow->update(['return_date' => now()]);

        Book::findOrFail($id)->increment('quantity');

        return redirect()->back();
    }

    // View profile
    public function profile()
    {
        return view('students.profile');
    }

    // Update profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    // View Book Details
    public function viewBookDetails($id)
    {
        $book = Book::findOrFail($id);
        return view('students.book_details', compact('book'));
    }
}
