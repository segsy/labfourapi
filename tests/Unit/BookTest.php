<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    /**
 * @OA\Info(
 *     title="Online book library",
 *     version="1.0.0",
 *     description="API Documentation for My Application"
 * )
 */

/**
     * @OA\Get(
     *     path="/api/books",
     *     operationId="allbooks",
     *     tags={"Books"},
     *     summary="Get list of books",
     *     description="Returns list of books",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Book"))
     *     )
     * )
     */

 
    use RefreshDatabase;

    public function test_create_book()
    {
          // Create an author
        $book = Book::factory()->create();
        // Create books
        Book::factory()->count(3)->create(['author_id' => $author->id]);
        // Make a GET request to the allbooks endpoint
        $response = $this->getJson('/api/allbooks');

         // Assert the response status and structure
         $response->assertStatus(200)
         ->assertJsonStructure([
             '*' => ['id', 'title', 'description', 'author_id', 'created_at', 'updated_at']
         ]);

        $response = $this->postJson('/api/books', [
            'title' => 'Death and the Kings Horseman',
            'description' => 'A Nobel Prize-winning playwright classic tale of tragic decisions in a traditional African culture.',
            'author_id' => $author->id,
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'Death and the Kings Horseman',
                     'description' => 'A Nobel Prize-winning playwright classic tale of tragic decisions in a traditional African culture.',
                     'author_id' => $author->id,
                 ]);
                 
    }

    public function test_update_book()
    {
        $book = Book::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $response = $this->putJson("/api/updatebooks/{$book->id}", [
            'title' => 'Things Fall Apart',
            'description' => 'A true classic of world literature . . . A masterpiece that has inspired generations of writers in Nigeria, across Africa, and around the world.” —Barack Obama 
.',
            'author_id' => $author->id,
        

        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'title' => 'Things Fall Apart',
                     'description' => 'A true classic of world literature . . . A masterpiece that has inspired generations of writers in Nigeria, across Africa, and around the world.” —Barack Obama 
.',
                     'author_id' => $author->id,
                 ]);
                 
    }

    // Additional tests for retrieve and delete operations
    public function test_it_can_delete_a_book()
    {
        // Create an author
        $book = Book::factory()->create();

        // Create a book
        $book = Book::factory()->create(['author_id' => $author->id]);

        // Make a DELETE request to the deletebook endpoint
        $response = $this->deleteJson("/api/deletebook/{$book->id}");

        // Assert the response status
        $response->assertStatus(200);

        // Assert the book is deleted
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    
    }
}



