<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        @foreach($tags as $tag)
        <h4>Tag Name : {{ $tag->name }}</h4>
        <p>Posts:
            <ul>
               @foreach($tag->posts as $post)
                <li>{{ $post->name }}</li>
                @endforeach
            </ul>
        </p>
        <hr>
        @endforeach
    </div>
</body>

</html>