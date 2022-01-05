<div>
    @foreach ($category as $categorys)
        <span class="badge badge-sm bg-success">{{ $categorys->category->category }}</span>
    @endforeach
</div>
