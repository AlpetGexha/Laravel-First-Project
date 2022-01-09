 <div>
     <div class="drejtimet card shadow bg-light mt-2 mb-5">
         <div class="d-flex justify-content-center flex-wrap">
             <div class="row g-0 bg-light container-layout">
                 <h1 class="mt-0">{{ $title }}</h1>
                 <div class="col-md-6 mb-md-0 p-md-4">
                     {{-- <img src="{{ $post->photo }}" class="w-100 " alt="{{ $post->title }}"> --}}
                     <img src="https://picsum.photos/200/150/?random" class="w-100" alt="{{ $title }}">
                 </div>

                 <div class="col-md-6 p-4 ps-md-0 ">
                     <div class="row">
                         <div class="col">
                             <a href="{{ route('user.show', $username) }}">
                                 <p>{{ $username }}</p>
                             </a>
                         </div>
                         <div class="col">
                             <p class="text-muted">{{ $created_at }}</p>
                         </div>
                     </div>
                     {{-- <livewire:category.postcategory :id="$post->id"> --}}
                     {{ $category }}

                     <p class="body-cart-text">{{ Str::limit($body, 200, '...') }}.</p>

                     <div class="d-flex bd-highlight mb-3">
                         <div class="p-2 bd-highlight">
                             <i class="far fa-eye">{{ $views }}</i>
                         </div>
                         <div class="p-2 bd-highlight">
                             <i class="far fa-comment">{{ $comments }}</i>
                         </div>
                         <div class="p-2 bd-highlight">
                             <i class="far fa-thumbs-up">{{ $likes }}</i>
                         </div>
                         <div class="p-2 bd-highlight">
                             <i class="far fa-bookmark">{{ $shares }}</i>
                         </div>
                         <div class="ms-auto p-2 bd-highlight">
                             <a class="btn btn-outline-success" href="{{ route('post.single', $post_slug) }}">Lexo me shume</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     {{-- <div class="body-footer d-flex justify-content-end">
             {{ $posts->links() }}
         </div> --}}
 </div>
