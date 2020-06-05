<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;

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

        $project = auth()->user()->projects()->create($attributes);

        // Project::create($attributes);

        return redirect($project->path());
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
