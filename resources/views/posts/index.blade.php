<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <x-slot name="header">
        　Index
    </x-slot>
    <body>
        <h1>Blog Name</h1>
        [<a href="/posts/create">create</a>]
        <dev class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <!--aタグはテキストなどに特定のwebページへ移動するリンクを付ける-->
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p><a href='/user'>{{ $post->user->name }}</a></p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf <!--他のサイトからのリクエスト送信などを許容しないため-->
                        @method('DELETE') <!--DELETEリクエストをFormタグのmethod属性で定義するため-->
                        <!--buttonはデフォルトがsubmitなので、type="button"と定義しない場合、ボタンを押したときに送信されてしまう-->
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                </div>
            @endforeach
            <p class='user'>ログインユーザー:{{ Auth::user()->name }}</p>
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script> //javascript
            function deletePost(id) {
                'use strict'
                //カッコ内の文字をポップアップとして表示する
                if(confirm('削除すると復元できません。\n本当に削除しますか?')) {
                    document.getElementById(`form_${id}`).submit(); //文字列で変数を使うために${}を扱う
                }
            }
        </script>
    </body>
    </x-app-layout>
</html>
