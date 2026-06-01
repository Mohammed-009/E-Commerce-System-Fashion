<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('Admin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        {{-- leaflet css --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

        {{-- external links --}}
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}"> 
    </head>
    <body class="sb-nav-fixed">
        @include('included_pages.header')

        <div id="layoutSidenav">
            @include('included_pages.sidebar')

            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                
                <footer class="py-4 bg-light mt-auto">
                    @include('included_pages.footer')
                </footer>
            </div>
        </div>
        {{-- <script src="{{asset('js/jquery.js')}}"></script> --}}
        <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('Admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('Admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="'{{asset('Admin/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('Admin/js/datatables-simple-demo.js')}}"></script>
        
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
        {{-- sweet alert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    </body>
</html>
