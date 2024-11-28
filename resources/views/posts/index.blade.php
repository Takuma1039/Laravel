<!DOCTYPE html> 
<html lang="en">
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
        <nav class="navbar navbar-expand-lg bg-light">
           <div class="container-fluid">
               <a class="navbar-brand" href="#">Navbar</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/posts/create">create</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
        <h1><font size="6">MyBlog</font></h1>
        <a href="/posts/create" class="btn btn-primary btn-sm active" role="button" aria-disabled="true">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h5 class='title'>
                        <!--aタグはテキストなどに特定のwebページへ移動するリンクを付ける-->
                        <a href="/posts/{{ $post->id }}"><font size="4">{{ $post->title }}</font></a>
                    </h5>
                    <img src="{{ asset('storage/images/' . $post->image) }}" style="width:18rem;" />
                    <p><a href='/user'>ユーザー : {{ $post->user->name }}</a></p>
                    <a href="/categories/{{ $post->category->id }}"><font size="4">Category : {{ $post->category->name }}</font></a>
                    <p class='body'><font size="4">{{ $post->body }}</font></p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf <!--他のサイトからのリクエスト送信などを許容しないため-->
                        @method('DELETE') <!--DELETEリクエストをFormタグのmethod属性で定義するため-->
                        <!--buttonはデフォルトがsubmitなので、type="button"と定義しない場合、ボタンを押したときに送信されてしまう-->
                        <button type="button" class="btn btn-danger btn-sm"onclick="deletePost({{ $post->id }})"><font size="3">delete</font></button>
                    </form>
                </div>
            @endforeach
            <p class='user'><font size="5">ログインユーザー:{{ Auth::user()->name }}</font></p>
        <!--<div>
            @foreach($questions as $question)
                <div>
                    <a href="https://teratail.com/questions/{{ $question['id'] }}">
                            {{ $question['title'] }}
                     </a>
                </div>
            @endforeach
        </div>-->
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
