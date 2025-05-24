<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/mystyle.css') }}">
</head>

<body>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>
    <div>
        <a href="/">Index</a>
        <a href="/home">Home</a>
    </div>
    <h1>Welcome to Laravel</h1>
    <p>This is a simple Laravel application.</p>
    <img style='width: 320px;' src="{{ asset('img/linaunsplash.jpg') }}" alt="">

    <?php $records = ['zain', 'ali', 'ahmad']; ?>
    @if (count($records) === 1)
        I have one record!
    @elseif (count($records) > 1)
        I have multiple records!
    @else
        I don't have any records!
    @endif

    <form action="submitform" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter your name">
        <input type="email" name="email" placeholder="Enter your email">
        <button type="submit">Submit</button>
    </form>

</body>

</html>
