@extends('layouts.app')

@section('content')
    
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1 class="header h1">{{$project->title}}</h1>

    <p>{{ $project->description}}</p>
<br>
    <a type="button" class="button is-white" href="{{url('/projects')}}">Go Back</a>
</div>
@endsection
