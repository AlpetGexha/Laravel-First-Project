<x-Admin>
    <x-slot name="name">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            {{-- Users --}}
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $user->count() }}</h3>

                        <p>Përdoruesit</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">Më shumë informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{-- Postimet --}}
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $post->count() }}</h3>

                        <p>Postime</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-blog"></i>
                    </div>
                    <a href="#" class="small-box-footer">Më shumë informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $category->count() }}</h3>

                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="#" class="small-box-footer">Më shumë informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</x-Admin>
