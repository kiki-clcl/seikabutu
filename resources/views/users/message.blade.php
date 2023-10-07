<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
   <body>
    <h1 class="title">メッセージ</h1>
    <div class="content">
        <div id="message_area">

        </div>
        <div>
           <textarea id = "message" rows="5" cols="100"></textarea>
           <button id="submit">送信</button>
        </div>
            
    </div>
    
        <script src="{{asset('/seikabutu/resources/js/chat.js')}}"></script>
</body>
</html>