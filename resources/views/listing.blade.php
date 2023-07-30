@empty ($listing)
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Not Found!</title>
    </head>
    <body>
        <h4 style="text-align:center;">No listing found.</h4>
    </body>
    </html>
@else
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$listing['title']}}</title>
    </head>
    <body>
        <h3>{{$listing['title']}}</h3>
        <p>{{$listing['description']}}</p>
    </body>
    </html>
@endempty