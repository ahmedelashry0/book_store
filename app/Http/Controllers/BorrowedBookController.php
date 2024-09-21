<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    public function index()
    {
        // Get all borrowed books with their associated book and student
        $borrowedBooks = Borrow::with('book', 'user')->get();

        // Pass the data to the view
        return view('admin.borrowed', compact('borrowedBooks'));
    }
}
