<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Api\BaseController as AuthorResource;

class AuthorController extends BaseController
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
    public function index()
    {
         // Retrieve all authors with their associated books
         //return Author::with('book')->get();
       
         $allauthor = Author::all();
          Author::with('allauthor')->get();
         return response()->json([
                'status' => 'success',
                'message' => 'Authors Retrieved Successfully',
                'allauthor' => $allauthor,
            ]);
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'author_name' => 'required|string|max:255',
        ]);

        // Create a new author with the validated data
        //return Author::create($request->all());
        $sendauthor = Author::create([
            'author_name' => $request->author_name,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Author created successfully',
            'sendauthor' => $sendauthor,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Return the specified author with their associated books
        $authors = Author::find($id);
  
        if (is_null($authors)) {
            return $this->sendError('Author not found.');
        }
   
        return $this->sendResponse(new AuthorResource($authors), 'Author Retrieved Successfully.');
        
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
            'author_name' => 'required',
           
        ]);
       

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $author = Author::find($id);   
        $author->author_name = $input['author_name'];
        
        $author->save();
   
        return $this->sendResponse(new AuthorResource($author), 'Author Updated Successfully.');

        // Update the author with the validated data
       

        // Return the updated author
        
        //return $author;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Delete the specified Author

      $deleauthor = Author::find($id);
      $deleauthor->delete();
       // Return a no-content response
      
       return $this->sendResponse([], 'Author Deleted Successfully.');
    }
}
