<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class PorjectTest extends TestCase
{

    use RefreshDatabase;
    /**@test */
    public function it_has_a_path()
    {
        $project  = factory('App\Project')->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }
}