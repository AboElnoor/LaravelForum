<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauthenticatedUsersCantAddReply()
    {
        $this->post('threads/channel/1/replies', [])
            ->assertRedirect('/login');
    }

    /** @test */
    public function anAuthenticatedUserCanReplyOnThread()
    {
        $thread = factory('App\Models\Thread')->create();
        $this->be(factory('App\Models\User')->create());

        $reply = factory('App\Models\Reply')->make();

        $this->post($thread->path() . '/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
