<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
</head>
<body>
    <h1>Birdboard</h1>

    <ul>
        @foreach ($projects as $project)
            <li>{{$project->title}}</li>
            <li>{{$project->description}}</li>
        @endforeach
    </ul>
</body>
</html>