<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('admin.dashboard', compact('books'));
    }
    public function users(Request $request) {
        // Check if the search query exists
        $query = $request->input('search');

        if ($query) {
            // If the search query is present, find the user by ID
            $users = User::where('id', $query)->get();
        } else {
            // Otherwise, retrieve all users
            $users = User::all();
        }

        // Return the view with the user data
        return view('admin.users', compact('users'));
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
    public function deleteUser($id) {
        User::destroy($id);
        return redirect()->back();
    }

    public function viewStudent($id) {
        $user = User::find($id);
        return view('admin.student', compact('user'));
    }
}
