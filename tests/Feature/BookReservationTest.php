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

    /**
     * @test
     */
    public function a_title_is_required(){

        //$this->withoutExceptionHandling();

        $response = $this->post('/books', [
           'title' => '',
           'author' => 'Jon'
        ]);
        $response->assertSessionHasErrors('title');
    }
    
    /**
     * @test
     */
    public function an_author_is_required(){

        //$this->withoutExceptionHandling();

        $response = $this->post('/books', [
           'title' => 'Cool Title',
           'author' => ''
        ]);
        $response->assertSessionHasErrors('author');
    }
}
