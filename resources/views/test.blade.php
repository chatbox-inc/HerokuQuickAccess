<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue"></script>
    <title>てすとあっｐ</title>
</head>
<body>
<div id="app">
    <p v-for="aaaaa in message">
        @{{ aaaaa }}
    </p>
</div>
@if(Auth::check())
    <h2>ログインされています</h2>
@else
    <h2>ログインされていません</h2>
@endif

<script>
    aaa = null;
    $.get("/api/app",function(data){
        aaa = data;
        var app = new Vue({
            el: '#app',
            data: {
                message: aaa
            }
        })
    });
</script>
@if(Auth::check())
    <a href="/logout">ここでログアウトします</a>
@else
    <a href="https://id.heroku.com/oauth/authorize?client_id=a43bbce3-6106-4f40-a43d-81aa96458c40&response_type=code">ここをおしてログインします</a>
@endif
</body>
</html>