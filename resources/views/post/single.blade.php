<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    @livewireStyles
</head>

<body>

    <livewire:post.single :id="$post->id" />
    {{-- {{ $comments->id }} --}}
    <h1>Commnet</h1>

    <livewire:post.comments :id="$post->id" />

    @livewireScripts
</body>

</html>