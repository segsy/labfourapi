<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\User;
// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
class AuthorsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_author()
    {
        // Create authors
        Author::factory()->count(3)->create();

        // Make a GET request to the allauthor endpoint
        $response = $this->getJson('/api/allauthor');

        // Assert the response status and structure
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => ['id', 'name', 'created_at', 'updated_at']
                 ]);
        $response = $this->postJson('/api/authors', [
            'author_name' => 'Wole Shoyinka',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'author_name' => 'Wole Shoyinka',
                 ]);
    }

    public function test_update_author()
    {
        $author = Author::factory()->create();

        $response = $this->putJson("/api/authors/{$author->id}", [
            'author_name' => '',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'author_name' => 'Chinua Achebe',
                 ]);
    }

    // Additional tests for retrieve and delete operations
    public function test_it_can_delete_an_author()
    {
        // Create an author
        $author = Author::factory()->create();

        // Make a DELETE request to the deleauthor endpoint
        $response = $this->deleteJson("/api/deleauthor/{$author->id}");

        // Assert the response status
        $response->assertStatus(200);

        // Assert the author is deleted
        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }
}