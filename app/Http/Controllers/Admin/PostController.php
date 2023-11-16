<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show()
    {
        //dd('showが実行された');
        return view('mypage.index');
    }
    
     public function myposts()
    {
        return view('mypage.manga.index');
    }
    
    public function create()
    {
        return view('mypage.manga.create');
    }
    
    public function edit()
    {
        return view('mypage.manga.edit');
    }
    
}
