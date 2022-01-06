<div>
        @if (auth()->check())

            @if (!$post->isLikedByUser(Auth::user()))
                <button wire:click.prevent="like({{ $post->id }})" type="button"><i
                        class="far fa-thumbs-up pr-3"></i>Like</button>
            @else
                <button wire:click.prevent="unLike({{ $post->id }})" type="button"><i
                        class="fas fa-thumbs-up pr-3"></i>UnLike</button>
            @endif

            @if (!$post->isSavedByUser(Auth::user()))
                <button wire:click="save({{ $post->id }})" type="submit"><i
                        class="far fa-thumbs-up pr-3"></i>Save</button>
            @else
                <button wire:click="unSave({{ $post->id }})" type="submit"><i
                        class="fas fa-thumbs-up pr-3"></i>UnSave</button>
            @endif

        @endif
        <div class="single_post  card shadow-sm bg-light">
            <div class="single_post_info">
                <img src="https://picsum.photos/200/150/?random" class="img-fluid" alt="image not available"
                    style="width:900px;height:380px" loading="lazy">
                <div class="single_post_info_show">
                    <ul>
                        <li>
                            <a href="user.php?id=17 ">
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

            <p class="p-2"> {{ $post->body }} </p>
        </div>
</div>
