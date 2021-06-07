<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OnlineShop v1</title>
</head>
<body>
    @dump($errors)
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @if(isset($errors) || $errors->any())
        <div class="alert alert-danger">
           <ul>
               @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
               @endforeach
           </ul>
        </div>
    @endif

    @yield('content')
</body>
</html>
