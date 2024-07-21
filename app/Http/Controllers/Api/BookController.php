<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Inertia\Inertia;
use App\Http\Controllers\Api\BaseController as BookResource;

class BookController extends BaseController
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Retrieve all books with their associated authors
        return Book::with('author')->get();

        $allbooks = Book::query()
        ->orderBy('created_at', 'DESC')
        ->filter($request->only('filter'))
        ->paginate(8)
        ->withQueryString();

    return Inertia::render('Book/Index', [
        'allbooks' => $allbooks,
        'filters' => $request->all('filter'),
        'message' => session('message'),
    ]);
       
            /*$allbooks = Book::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Books Retrieved Successfully',
                'allbooks' => $allbooks,
            ]);
            return Inertia::render('books/index', ['data' => $data]);*/

           
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
     *
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\Response
     */
    public function storebooks(Request $request)
    {
         // Validate the incoming request data
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
             'author_id' => 'required|string',
        
        ]);

        // Create a new book with the validated data
        //return Book::create($request->all());
        $books = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id,
            
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Books created successfully',
            'books' => $books,
        ]);
        return redirect()->route('books.index')->with('message', 'Blog Post Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbooks(Book $id)
    {
         // Return the specified book with its associated author
         return Inertia::render(
            'Book/View',
            [
                'showbooks' => $showbooks
            ]
        );

        $showbooks = Book::find($id);
  
        if (is_null($showbooks)) {
            return $this->sendError('Book not found.');
        }
   
        return $this->sendResponse(new BookResource($showbooks), 'Book Retrieved Successfully.');
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'author_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $updatebooks = Book::find($id);   
        $updatebooks->title = $input['title'];
        $updatebooks->description = $input['description'];
        $updatebooks->author_id = $input['author_id'];
        $updatebooks->save();
   
        return $this->sendResponse(new BookResource($updatebooks), 'Books Updated Successfully.');

        // Update the book with the validated data
        //$updatebooks->update($request->all());
         

        // Return the updated book
        //return $updatebooks;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Delete the specified book

        $deletebook = Book::find($id);
        $deletebook->delete();
         // Return a no-content response
        
         return $this->sendResponse([], 'Book Deleted Successfully.');
    }
        

       
        
    
}
