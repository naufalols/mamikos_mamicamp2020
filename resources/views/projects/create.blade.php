<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css" />
</head>

<body>

    <form method="POST" action="{{url('/projects')}}" class="container" action="" style="padding-top: 40px;">
        
        @csrf
        <h1 class="heading is-h1">Create Project</h1>
        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" name="title" placeholder="title" id="" class="input">
            </div>
        </div>

        <div class="field">
            <label class="label" for="descriptiom">Descriptiom</label>

            <div class="control">
                <textarea name="description" id="" class="textarea"></textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-info">Create Project</button>

            </div>
        </div>
    </form>
</body>

</html>
