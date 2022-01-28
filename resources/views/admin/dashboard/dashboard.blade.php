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
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-post-views-mounth-tab" data-toggle="pill"
                            style="color: var(--success)" href="#custom-tabs-one-post-views-mounth" role="tab"
                            aria-controls="custom-tabs-one-post-views-mounth" aria-selected="true">Muaj</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-post-views-week-tab" data-toggle="pill"
                            style="color: var(--success)" href="#custom-tabs-one-post-views-week" role="tab"
                            aria-controls="custom-tabs-one-post-views-week" aria-selected="false">Javë</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                            style="color: var(--success)" href="#custom-tabs-one-messages" role="tab"
                            aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
                    </li> --}}

                </ul>
                <div class="chart">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        {{-- <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel"
                            aria-labelledby="custom-tabs-one-home-tab">
                            1
                        </div> --}}
                        <div class="tab-pane fade" id="custom-tabs-one-post-views-week" role="tabpanel"
                            aria-labelledby="custom-tabs-one-post-views-week-tab">
                            <livewire:admin.dashboard.post-view.week />
                        </div>
                        {{-- <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                            aria-labelledby="custom-tabs-one-messages-tab">
                            3
                        </div> --}}
                        <div class="tab-pane fade active show" id="custom-tabs-one-post-views-mounth" role="tabpanel"
                            aria-labelledby="custom-tabs-one-post-views-mounth-tab">
                            <livewire:admin.dashboard.post-view-chart />

                        </div>
                    </div>

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
