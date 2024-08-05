<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <x-app-layout>
    <x-slot name="header">
        　Create
    </x-slot>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST"> <!--postsというリソースに対してPOSTリクエストを送信すると、そのリソースに対して登録を行うことができる-->
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
            <input type="submit" value="store"/> <!--クリックしたときにsubmitが含まれるformに対して送信のリクエストが行われる-->
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>