<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    public function index()
    {
        $borrowedBooks = Borrow::with('book', 'user')->get();

        return view('admin.borrowed', compact('borrowedBooks'));
    }
}
