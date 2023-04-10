<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')-MissSkills</title>
        {{-- @if(Route::is('contestants.index') || Route::is('welcome')) --}}
            <link rel="icon" href="{{ asset('public/assets/logo/logo.png') }}" type="image/png">
        {{-- @else
            <link rel="icon" href="@yield('contestantIcon')">
        @endif --}}
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('public/assets/libs/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/libs/toastr/build/toastr.min.css') }}">


    </head>
    <body>

        <main>
            @yield('content')
        </main>


        <script src="{{ asset('public/assets/libs/popper/popper.min.js') }}"></script>
        <script  src="{{ asset('public/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/toastr/build/toastr.min.js') }}" ></script>
        <script src="{{ asset('public/assets/libs/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "hideDuration": "10000",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @endif

            @if (session('info'))
                toastr.info('{{ session('info') }}');
            @endif

            @if (session('warning'))
                toastr.warning('{{ session('warning') }}');
            @endif

            @if (session('error'))
                toastr.error('{{ session('error') }}');
            @endif

        </script>
        @yield('footer_script')
    </body>
</html>
