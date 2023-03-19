<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vertical Navbar - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/main/app-dark.css') }}" />

    <link rel="shortcut icon" href="{{ asset('/assets/images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('/assets/images/logo/favicon.png') }}" type="image/png" />
    @yield('styles')

    @livewireStyles
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js')}}"></script>
    
    <script src="{{asset('assets/js/sweetalert2@11.js')}}"></script>
</head>

<body>
    <div id="app">
        @include('layouts.components.sidebar')
        <div id="main" class="layout-navbar navbar-fixed">
            @include('layouts.components.navbar')
            <div id="main-content">
                <div class="page-heading">
                    @include('layouts.components.page_title')
                    <section class="section">
                        @yield('content')
                    </section>
                </div>

                @include('layouts.components.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
    @livewireScripts
    @yield('scripts')
</body>

</html>