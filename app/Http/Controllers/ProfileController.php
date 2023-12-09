<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show($userId)
    {
        $user = User::FindOrFail($userId);
        $profile = Profile::where('user_id', $userId)->first();
        return view('user_profile',['user' => $user, 'profile' => $profile]);
    }
}
