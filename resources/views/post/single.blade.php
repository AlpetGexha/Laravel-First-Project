<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documets</title>

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
