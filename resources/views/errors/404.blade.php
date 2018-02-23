@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Damn it, you broke it!</h1>
            <p class="lead">This looks like you are in a wrong link</p>
            <hr class="my-4">
            <p>Don't be panic, we can take you to home</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="/home" role="button">Come back safely</a>
            </p>
        </div>
    </div>
@endsection