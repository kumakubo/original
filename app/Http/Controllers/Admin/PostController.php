<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

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
    
    public function add(Request $request)
    {
        $this->validate($request, Post::$rules);
        
        $post = new Post;
        $form = $request->all();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $post->image_path = basename($path);
        } else {
            $post->image_path = null;
        }
    
        unset($form['_token']);
        unset($form['image']);
        
        $post->fill($form);
        $post->save();
        
        return redirect('mypage/manga/create');
    }
    
    public function edit(Request $request)
    {
        $posts = Post::find($request->id);
        if(empty($posts)) {
            abort(404);
        }
        return view('mypage.manga.edit', ['post_form' => $posts]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Post::$rules);
        $posts = Post::find($request->id);
        //送信されてきたフォームデータを格納する
        $post_form = $request->all();
        
        if($request->remove == 'true') {
            $post_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $post_form['image_path'] = basename($path);
        } else {
            $post_form['image_path'] = $posts->image_path;
        }
        
        unset($post_form['image']);
        unset($post_form['remove']);
        unset($post_form['_token']);
        
        $posts->fill($post_form)->save();
        
        return redirect('mypage/manga/');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $searchResults = Post::where('title', $cond_title)->get();
        } else {
            $searchResults = Post::all();
        }
        return view('mypage.manga.index', ['searchResults' => $searchResults, 'cond_title' => $cond_title]);
    }
    
    public function delete(Request $request)
    {
        $posts = Post::find($request->id);
        
        $posts->delete();
        
        return redirect('mypage/manga');
    }
}
    

