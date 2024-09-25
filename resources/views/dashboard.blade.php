<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>
        This is welcome page
    </h1>

    @foreach($users as $user)
        <p>{{ $user['name'] }}</p>
        <p>{{ $user['vek'] }}</p>
    @endforeach

    @foreach($users as $user)
        @if($users[0]['vek'] >= 18)
            <p>{{$user['name']}} vekom {{$user['vek']}} moze soferovat auto</p>
        @else
            <p>{{$user['name']}} vekom {{$user['vek']}} nemoze soferovat auto</p>
        @endif
    @endforeach

</body>
</html>
