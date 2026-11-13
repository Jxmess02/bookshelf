<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCoverTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_book_can_be_created_without_a_cover(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('books.store'), [
                'title' => 'A Test Book',
                'author' => 'A Test Author',
                'genre' => 'Education',
            ]);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', [
            'title' => 'A Test Book',
            'cover' => null,
        ]);
    }

    public function test_updating_without_a_new_cover_keeps_the_existing_cover(): void
    {
        $book = Book::create([
            'title' => 'A Test Book',
            'author' => 'A Test Author',
            'genre' => 'Education',
            'cover' => 'covers/existing.jpg',
        ]);

        $response = $this->actingAs(User::factory()->create())
            ->put(route('books.update', $book), [
                'title' => 'An Updated Book',
                'author' => 'An Updated Author',
                'genre' => 'Technology',
            ]);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'An Updated Book',
            'cover' => 'covers/existing.jpg',
        ]);
    }
}
