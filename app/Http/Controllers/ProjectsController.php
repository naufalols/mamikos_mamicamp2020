<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function store()
    {

        $attributes =  request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);


        // dd($attributes);
        // $attributes['owner_id'] = auth()->id();

        auth()->user()->projects()->create($attributes);

        // Project::create($attributes);

        return redirect('/projects');
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        // $project = Project::findOrFail(request('project'));

        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }
        return view('projects.show', compact('project'));
    }
}
