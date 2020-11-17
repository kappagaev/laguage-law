<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testIndex()
    {
        User::factory()->count(5)->create();

        $response = $this->getJson('/user');

        $response->assertJsonCount(5);
    }
}
