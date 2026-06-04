<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="google-site-verification" content="UGIBsBig0UExM_VxkIFaYyp3lRr7oVEGrk90YrIemjc" />
    
    <title>@yield('title', 'Fashion Store | Men, Women, Kids Clothing & Shoes')</title>

	<meta name="description" content="@yield('description', 'Shop quality fashion clothing, official wear, lifestyle outfits, shoes and accessories for men, women 		and children.')">

	<meta name="keywords" content="@yield('keywords', 'fashion store, official clothes, lifestyle wear, shoes, men clothing, women clothing, kids clothing, fashion 	kenya')">

	<meta name="author" content="Fashion Store">

	<meta name="robots" content="index, follow">

	<link rel="canonical" href="{{ url()->current() }}">

	<!-- Open Graph -->
	<meta property="og:title" content="@yield('title', 'Fashion Store | Men, Women, Kids Clothing & Shoes')">

	<meta property="og:description" content="@yield('description', 'Shop quality fashion clothing, official wear, lifestyle outfits, shoes and accessories for men, 	women and children.')">

	<meta property="og:url" content="{{ url()->current() }}">

	<meta property="og:type" content="website">

	<meta property="og:image" content="{{ asset('images/logo.png') }}">

	<!-- Twitter -->
	<meta name="twitter:card" content="summary_large_image">

	<meta name="twitter:title" content="@yield('title', 'Fashion Store | Men, Women, Kids Clothing & Shoes')">

	<meta name="twitter:description" content="@yield('description', 'Shop quality fashion clothing, official wear, lifestyle outfits, shoes and accessories for men, 		women and children.')">

	<meta name="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

            <!--STYLES-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}"> 
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
            {{-- END STYLES --}}
    {{-- data tables --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('Admin/js/datatables-simple-demo.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('Admin/css/styles.css')}}" rel="stylesheet" />
    {{-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> --}}
    {{-- end data tables --}}

    {{-- leaflet css --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- sweeetalert link --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- end sweetalert --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

            <script type="application/ld+json">
		{
  		"@context":"https://schema.org",
  		"@type":"Store",
  		"name":"Fashion Store",
  		"url":"{{ url('/') }}",
  		"logo":"{{ asset('images/logo.png') }}",
  		"description":"Fashion clothing, official wear, lifestyle outfits and shoes for men, women and children."
		}
	</script>
</head>
<body>
    <div id="app">
        @include('Inc.navigationbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
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

    {{-- leaflet js --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-4.043740, 39.658871], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>

<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

</body>
</html>
