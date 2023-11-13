<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('mypage.create_profile');
    }
    
    public function edit()
    {
        return view('mypage.edit_profile');
    }
}
