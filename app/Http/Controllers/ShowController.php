<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index()
    {
        return view('manga.index');
    }
    
    public function show()
    {
        return view('manga.post');
    }
}
