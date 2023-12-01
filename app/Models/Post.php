<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );


    //モデルの関連付けを行う
    public function histories()
    {
    return $this->hasMany('App\Models\History');
    }
    
    //userとの関係
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
