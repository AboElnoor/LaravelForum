<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guestsCanNotCreateThreads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = factory('App\Models\Thread')->make();
        $this->post('threads', $thread->toArray());
    }

    /** @test */
    public function aUserCanCreateThreads()
    {
        $this->be(factory('App\Models\User')->create());

        $thread = factory('App\Models\Thread')->make();

        $this->post('threads', $thread->toArray());
        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
