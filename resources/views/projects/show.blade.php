@extends('layouts.app')

@section('content')
    
    <header class="flex item-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
                <p class="text-gray-600 text-sm font-normal">
                    <a href="{{url('/projects')}}">My Project</a> / {{$project->title}}
                </p>
                <a type="button" class="button-blue" href="{{url('/projects/create')}}">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mg-6">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-600 font-normal mb-3">Tasks</h2>
                    @foreach ($project->tasks as $task)
                    <div class="card mb-3">{{$task->body}}</div>
                    @endforeach
                     <div class="card mb-3">
                        <form action="{{url( $project->path() . '/tasks') }}" method="POST">
                            @csrf
                            <input class="w-full" type="text" name="body" id="" placeholder="Add a new task...">
                        </form>
                    </div>
                </div>
                <div>
                    <h2 class="text-lg text-gray-600 font-normal mb-3">General Notes</h2>
                    <textarea class="card w-full" style="min-height: 200px">Lorem Ipsum</textarea>
                </div>
            </div>


            <div class="lg:w-1/4 px-3">
               @include('projects.card')
            </div>
        </div>
    </main>
  
@endsection
