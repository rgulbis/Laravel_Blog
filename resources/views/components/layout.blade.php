<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset("logo.svg") }}" type="image/x-icon">
    <title>{{ $title ?? "Blog" }}</title>  
    <link rel="stylesheet" href="{{ asset("style.css") }}">  
</head>
<body>
    <div class="navbar">
        {{ $navbar ?? '' }}
        <x-navigation></x-navigation>
    </div>
    <div class="main">
        <div class="content">
            {{ $slot }}
        </div>
        <div class="categories">
            {{ $categories ?? '' }}
        </div>
    </div>
    <script src="{{ asset("script.js") }}"></script>
</body>               
</html>