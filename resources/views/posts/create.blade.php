<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
    <x-slot name="header">
        　Create
    </x-slot>
    <body>
        <h1><font size="6">MyBlog</font></h1>
        <form action="/posts" method="POST" enctype='multipart/form-data'> <!--postsというリソースに対してPOSTリクエストを送信すると、そのリソースに対して登録を行うことができる-->
            @csrf <!--他のサイトからのリクエスト送信などを許容しないため-->
            <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        　　</div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>　
                <!--「/>」はタグの終了の省略。oldで以前に入力したpostのtitle情報を取得して表示。エラーが出ても表示内容は保存される-->
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p> <!--titleに関するエラーを取得して表示-->
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も一日お疲れ様でした。">{{ old('post.body') }}</textarea>　<!--長い文章や改行を許容-->
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p> <!--bodyに関するエラーを取得して表示-->
            </div>
            <div class="image">
                    <input type="file" name="image" />
            </div>
            <!--<input type="submit" value="store"/> <!--クリックしたときにsubmitが含まれるformに対して送信のリクエストが行われる-->
            <button type="submit" class="btn btn-success btn-sm" value="store"><font size="3">store</font></button>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <p class='user'><font size="5">ログインユーザー:{{ Auth::user()->name }}</font></p>
    </body>
    </x-app-layout>
</html>