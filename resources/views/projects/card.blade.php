<div class="card" style="height: 208px">
    <h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-101 pl-4">
    <a href="{{$project->path()}}">{{str_limit($project->title, 10)}}</a>
    </h3>
    <div class="text-gray-600">
        {{ str_limit($project->description, 100)}}
    </div>
</div>
