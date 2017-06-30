<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_an_owner()
    {
        $reply = factory('App\Models\Reply')->create();
        $this->assertInstanceOf('App\Models\User', $reply->owner);
    }
}
