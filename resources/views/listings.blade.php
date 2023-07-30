<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laragigs</title>
</head>
<body>
    <h1>{{$heading}}</h1>

    @if (count($listings) == 0)
        <p>No listings found.</p>
    @else
        @foreach($listings as $listing)
            <a href="/listings/{{$listing['id']}}"><h3>{{$listing['title']}}</h3></a>
            <p>{{$listing['description']}}</p>
        @endforeach
    @endif
</body>
</html>