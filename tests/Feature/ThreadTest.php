<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_threads()
    {
        $thread = factory('App\Models\Thread')->create();

        $response = $this->get('/threads');

        $response->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_read_single_thread()
    {
        $thread = factory('App\Models\Thread')->create();
        $response = $this->get('/threads');

        $response->assertSee($thread->title);
    }
}
