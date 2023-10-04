<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
   <body>
    <h1 class="title">マッチング編集画面</h1>
    <div class="content">
        <form action="/match/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='match__body'>
                
                <div class="category">
                    <h2>Category</h2>
                    <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                    </select>
                    
                    <h1>Mode</h1>
                    <select name="mode_id">
                    @foreach ($modes as $mode)
                        <option value="{{ $mode->id }}">{{ $mode->title }}</option>
                    @endforeach
                    </select>
                </div>
                

            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
</html>