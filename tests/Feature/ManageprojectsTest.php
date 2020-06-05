<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use phpDocumentor\Reflection\Types\This;
use Tests\TestCase;

class ManageProjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */

    use WithFaker, RefreshDatabase;


    public function guests_cannot_manage_project()
    {
        $project = factory('App\Project')->create();

        $this->get('/projects')->assertRedirect('login');
        $this->get('/projects/create')->assertRedirect('login');
        $this->get($project->path())->assertRedirect('login');
        $this->post('/projects', $project->toArray())->assertRedirect('login');
    }


    /**
     * A basic feature test example.
     *
     * @test
     */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $this->signIn();
        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee(str_limit($attributes['title'], 10));
    }


    /**
     * @test
     */
    public function a_user_can_view_their_project()
    {

        $this->signIn();
        $this->withoutExceptionHandling();


        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }


    /**
     * A basic feature test example.
     *
     * @test
     */

    public function an_authenticated_useer_cannot_view_the_projects_of_others()
    {

        $this->signIn();

        $project = factory('App\Project')->create();

        $this->get($project->path())->assertStatus(403);
    }
    /**
     * A basic feature test example.
     *
     * @test
     */

    public function a_project_require_a_title()
    {
        $this->signIn();
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

        $this->signIn();
        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }
}
