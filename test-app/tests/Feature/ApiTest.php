<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{

    public function test_statsTeam()
    {
        $response = $this->get('/export/playerstats/byteam/TOR');
        $response->assertStatus(200);
    }

    public function test_statsPos()
    {
        $response = $this->get('/export/playerstats/byposition/C');
        $response->assertStatus(200);
    }

    public function test_statsPlayer()
    {
        $response = $this->get('/export/playerstats/byplayer/Steven%20Adams');
        $response->assertStatus(200);
    }

    public function test_playerPlayer()
    {
        $response = $this->get('/export/players/byplayer/Steven%20Adams');
        $response->assertStatus(200);
    }

    public function test_playerTeam()
    {
        $response = $this->get('/export/players/byteam/HOU');
        $response->assertStatus(200);
    }
}


