<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function show()
    {
        return "Hello from CustomController!";
    }
}

