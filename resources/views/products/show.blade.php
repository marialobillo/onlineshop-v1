<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product - {{ $product->title  }}</title>
</head>
<body>
    <div class="container">
        <h1>{{ $product->title  }} ({{ $product->id  }})</h1>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price  }}</p>
    </div>
</body>
</html>
