<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>hasOne (Users and address)</h1>
        @foreach($users as $user)
            <h4>{{$user->name}}</h4>
            <hr>
            <p>Address: {{ $user->address->country }} </p>
        @endforeach
    </div>
    <hr>
    <div>
        <h1>BelongsTo (address & users)</h1>
        @foreach($addresses as $address)
            <h4>Address: {{$address->country}}</h4>
            <hr>
            <p>User: {{ $address->user->name }} - Email: {{ $address->user->email }}  </p>
        @endforeach
    </div>
</body>
</html>