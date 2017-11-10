<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function itHasAnOwner()
    {
        $reply = factory('App\Models\Reply')->create();
        $this->assertInstanceOf('App\Models\User', $reply->owner);
    }
}
