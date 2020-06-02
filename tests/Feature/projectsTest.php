<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class projectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */

    use WithFaker, RefreshDatabase;


    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }


    /**
     * @test
     */
    public function a_user_can_view_a_project()
    {

        $this->withoutExceptionHandling();


        $project = factory('App\Project')->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */

    public function a_project_require_a_title()
    {
        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function a_project_require_a_description()
    {
        $attributes = factory('App\Project')->raw(['description' => '']);


        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function a_project_require_a_owner()
    {

        // $this->withoutExceptionHandling();

        $attributes = factory('App\Project')->raw();


        $this->post('/projects', $attributes)->assertRedirect('login');
    }
}
