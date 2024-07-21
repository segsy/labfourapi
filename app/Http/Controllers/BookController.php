<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

use Validator;
use Inertia\Inertia;

class BookController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         // Retrieve all books with search functioality for their associated books
        $books = Book::query()
            ->orderBy('created_at', 'DESC')
            ->filter($request->only('filter'))
            ->paginate(8)
            ->withQueryString();

        return Inertia::render('Book/Index', [
            'books' => $books,
            'filters' => $request->all('filter'),
            'message' => session('message'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Book/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the incoming request data
          // Create a new book with the validated data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|unique:books|string|max:2000',
            'author_id' => 'required|max:255'
        ]);
        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id
        ]);

        return redirect()->route('books.index')->with('message', 'Book Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Return the specified Book with their associated books
        return Inertia::render(
            'Book/View',
            [
                'book' => $book
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return Inertia::render(
            'Book/Edit',
            [
                'book' => $book
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
          // Validate the incoming request update data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required||unique:books,description,'.$book->id.',id|string|max:2000',
            'author_id' => 'required|max:255',
        ]);
        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id
        ]);

        return redirect()->route('books.index')->with('message', 'Book Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
            // Delete the specified Book
        $book->delete();
        return redirect()->route('books.index')->with('message', 'Book Post Deleted Successfully');
    }
}
