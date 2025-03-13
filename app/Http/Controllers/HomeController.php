<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $message = "Hello from Laravel!";
        return view('home', compact('message'));
    }
}

