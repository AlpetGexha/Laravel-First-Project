<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="{{asset('AdminPanel/plugins/jquery-lazy/jquery.lazy.min.js')}}"></script>

</head>

<body>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')


    <livewire:styles>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"
                integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        </head>

        <body class="font-sans antialiased bg-light">
            <x-jet-banner />
            <livewire:navigation-menu>

                <!-- Page Heading -->
                <header class="d-flex py-3 bg-white shadow-sm border-bottom">
                    <div class="container">
                        {{ $header }}
                    </div>
                </header>

                <!-- Page Content -->
                <main class="container my-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                {{ $slot }}
                            </div>
                            <div class="col-md-4">
                                <div class="position-sticky" style="top: 5rem;">
                                    <x-sitebar />
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


                @stack('modals')
                <livewire:scripts>
                    @stack('scripts')

        </body>

</html>
