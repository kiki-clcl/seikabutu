<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
   <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/names/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='content__body'>
                <h1>Name</h1>
                <input type='text' name='name' value="{{ $user->name }}">
                
                <div class="category">
                    <h2>Category</h2>
                    <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                    </select>
                </div>
                
                <h1>一言</h1>
                <input type='text' name='body' value="{{ $user->body }}">
            </div>
            <div class="icon">
                <input type="file" name="icon">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
</html>