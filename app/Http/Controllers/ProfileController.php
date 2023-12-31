<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;

class ProfileController extends Controller
{
    public function show($userId)
    {
        $profile = Profile::where('user_id', $userId)->first();
        $posts = Post::where('user_id', $userId)->get();
        return view('user_profile',[
            'profile' => $profile,
            'posts' => $posts,
        ]);
    }
}
