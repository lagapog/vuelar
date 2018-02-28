@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-4 justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-xl-5">
                <img class="img-fluid" src="{{ $trip->image }}" alt="Card image cap">
            </div>
            <div class="col-12 col-md-6 col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $trip->location }}</h5>
                        <p class="card-text">{{ $trip->content }}</p>
                        <p class="card-text">
                            Created by
                            <a href="{{ '/'.$trip->user->username }}" class="card-link">{{ $trip->user->username }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @if(count($trip->comments) < 1)
            <p class="lead">No comments yet</p>
        @else
            <comments :trip="{{ $trip->id }}"></comments>
        @endif
    </div>
@endsection