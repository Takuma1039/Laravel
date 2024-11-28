<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
    <x-slot name="header">
        　Index
    </x-slot>
    <body>
        <h1><font size="6">MyBlog</font></h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <!--aタグはテキストなどに特定のwebページへ移動するリンクを付ける-->
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <img src="{{ asset('storage/images/' . $post->image) }}" style="width:18rem;" />
                    <a href="/categories/{{ $post->category->id }}"><font size="4">Category : {{ $post->category->name }}</font></a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf <!--他のサイトからのリクエスト送信などを許容しないため-->
                        @method('DELETE') <!--DELETEリクエストをFormタグのmethod属性で定義するため-->
                        <!--buttonはデフォルトがsubmitなので、type="button"と定義しない場合、ボタンを押したときに送信されてしまう-->
                        <button type="button" class="btn btn-danger btn-sm"onclick="deletePost({{ $post->id }})"><font size="3">delete</font></button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <p class='user'><font size="5">ログインユーザー:{{ Auth::user()->name }}</font></p>
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
