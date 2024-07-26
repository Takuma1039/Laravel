<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST"> <!--postsというリソースに対してPOSTリクエストを送信すると、そのリソースに対して登録を行うことができる-->
            @csrf <!--他のサイトからのリクエスト送信などを許容しないため-->
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>　<!--「/>」はタグの終了の省略-->
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も一日お疲れ様でした。"></textarea>　<!--長い文章や改行を許容-->
            </div>
            <input type="submit" value="store"/> <!--クリックしたときにsubmitが含まれるformに対して送信のリクエストが行われる-->
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>