<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

use Validator;
use Inertia\Inertia;

class AuthorController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
         // Retrieve all authors with search functioality for their associated books
        $authors = Author::query()
            ->orderBy('created_at', 'DESC')
            ->filter($request->only('filter'))
            ->paginate(8)
            ->withQueryString();

        return Inertia::render('Author/Index', [
            'authors' => $authors,
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
            'Author/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
          // Create a new author with the validated data
        $request->validate([
            'author_name' => 'required|string|max:255',
           
        ]);
        Author::create([
            'author_name' => $request->author_name,
           
        ]);

        return redirect()->route('authors.index')->with('message', 'Author  Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        // Return the specified author with their associated books
        return Inertia::render(
            'Author/View',
            [
                'author' => $author
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return Inertia::render(
            'Author/Edit',
            [
                'author' => $author
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        // Validate the incoming request update data
        $request->validate([
            'author_name' => 'required|string|max:255',
            
        ]);
        $author->update([
            'author_name' => $request->author_name,
            
        ]);

        return redirect()->route('authors.index')->with('message', 'Author  Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
         // Delete the specified Author
        $author->delete();
        return redirect()->route('authors.index')->with('message', 'Author  Deleted Successfully');
    }
}
