<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $books = Book::all();
        $users = User::where('is_admin', false)->get();
        return view('admin.dashboard', compact('books', 'users'));
    }

    public function addBook(Request $request) {
        Book::create($request->all());
        return redirect()->back();
    }

    public function editBook($id)
    {
        $book = Book::findOrFail($id);
        return view("admin.edit",compact('book'));
    }

    public function updateBook(Request $request, $id) {
        $book = Book::find($id);
        $book->update($request->all());
        return redirect()->back();
    }

    public function deleteBook($id) {
        Book::destroy($id);
        return redirect()->back();
    }

    public function viewStudent($id) {
        $student = User::find($id);
        return view('admin.student', compact('student'));
    }
}
