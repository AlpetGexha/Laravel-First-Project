<div>
    id: {{ $user->id }} <br>
    created_at : {{ strftime('%e %B, %Y', strtotime($user->created_at)) }}<br>
   

    <br>

    <div class="user-profile">

        <div class="container m-auto mt-5 d-flex justify-content-center">
            <div class="card p-3 ">
                <div class="media d-flex align-items-center">
                    {{-- <img src="assets/img/user/AlpetGBlogUser.60c38af32e7f04.43411620.jpg " class="rounded-circle" width="155"> --}}
                    <img src="{{ $user->profile_photo_url }}" class="rounded-circle" height="155" width="155">
                        <div class="ml-3 w-100">
                            <h4 class="mb-1 mt-1"> {{ $user->name }} {{ $user->mbiemri }} </h4> <span class="span_username">@</span><span class="span_username">{{ $user->username }}</span>

                            <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                                <div class="d-flex flex-column"> <span class="articles">Postime</span> <span class="number">{{ $user->post()->count() }}</span> </div>
                                <div class="d-flex flex-column"> <span class="articles">Ndjek</span> <span class="number">#</span> </div>
                                <div class="d-flex flex-column"> <span class="articles">Ndjekës</span> <span class="number">#</span> </div>
                            </div>
                
                            <div class="button mt-2 d-flex flex-row align-items-center"> <button class="btn btn-sm btn-outline-primary w-100">Chat</button> <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button> </div> 
                        </div>
                    </div>
                </div>
            </div>

        </div>

    {{-- @if (auth()->user()->id == $user->id)
    Edit
    @elseif ($user->is_follow())
    <button wire:click="unFollow({{$user->id}})" type="submit"><i class="fas fa-thumbs-up pr-3"></i>UnFollow</button>
    @else
    <button wire:click="follow({{$user->id}})" type="submit"><i class="far fa-thumbs-up pr-3"></i>Follow</button>
    @endif --}}

    {{-- {{ $user->followers()->user_id }} --}}
    @if (auth()->check() && auth()->user()->id != $user->id)
        @if (!$user->isFollowing(Auth::user()))
            <button wire:click.prevent="follow({{ $user->id }})" type="submit"><i
                    class="far fa-thumbs-up pr-3"></i>Follow</button>
        @else
            <button wire:click.prevent="unFollow({{ $user->id }})" type="submit"><i
                    class="fas fa-thumbs-up pr-3"></i>UnFollow</button>
        @endif
    @endif

    @if (auth()->check() && auth()->user()->id == $user->id)
        Edit
    @endif


    <h1>Post</h1>
    @forelse ($user->post as $post)

        <h1>Titulli : {{ $post->title }}</h1>
        User : <a href="{{ route('user.show', $post->user->username) }}">{{ $post->user->username }}</a>,<br>
        Pershkrimi : {{ $post->body }},<br>
        Categorys : <livewire:category.postcategory :id="$post->id">,<br>

            Photo : <img src="{{ url('storage/app/' . $post->photo) }}" alt="" /> ,<br>
            saves : {{ $post->saves()->count() }},<br>
            Likes : {{ $post->likes()->count() }},<br>
            comments : {{ $post->comments()->count() }},<br>
            views : {{ $post->views }},<br>
            U krijoa me : {{ $post->created_at->diffForHumans() }},<br>

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

                @if (auth()->check() && auth()->user()->id == $user->id)
                    <button>Ndrysho</button> <button>Fshije</button>
                @endif

            @endif

        @empty
            Nuk ka postime
    @endforelse
</div>
