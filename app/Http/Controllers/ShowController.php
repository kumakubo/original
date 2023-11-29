<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc('updated_at');
        
        return view('manga.index',['posts'=> $posts]);
    }
    
    public function show($post_id)
    {
        //Postモデルをデータベースから取得
        $post = Post::findOrFail($post_id);
        return view('manga.post',['post' => $post]);
    }
}
