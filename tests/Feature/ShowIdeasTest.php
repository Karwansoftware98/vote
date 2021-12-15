<?php

namespace Tests\Feature;

use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    public function list_of_ideas_shows_on_main_page()
    {
        $ideaOne =Idea::factory()->create([
            'title' =>'My First Idea',
            'description' =>'Description of Idea one'
        ]);
        $ideaTwo =Idea::factory()->create([
            'title' =>'My Two Idea',
            'description' =>'Description of Idea Two'
        ]);
        $response = $this->get(route('idea.index'));
        $response->assertSuccessful();
        $ideaOne->assertSee();
    }
}
