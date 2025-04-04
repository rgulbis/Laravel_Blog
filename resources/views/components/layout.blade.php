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
    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">
                    <svg class="error-x" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif
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