<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
    <x-slot name="header">
        　Show
    </x-slot>
    <body>
        <div class="edit">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary btn-sm active" role="button" aria-disabled="true">edit</a>
        </div>
        <img src="{{ asset('storage/images/' . $post->image) }}" style="width:18rem;" />
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content_post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
            </div>
        </div>
        <a href="">{{ $post->category->name }}</a>
        <p>{{ $post->user->name }}</p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <p class='user'>ログインユーザー:{{ Auth::user()->name }}</p>
    </body>
    </x-app-layout>
</html>