@extends('layouts.app')
@section('content')
    @guest
        <welcome/>
    @else
        <app/>
    @endguest
@endsection