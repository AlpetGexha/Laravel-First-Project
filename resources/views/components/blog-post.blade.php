   {{-- {{ $category }} --}}
   <section class="my-5 cart shadow ">
       <div class="row">
           <div class="col-lg-5 col-xl-4">
               <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                   <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/49.webp"
                       alt="Sample image">
                   <a>
                       <div class="mask rgba-white-slight"></div>
                   </a>
               </div>
           </div>

           <div class="col-lg-7 col-xl-8">
               <h3 class="font-weight-bold mb-3 text-center"><strong>{{ $title }}</strong></h3>
               <p class="dark-grey-text">{{ Str::limit($body, 261, '...') }}</p>
               <p>nga <a href="{{ route('user.show', $username) }}" class="font-weight-bold">{{ $username }}</a>,
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
                       <a class="btn btn-outline-success btn-md" href="{{ route('post.single', $post_slug) }}">Lexo më
                           shume</a>
                   </div>
               </div>
           </div>
       </div>
   </section>
