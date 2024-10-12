<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        {{$country->name}}
        <p>
            {{$country->cities}}
            <p>Accessing cities from country</p>
            <ul>
                @foreach($country->cities as $city)
                    <li>{{ $city->name }}</li>
                @endforeach
            </ul>
        </p>
        <ul>
            @foreach($country->states as $state)
                <li>{{ $state->name }}</li>
                <ul>
                    @foreach($state->cities as $city)
                        <li>{{ $city->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
        
        {{-- @foreach($posts as $post)
            
        @endforeach --}}
    </div>
</body>
</html>