<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Book;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 
     *@test
     * @return void
     */
    public function test_a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();
       $response = $this->post('/books', [
           'title' => 'Cool Book Title',
           'author' => 'Jon'
       ]);
        $response->assertOk();

       $this->assertCount(1, Book::all());
    }
}
