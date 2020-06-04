@extends('layouts.app')

@section('content')
    
    <form method="POST" action="{{url('/projects')}}" class="container" action="">
        
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
                <a type="button" class="button is-white" href="{{url('/projects')}}">Cancle</a>
            </div>
        </div>
    </form>
@endsection
