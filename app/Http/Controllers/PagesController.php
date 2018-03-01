<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        $trips = [];
        if (Auth::check()) {
            $trips = Trip::with('user')->paginate(9);
        }
        return view('home', [
            'trips' => $trips
        ]);
        return view('home');
    }
}
