<div>
    <input wire:model='search' type="search" placeholder="Kerko" class="form-control mb-2">
    @forelse ($posts as $post)

        <div class="drejtimet card shadow bg-light mt-2 mb-5">
            <div class="d-flex justify-content-center flex-wrap">
                <div class="row g-0 bg-light container-layout">
                    <h1 class="mt-0">{{ $post->title }}</h1>
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <img src="{{ $post->photo }}" class="w-100 " alt="{{ $post->title }}">
                    </div>

                    <div class="col-md-6 p-4 ps-md-0 ">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('user.show', $post->user->username) }}">
                                    <p>{{ $post->user->username }}</p>
                                </a>
                            </div>
                            <div class="col">
                                <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        {{-- <livewire:category.postcategory :id="$post->id"> --}}

                        @foreach ($post->category as $category)
                            <a style="text-decoration: none;"
                                href="{{ route('category.single', $category->category->slug) }}">
                                <span class="badge badge-sm bg-success">{{ $category->category->category }}</span>
                            </a>
                        @endforeach
                        <p class="body-cart-text">{{ Str::limit($post->body, 200, '...') }}.</p>

                        <div class="d-flex bd-highlight mb-3">
                            <div class="p-2 bd-highlight"><i class="far fa-eye"></i>{{ $post->views }}</div>
                            <div class="p-2 bd-highlight"><i
                                    class="far fa-comment">{{ $post->comments()->count() }}</i>
                            </div>
                            <div class="p-2 bd-highlight"><i
                                    class="far fa-thumbs-up"></i>{{ $post->likes()->count() }}
                            </div>
                            <div class="p-2 bd-highlight"><i
                                    class="far fa-bookmark"></i>{{ $post->saves()->count() }}
                            </div>
                            <div class="ms-auto p-2 bd-highlight"><a class="btn btn-outline-success"
                                    href="{{ route('post.single', $post->slug) }}">Lexo me shume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <div class="text-center">
            <span style="color:red;">Nuk ka Postime</span>
        </div>

    @endforelse
    <div class="body-footer d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
</div>
