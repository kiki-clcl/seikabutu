<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>profile</h1>
        <div class='names'>
            <div class='names'>
                <h1>名前</h1>
                <p class='name'>{{ $user->name }}</p>
                
                <h2>Category</h2>
                <p class='category'>{{ $user->category->title ?? '選択されてません'}}</p>
                
                <h2>Rank</h2>
                <p class='rank'>{{ $user->rank->title ?? '選択されてません'}}</p>
                
                <h3>一言</h3>
                <p class='body'>{{ $user->body }}</p>
            </div>
            <div>
                <img src="{{ $user->icon_url }}" alt="画像が読み込めません。"/>
            </div>
            <a href="/names/{{ $user->id }}/edit" class="btn btn-primary">編集</a>
        </div>
    </body>
</html>