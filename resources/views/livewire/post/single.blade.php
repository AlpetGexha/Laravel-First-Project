<div>
    @if (auth()->check())

        @if (!$post->isLikedByUser(Auth::user()))
            <button class="btn btn-outline-dark" wire:click.prevent="like({{ $post->id }})" type="button">
                <i class="far fa-thumbs-up"></i>&nbsp; Like
            </button>
        @else
            <button class="btn btn-outline-dark" wire:click.prevent="unLike({{ $post->id }})" type="button"><i
                    class="fas fa-thumbs-up"></i>&nbsp; UnLike</button>
        @endif

        @if (!$post->isSavedByUser(Auth::user()))
            <button class="btn btn-outline-dark" wire:click.prevent="save({{ $post->id }})" type="submit"><i
                    class="far fa-bookmark"></i>&nbsp; Save</button>
        @else
            <button class="btn btn-outline-dark" wire:click.prevent="unSave({{ $post->id }})" type="submit"><i
                    class="fas fa-bookmark"></i>&nbsp; UnSave</button>
        @endif

    @endif
    <div class="single_post p-2 card shadow-sm bg-light">
        <div class="single_post_info">
            <img src="https://picsum.photos/200/150/?random" class="img-fluid" alt="image not available"
                style="width:900px;height:380px" loading="lazy">
            <div class="single_post_info_show">
                <ul>
                    <li>
                        <a href="">
                            <i class="far fa-eye fa-x2"></i>{{ $post->views }}
                            <i class="far fa-thumbs-up"></i>{{ $post->likes()->count() }}
                            <i class="far fa-bookmark"></i>{{ $post->saves()->count() }}
                            <i class="far fa-user fa-x2"></i>AlpetG2
                            <i class="far fa-calendar-alt"></i> {{ $post->created_at->diffForHumans() }}
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <h1>{{ $post->title }}</h1>

        <p class="p-1"> {{ $post->body }} </p>
    </div>
</div>
