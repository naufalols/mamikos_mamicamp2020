@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex item-center mb-4">
            <h1 class="header h1 mr-auto">Birdboard</h1>
            <a type="button" class="button is-small is-info" href="{{url('/projects/create')}}">New Project</a>
        </div>
    <ul>
        @forelse($projects as $project)
            <li>
            <a href="{{$project->path()}}"> {{$project->title}}</a></li>

        @empty
            <li>No Projects Yet.</li>
            
        @endforelse
    </ul>
    </div>
@endsection
