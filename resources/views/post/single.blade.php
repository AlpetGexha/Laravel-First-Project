<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
</head>

<body>

    <div>
        <h1>Titulli : {{ $post->title }}</h1>
        User : {{ $post->user->username }},<br>
        Pershkrimi : {{ $post->body }},<br>
        Category : {{ $post->category_id }},<br>
        Photo : <img src="{{ url('storage/app/'.$post->photo) }}" alt="" /> ,<br>

        likes : {{ $post->likes }},<br>
        saves : {{ $post->saves }},<br>
        commnets : {{ $post->commnets }},<br>
        views : {{ $post->views }},<br>
        views : {{ $post->views }},<br>
        U krijoa me : {{ $post->created_at->diffForHumans() }},<br>
    </div>

    @livewireScripts
</body>

</html>