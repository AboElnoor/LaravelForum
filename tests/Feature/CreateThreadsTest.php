<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guestsCannotCreateThreads()
    {
        $thread = factory('App\Models\Thread')->make();
        $this->post('/threads', $thread->toArray())
            ->assertRedirect('/login');
        $this->get('/threads/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function aUserCanCreateThreads()
    {
        $this->be(factory('App\Models\User')->create());

        $thread = factory('App\Models\Thread')->create();

        $this->post('threads', $thread->toArray());
        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
