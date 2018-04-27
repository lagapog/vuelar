<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTripRequest;
use App\Trip;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    public function getAll() {
        return Trip::with('user')->get();
    }
    public function findById (Trip $trip) {
        $trip->load('user');
        return $trip;
    }

    public function create (CreateTripRequest $request) {
        $user = $request->user();
        $image = $request->file('image');

        $trip = Trip::create([
            'location' => $request->input('location'),
            'image' => $image->store('messages', 'public'),
            'content' => $request->input('content'),
            'stars' => 0,
            'user_id' => $user->id
        ]);

        return redirect('/trips/'.$trip->id);
    }
    public function search ($query) {
        $trips = Trip::with('user')->where('location', 'LIKE', "%$query%")->get();
        return $trips;
    }

    public function comments (Trip $trip) {
        $trip->comments->load('user');
        return $trip->comments;
    }
}
