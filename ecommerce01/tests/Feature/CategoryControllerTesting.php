<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTesting extends TestCase
{
    
    public function test_category_page_return_successful_response()
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }

    public function test_category_create_is_return_successful_response() {

        $response = $this->post('/category/create', ['category' => 'Electronics']);

        $response->assertStatus(201);
    }

    
}
