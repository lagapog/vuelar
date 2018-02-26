@extends('layouts.app')
@section('content')
    <div class="container">
            <div class="row">
                    <div class="col">
                        <h2 class="h2">{{$user->username}}'s follows</p>
                    </div>
                </div>
        <div class="row mt-2">
            @forelse($user->follows as $follow)
                <div class="col-12 col-md-4 col-xl-3 my-2">
                    <div class="card text-center pt-2">
                        <img class="img-fluid rounded-circle mx-auto" width="120" src="{{ $follow->avatar }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $follow->username }}</h5>
                            <p class="card-text">{{ count($follow->trips) }} trips created</p>
                            <a href="{{ '/'.$follow->username }}" class="btn btn-outline-primary">
                                View profile
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>{{ $user->username }} doesn't have follows yet</p>
            @endforelse
        </div>
    </div>
@endsection