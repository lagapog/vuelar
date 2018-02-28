@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form class="col-12 col-md-10 col-xl-8" action="/trips">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
                <input name="query" type="text" class="form-control" placeholder="An awesome trip" aria-label="Search" aria-describedby="basic-addon2">
            </div>
        </form>
    </div>
    <div class="row mt-4">
        @forelse($trips as $trip)
            <div class="col-12 col-md-6 col-xl-4 mb-4">
                <trips :trip="{{ $trip }}" />
            </div>
        @empty
            <p>Trips no found</p>
        @endforelse
    </div>
    @if(count($trips))
        <div class="row justify-content-center">
            {{ $trips->links() }}
        </div>
    @endif
</div>
@endsection
