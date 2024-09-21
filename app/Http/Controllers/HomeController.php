<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1)
        {
            $books = Book::all();
            return to_route('admin.dashboard')->with('books', $books);
        }
        else{
            $books = Book::all();
            return to_route('student.dashboard')->with('books', $books);
        }
    }
}
