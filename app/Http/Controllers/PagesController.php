<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        return view('home');
    }
}
