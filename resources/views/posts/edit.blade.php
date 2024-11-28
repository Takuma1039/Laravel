<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <x-app-layout>
    <x-slot name="header">
        　Edit
    </x-slot>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST" enctype='multipart/form-data'> <!--actionURL対してPOSTリクエストを送信すると、そのリソースに対して登録を行うことができる-->
                @csrf <!--他のサイトからのリクエスト送信などを許容しないため-->
                @method('PUT') <!--PUTリクエストをFormタグのmethod属性で定義するため-->
                <div class="content_title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}"/>　
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p> <!--titleに関するエラーを取得して表示-->
                </div>
                <div class="content_body">
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="本文">{{ $post->body }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <div class="image">
                    <input type="file" name="image" value="{{ $post->image }}"/>
                </div>
                <input type="submit" value="update"/> <!--クリックしたときにsubmitが含まれるformに対して送信のリクエストが行われる-->
            </form>
            <div class="footer">
                <a href="/posts/{{ $post->id }}">戻る</a>
            </div>
            <p class='user'>ログインユーザー:{{ Auth::user()->name }}</p>
        </div>
    </body>
    </x-app-layout>
</html>