<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function create()
    {
        return view('mypage.create_profile');
    }
    
    public function add(Request $request)
    {   
        $this->validate($request, Profile::$rules);
        
        //ユーザーIDを取得
        $user_id = auth()->user()->id;
        
        $profile = new Profile;
        $form = $request->all();
        $form['user_id'] = $user_id; //ユーザーIDをプロフィールに追加
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('mypage/create_profile');
    }
    
    public function edit(Request $request)
    {
         $profile = Profile::find($request->id);
        if(empty($profile)) {
            abort(404);
        }
        return view('mypage.edit_profile', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        //送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
        if($request->remove == 'true') {
            $profile_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        } else {
            $profile_form['image_path'] = $profile->image_path;
        }
        
        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        return redirect('/mypage');
    }
    
    public function show()
    {
        //ログインユーザーのIDを取得
        $user_id = auth()->user()->id;
        
        //プロフィール情報を取得
        $profile = Profile::where('user_id', $user_id)->first();
        return view('mypage.index',['profile' => $profile]);
    }
}
