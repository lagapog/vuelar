@extends('layouts.app')
@section('title')
    Vuelar
@endsection
@section('content')
    <div class="container">
        <div class="row mt-2">
            <ul>
                @forelse($user->follows as $follow)
                    <li><a href="{{ '/'.$follow->username }}">{{ $follow->username }}</a></li>
                @empty
                    <p>No follows yet</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection