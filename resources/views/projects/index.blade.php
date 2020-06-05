@extends('layouts.app')

@section('content')
    <header class="flex item-center mb-3 py-4">
       <div class="flex justify-between w-full">
            <h2 class="text-gray-600 text-sm font-normal">My Project</h2>
            <a type="button" class="button-blue" href="{{url('/projects/create')}}">New Project</a>
       </div>
    </header>
    

        <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse($projects as $project)
        <div class="lg:w-1/3 px-3 pb-6">
            <div class="bg-white p-5 rounded-lg shadow  " style="height: 208px">
                <h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-101 pl-4">
                <a href="{{$project->path()}}">{{str_limit($project->title, 10)}}</a>
                </h3>
                <div class="text-gray-600">
                    {{ str_limit($project->description, 100)}}
                </div>
            </div>
        </div>
        @empty
            <li>No Projects Yet.</li>   
        @endforelse
        </main>
   
@endsection
