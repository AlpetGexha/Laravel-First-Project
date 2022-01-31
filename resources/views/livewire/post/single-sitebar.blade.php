<div class="mb-3 mt-1">
    <div class="card shadow-sm">
        <div class="card-body">
            @foreach ($posts as $post)
                {{-- <img loading="lazy" src="https://picsum.photos/200/300" alt=""> --}}
                <div class="blog-card shadow-sm">
                    <div class="meta">
                        <div class="photo">
                            <img loading="lazy" src="{{ asset('storage/' . $post->post->photo) }}"
                                alt="{{ $post->post->title }}">
                        </div>
                        <ul class="details">
                            <li>
                                <i class="far fa-user"></i>
                                <a
                                    href="{{ route('user.show', ['user' => $post->post->user->username]) }}">{{ $post->post->user->username }}</a>
                            </li>
                            <li><i class="far fa-calendar"></i>{{ $post->post->created_at }}</li>
                            <li><i class="far fa-eye"></i>{{ $post->post->views }}</li>
                        </ul>
                    </div>
                    <div class="description bg-light">
                        <a href="{{ route('post.single', ['post' => $post->post->slug]) }}">
                            <h4 class="text-center">{{ Str::limit($post->post->title, 20, '...') }}</h4>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</div>
