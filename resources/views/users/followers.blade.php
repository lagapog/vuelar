@extends('layouts.app')
@section('title')
    Vuelar
@endsection
@section('content')
    <div class="container">
        <div class="row mt-2">
            <ul>
                @forelse($user->followers as $follower)
                    <li><a href="{{ '/'.$follower->username }}">{{ $follower->username }}</a></li>
                @empty
                    <p>No follows yet</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection