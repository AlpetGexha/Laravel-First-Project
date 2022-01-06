<div>
    @foreach ($category as $categorys)
       <a href="{{ route('category.single', $categorys->category->slug) }}"> <span class="badge badge-sm bg-success">{{ $categorys->category->category }}</span></a>
    @endforeach
</div>