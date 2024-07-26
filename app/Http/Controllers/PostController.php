<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
       // $test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql(); //確認用に追加
       // dd($test); //確認用に追加
        
        return view("posts.index")->with(['posts' => $post->getPaginateByLimit(1)]);
    }
    
    public function show(Post $post)
    {
        //変数の中身の確認
        //dd($post);
        //'post'はbladeファイルで使用する変数。中身は$post(ID=1のPostインスタンス)
        return view("posts.show")->with(['post' => $post]);
    }
    
    public function create(Post $post)
    {
        //変数の中身の確認
        //dd($post);
        return view("posts.create");
    }
}
