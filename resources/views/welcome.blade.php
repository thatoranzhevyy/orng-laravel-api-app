<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>oranzhevyy</title>
</head>
<body class="bg-[#121212]">
<a class="w-screen h-screen flex flex-col items-center justify-center" href="https://oranzhevyy.netlify.app/">
    @if($artwork)
        <img class="max-h-[calc(80vh)]" loading="lazy" src="{{$artwork['image_url']}}" alt="">
    @endif
    <h1 class="text-slate-900 font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight text-center dark:text-white">
        oranzhevyy.</h1>
</a>
</body>
</html>
