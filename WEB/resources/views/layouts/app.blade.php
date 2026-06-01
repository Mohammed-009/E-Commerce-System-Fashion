<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

                <!--STYLES-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}"> 
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
                {{-- END STYLES --}}
        {{-- sweetalert link --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- end sweetalert --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        {{-- @include('Inc.navbar_home') --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{--  --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ $error }}",
                    timer: 6000,
                    timerProgressBar: true,
                    showCloseButton: true,
                    customClass: {
                popup: 'custom-swal'
            }

                });
            @endforeach
        @endif

        @if (Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
                timer: 6000,
                timerProgressBar: true,
                showCloseButton: true,
                customClass: {
                popup: 'custom-swal'
            }
            });
        @endif

        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                customClass: {
                popup: 'custom-swal'
            }
            });
        @endif

        @if (Session::has('info'))
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: "{{ session('info') }}",
                timer: 6000,
                timerProgressBar: true,
                showCloseButton: true,
                customClass: {
                popup: 'custom-swal'
            }
            });
        @endif
        @if (Session::has('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: "{{ session('warning') }}",
                timer: 6000,
                timerProgressBar: true,
                showCloseButton: true,
                customClass: {
                popup: 'custom-swal'
            }
            });
        @endif
    });
</script>
</body>
</html>
