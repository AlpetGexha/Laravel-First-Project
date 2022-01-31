   {{-- {{ $category }} --}}
   {{-- <section class="my-5 cart shadow ">
       <div class="row">
           <div class="col-lg-5 col-xl-4">
               <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4 p-1">
                   <img class="img-fluid" loading="lazy" src="{{ $image }}" alt="Sample image">
                   <a>
                       <div class="mask rgba-white-slight"></div>
                   </a>
               </div>
           </div>

           <div class="col-lg-7 col-xl-8">
               <h3 class="font-weight-bold mb-3 text-center"><strong>{{ $title }}</strong></h3>
               <p class="dark-grey-text p-2 text-break">{{ Str::limit($body, 140, '...') }}</p>
               <p class="p-2">nga <a href="{{ route('user.show', $username) }}"
                       class="font-weight-bold">{{ $username }}</a>,
                   {{ $created_at }}</p>
               <div class="d-flex bd-highlight">
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
                       <a class="btn btn-outline-success btn-md" href="{{ route('post.single', $post_slug) }}">
                           Lexo më shume
                       </a>
                   </div>
               </div>
           </div>
       </div>
   </section> --}}
   <div class="blog-card">
       <div class="meta">
           <div class="photo">
               <img loading="lazy" src="{{ $image }}" alt="">
           </div>
           <ul class="details">
               <li>
                   <i class="far fa-user"></i>
                   <a href="{{ route('user.show', $username) }}">{{ $username }}</a>
               </li>
               <li><i class="far fa-calendar"></i>{{ $created_at }}</li>
               <li> <i class="far fa-eye"></i>{{ $views }}</li>
               <li> <i class="far fa-thumbs-up"></i>{{ $likes }}</li>
               <li> <i class="far fa-comment"></i>{{ $comments }}</li>
               <li><i class="far fa-bookmark"></i>{{ $shares }}</li>
               {{-- <li class="tags">
                   <ul>
                       <li><a href="#">Learn</a></li>
                   </ul>
               </li> --}}
           </ul>
       </div>
       <div class="description">
           <h1 class="text-center">{{ $title }}</h1>
           {{-- <h2></h2> --}}
           <p> {{ Str::limit($body, 200, '...') }}</p>
           <p class="read-more">
               {{-- <i class="fas fa-arrow-right"></i> --}}
               <a href="{{ route('post.single', $post_slug) }}">Lexo më Shumë</a>
           </p>
       </div>
   </div>
