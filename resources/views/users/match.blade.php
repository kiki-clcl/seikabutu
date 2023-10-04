<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マッチ条件</h1>
        <div class='match'>
            <p class='game name'>ゲーム名</p>
            <p class='game mode'>ゲームモード</p>
            <p class='mutch number'>募集人数</p>
            <p>検索</p>
        </div>
        
        <h1>profile</h1>
        <div class='names'>
            <div class='names'>
                <h1>名前</h1>
                <p class='name'>{{ $user->name }}</p>
                
                <h2>Category</h2>
                <p class='category'>{{ $user->category->title ?? '選択されてません'}}</p>
                
                <h3>一言</h3>
                <p class='body'>{{ $user->body }}</p>
            </div>
            <div>
                <img src="{{ $user->icon_url }}" alt="画像が読み込めません。"/>
            </div>
            <a href="/match/{{ $user->id }}/edit" class="btn btn-primary">編集</a>
        </div>
    </body>
</html>