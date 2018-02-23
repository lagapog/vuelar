@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-xl-4">
                <form action="/trips/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control @if($errors->has('location')) is-invalid @endif" name="location" id="location" placeholder="Your new trip">
                        @if ($errors->has('location'))
                            @foreach ($errors->get('location') as $error)
                                <div class="invalid-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @if($errors->has('content')) is-invalid @endif" id="content" name="content" rows="5"></textarea>
                        @if ($errors->has('content'))
                            @foreach ($errors->get('content') as $error)
                                <div class="invalid-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image - Use a picture to promove your trip</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection