<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach($users as $user)
            <h4>{{ $user->name }}</h4>
            <p>Posts : {{$user->posts->count() }}</p> <hr>
        @endforeach
    </div>
</body>
</html>