@extends('layouts.app')
@section('title')
    Vuelar
@endsection
@section('content')
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-6 col-md-3 d-flex justify-content-center align-items-center mb-2">
            <img class="img-fluid rounded-circle" style="height: 120px" src="{{ $user->avatar }}" alt="Avatar user">
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-around">
                        @if(auth()->user()->id !== $user->id)
                            @include('users.follow')    
                            <form action="{{ '/conversation/'.$user->username }}" method="post" class="mb-3 text-center">
                                @csrf
                                <button class="btn btn-outline-primary">Talk</button>
                            </form>
                        @endif
                    </div>
                    <h5 class="card-title">Name: {{ $user->name }}</h5>
                    <p class="card-text">Username: {{ $user->username }}</p>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <div class="row justify-content-around">
                        <div class="follows">
                            {{ $user->follows->count() }}
                            <a href="{{ '/'.$user->username.'/follows' }}" class="card-link">Follows</a>
                        </div>
                        <div class="followers">
                            {{ $user->followers->count() }}
                            <a href="{{ '/'.$user->username.'/followers' }}" class="card-link">Followers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2>Trips</h2>
    <div class="row mt-2">
        @forelse($user->trips as $trip)
            <div class="col-12 col-md-6 col-xl-4 mb-4">
                @include('trips.trip')
            </div>
        @empty
            <p>No trips yet</p>
        @endforelse
    </div>
</div>
@endsection