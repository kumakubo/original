<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\History;
use Carbon\Carbon;


class PostController extends Controller
{
    public function add()
    {
        return view('mypage.manga.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Post::$rules);
        
        $post = new Post;
        $form = $request->all();
        
        if(Auth::check()) {
            //ログイン中のユーザーIDを取得
            $user_id = Auth::user()->id;
            
            //ユーザー情報を新しい投稿に紐づける
            $post->user_id = $user_id;
        }
        
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
        //PostModelからデータを受け取る
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
        
        $history = new History();
        $history->post_id = $posts->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('mypage/manga/');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        $user = auth()->user(); //認証されたユーザーを取得
        
        if ($cond_title != '') {
            //そのユーザーの特定のタイトルの投稿だけを取得
            $searchResults = $user->posts()->where('title', $cond_title)->get();
        } else {
            //タイトルが指定されなければ、そのユーザーの投稿全て取得
            $searchResults = $user->posts;
        }
        return view('mypage.manga.index', ['searchResults' => $searchResults, 'cond_title' => $cond_title]);
    }
    
    public function delete(Request $request, $id)
    {
        $posts = Post::find($id);
        
        $posts->delete();
        
        return redirect('mypage/manga');
    }
}
    

