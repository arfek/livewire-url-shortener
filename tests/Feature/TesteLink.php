<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TesteLink extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory();

        $this->link = Link::factory()->ofUser($this->user)->create();
    }


    //Deixei de lado, ainda não vai funcionar

    function test_(){
        
    }
}
