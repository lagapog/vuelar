@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Conversation with {{ $user->username }}</h2>
        @forelse($conversation->privateMessages as $message)
            <div class="card mb-1">
                <p class="card-text">
                    {{ $message->user->username }} says: <br>
                    {{ $message->message }}
                </p>
            </div>
        @empty
            <p>Empty Conversation</p>
        @endforelse
        <form action="{{ "/conversation/$conversation->id/$user->id" }}" method="post" class="mt-auto">
            @csrf
            <div class="form-group row justify-content-around">
                <div class="col-12">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection