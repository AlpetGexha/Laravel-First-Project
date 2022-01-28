<x-Admin>
    <x-slot name="name">
        {{ __('Paneli') }}
    </x-slot>
    @push('style')
        <script src="{{ asset('AdminPanel/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    @endpush
    <div class="container-fluid">
        {{-- ************************** Cart  ************************** --}}
        <!-- Small boxes (Stat box) -->
        <div class="row">
            {{-- Users --}}
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($user->count()) }}</h3>

                        <p>Përdoruesit të regjistruar</p>
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
                        <h3>{{ number_format($post->count()) }}</h3>

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
                        <h3>{{ number_format($category->count()) }}</h3>

                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="#" class="small-box-footer">Më shumë informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ number_format($sessions) }}</h3>
                        <p>Vizitort</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">Më shumë informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        {{-- ************************** Chart  ************************** --}}
        {{-- Post Views --}}
        <div class="card card-success ">
            <div class="card-header">
                <h3 class="card-title">Shikimet</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body shadow">
                <div class="chart">
                    <livewire:admin.dashboard.post-view-chart />
                </div>
            </div>
        </div> {{-- /Perdoruesit e ri --}}

        {{-- Perdoruesit e ri --}}
        <div class="card card-success ">
            <div class="card-header">
                <h3 class="card-title">Përdorusit e ri</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body shadow">
                <div class="chart">
                    <livewire:admin.dashboard.user-chart />
                </div>
            </div>
        </div> {{-- /Perdoruesit e ri --}}

        {{-- Postimet dhe kategorit --}}
        <div class="row">
            {{-- Postimet --}}
            <div class="col-md-6">
                <div class="card card-success ">
                    <div class="card-header">
                        <h3 class="card-title">Potimet</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body shadow">
                        <div class="chart">
                            <livewire:admin.dashboard.post-chart />
                        </div>
                    </div>
                </div>
            </div>{{-- /Perdoruesit e ri --}}

            {{-- Perdoruesit e ri --}}
            <div class="col-md-6">
                <div class="card card-success ">
                    <div class="card-header">
                        <h3 class="card-title">Categorit</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body shadow">
                        <div class="chart">
                            <livewire:admin.dashboard.categoty-chart />
                        </div>
                    </div>
                </div> {{-- /Perdoruesit e ri --}}
            </div>
        </div>
    </div>

</x-Admin>
