<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post)
    {
       // $test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql(); //確認用に追加
       // dd($test); //確認用に追加
        
        return view("posts.index")->with(['posts' => $post->getPaginateByLimit(5)]);
    }
    
    public function show(Post $post)
    {
        //変数の中身の確認
        //dd($post);
        //'post'はbladeファイルで使用する変数。中身は$post(ID=1のPostインスタンス)
        return view("posts.show")->with(['post' => $post]);
    }
    
    /*public function create(Post $post)
    {
        //変数の中身の確認
        //dd($post);
        return view("posts.create");
    } */
    
    public function create(Category $category)
    {
        //変数の中身の確認
        //dd($post);
        return view("posts.create")->with(['categories' => $category->get()]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        //変数の中身の確認
        //dd($request->all());
        $input = $request['post']; //postをキーに持つリクエストパラメータを取得。キーはformタグ内のname属性を一致
        //fill関数とsave関数でSQLのデータ取得・追加ができる(fill関数+save関数はcreate関数とほぼ同じ)
        $post->fill($input)->save(); //fillを使うことで空だったPostインスタンスのプロパティを受け取ったキーごとに上書きできる(fillableに定義されもののみ)
        //$post->create($input);
        return redirect('/posts/' . $post->id); //保存したpostのIDを含んだURLにリダイレクト(画面遷移)
    }
    
    public function edit(Post $post)
    {
        //変数の中身の確認
        //dd($request->all());
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(Post $post, PostRequest $request)
    {
        //変数の中身の確認
        //dd($request->all());
        $input_post = $request['post']; //postをキーに持つリクエストパラメータを取得。キーはformタグ内のname属性を一致させること
        //fill関数とsave関数でSQLのデータ取得・追加ができる(fill関数+save関数はcreate関数とほぼ同じ)
        $post->fill($input_post)->save(); //fillを使うことで空だったPostインスタンスのプロパティを受け取ったキーごとに上書きできる(fillableに定義されもののみ)
        //$post->create($input_post);
        return redirect('/posts/' . $post->id); //保存したpostのIDを含んだURLにリダイレクト(画面遷移)
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/'); //リダイレクト(画面遷移)
    }
}
