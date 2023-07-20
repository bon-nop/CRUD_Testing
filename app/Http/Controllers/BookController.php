<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['books'] = Book::orderBy('book_id', 'desc')->get();
        return view('books.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required',
            'book_price' => 'required'
        ]);

        $book = new Book;
        $book->book_name = $request->book_name;
        $book->book_price = $request->book_price;
        $book->save();
        return redirect()->route('books.index')->with('success', 'Book created!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_name' => 'required',
            'book_price' => 'required'
        ]);

        $book = Book::findOrFail($id);
        $book->book_name = $request->book_name;
        $book->book_price = $request->book_price;
        $book->save();
        return redirect()->route('books.index')->with('success', 'Book Edited!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book Deleted!!!');
    }
}
