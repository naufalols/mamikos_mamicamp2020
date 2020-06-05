@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex item-center mb-3">
            <h1 class="header h1 mr-auto">Birdboard</h1>
            <a type="button" class="button is-small is-info" href="{{url('/projects/create')}}">New Project</a>
        </div>

        <div class="flex ">
        @forelse($projects as $project)
            <div class="bg-white mr-4 p-5 rounded shadow  w-1/3" style="height: 208px">
                <h3 class="font-normal text-xl mb-4 py-4">{{$project->title}}</h3>
                <div class="text-gray-600">
                    {{ str_limit($project->description, 250)}}
                </div>
            </div>
        @empty
            <li>No Projects Yet.</li>   
        @endforelse
        </div>
    </div>
@endsection
