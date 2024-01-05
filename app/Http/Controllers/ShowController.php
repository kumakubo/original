<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        //タイトルで記事を検索する
        $query = $request->input('search');
        
        $posts = Post::when($query, function ($query) use ($request) {
                return $query->where('title', 'like', '%' . $request->input('search') . '%');
            })
            ->orderByDesc('updated_at')
            ->get();
            
        return view('manga.index',['posts'=> $posts]);
    }
    
    public function show($post_id)
    {
        //Postモデルをデータベースから取得
        $post = Post::findOrFail($post_id);
        return view('manga.post',['post' => $post]);
    }
    
}
