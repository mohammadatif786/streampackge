<html>
    <head>
        <title>Stream Package</title>
    </head>
    <body>
        @foreach ($streams as $item)
            <p>{{ $item->title }}</p>
            <p>{{ $item->description }}</p>
            <p>{{ $item->is_live }}</p>
        @endforeach
    </body>
</html>
