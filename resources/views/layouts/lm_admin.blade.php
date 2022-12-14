<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/demo.min.css') }}" rel="stylesheet" />
    <!-- Pus Dist -->
    <link href="{{ asset('assets/pus_dist/css/style.css') }}" rel="stylesheet" />
    <!-- Toast -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/pus_dist/lib/jquery-toast-plugin/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pus_dist/lib/sweetalert/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
        
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
    body, option {
        font-family: 'Poppins';
    }
    </style>
    @yield('css')
    <!-- ....... -->
</head>

<body class="layout-fluid theme-light">
    <div class="page">
        @if(!isset($asside))
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href=".">
                    <img class="d-inline-block" src="{{ asset('assets/img/logo.png') }}" alt="logo" width="150">
                    </a>
                </h1>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lm-admin') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-desktop-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="3" y="4" width="18" height="12" rx="1"></rect>
                                        <path d="M7 20h10"></path>
                                        <path d="M9 16v4"></path>
                                        <path d="M15 16v4"></path>
                                        <path d="M9 12v-4"></path>
                                        <path d="M12 12v-1"></path>
                                        <path d="M15 12v-2"></path>
                                        <path d="M12 12v-1"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pelanggan.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Customer
                                </span>
                            </a>
                        </li>
                        @if(auth()->user()->access != 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <circle cx="12" cy="10" r="3"></circle>
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Home Page
                                </span>
                            </a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-3d" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M12 13.5l4 -1.5"></path>
                                        <path d="M8 11.846l4 1.654v4.5l4 -1.846v-4.308l-4 -1.846z"></path>
                                        <path d="M8 12v4.2l4 1.8"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    About Page
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">
                                    History
                                </a>
                                <a class="dropdown-item" href="">
                                    Vision & Mission
                                </a>
                                <a class="dropdown-item" href="">
                                    AD / ART
                                </a>
                                <a class="dropdown-item" href="">
                                    Structure Organization
                                </a>
                                <a class="dropdown-item" href="">
                                    Regulation
                                </a>
                                <a class="dropdown-item" href="">
                                    Award
                                </a>
                                <a class="dropdown-item" href="">
                                    Aviliation
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <circle cx="12" cy="10" r="3"></circle>
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Services Page
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-3d" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M12 13.5l4 -1.5"></path>
                                        <path d="M8 11.846l4 1.654v4.5l4 -1.846v-4.308l-4 -1.846z"></path>
                                        <path d="M8 12v4.2l4 1.8"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Member Page
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">
                                    DPD
                                </a>
                                <a class="dropdown-item" href="">
                                    Company Member
                                </a>                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-3d" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M12 13.5l4 -1.5"></path>
                                        <path d="M8 11.846l4 1.654v4.5l4 -1.846v-4.308l-4 -1.846z"></path>
                                        <path d="M8 12v4.2l4 1.8"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Member Page
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">
                                    DPD
                                </a>
                                <a class="dropdown-item" href="">
                                    Company Member
                                </a>                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-3d" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M12 13.5l4 -1.5"></path>
                                        <path d="M8 11.846l4 1.654v4.5l4 -1.846v-4.308l-4 -1.846z"></path>
                                        <path d="M8 12v4.2l4 1.8"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Happenings Page
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">
                                    News
                                </a>
                                <a class="dropdown-item" href="">
                                    Event
                                </a>                                
                                <a class="dropdown-item" href="">
                                    Article
                                </a>
                                <a class="dropdown-item" href="">
                                    Gallery
                                </a>  
                            </div>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacts.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <circle cx="12" cy="10" r="3"></circle>
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Contact Page
                                </span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <line x1="9" y1="9" x2="10" y2="9"></line>
                                        <line x1="9" y1="13" x2="15" y2="13"></line>
                                        <line x1="9" y1="17" x2="15" y2="17"></line>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Shipment
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('resi')}}">
                                    Booking Shipment
                                </a>
                            </div>
                        </li>
                        @if(auth()->user()->access == 1 || auth()->user()->access == 2)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <line x1="9" y1="9" x2="10" y2="9"></line>
                                        <line x1="9" y1="13" x2="15" y2="13"></line>
                                        <line x1="9" y1="17" x2="15" y2="17"></line>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Setting
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('master-harga')}}">
                                    List Tarif
                                </a>
                                <a class="dropdown-item" href="{{ route('master-harga-import')}}">
                                    Import Tarif
                                </a>
                                <!-- <a class="dropdown-item" href="./layout-boxed.html">
                                    Assets By Regional
                                </a>
                                <a class="dropdown-item" href="./layout-boxed.html">
                                    Assets Check-In & Out
                                </a> -->
                                @if(auth()->user()->type == 2)
                                <a class="dropdown-item" href="./layout-boxed.html">
                                    Company
                                </a>
                                <a class="dropdown-item" href="./layout-boxed.html">
                                    User
                                </a>
                                @endif
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </aside>
        @endif
        <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item px-4">
                        <a href="{{ route('site') }}" class="btn btn-dark">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-app-window" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                    <path d="M6 8h.01"></path>
                                    <path d="M9 8h.01"></path>
                                </svg>
                            </span>
                            Your Site
                        </a>
                    </div>
            
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm">{{ substr(Auth::user()->name, 0, 2) }}</span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="mt-1 small text-muted">Hello Sir</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ route('user.show', Auth::user()->id)}}" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item" onclick="logout_app()">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first">
                    @if(isset($back))
                    <a href="{{ $back_url }}" class="text-dark strong h3 text-decoration-none">
                        <span class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <line x1="5" y1="12" x2="9" y2="16"></line>
                                <line x1="5" y1="12" x2="9" y2="8"></line>
                            </svg>
                        </span>
                        {{ $back }}
                    </a>
                    @endif
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="page-body">
                <!-- <div class="container-xl"> -->
                @yield('content')
                <!-- </div> -->
            </div>
            <footer class="footer footer-transparent d-print-none bg-white">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @yield('modal')
    <x-modal.logout />
    <!-- Libs JS -->
    <script src="{{ asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jsvectormap/dist/maps/world.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jsvectormap/dist/maps/world-merc.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/demo.min.js') }}"></script>
    <!-- Jquery -->
    <script src="{{ asset('assets/pus_dist/js/script.js') }}"></script>
    <script src="{{ asset('assets/pus_dist/lib/jquery/jquery.min.js') }}"></script>
    <!-- Toast and sweetalert -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/pus_dist/lib/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('assets/pus_dist/lib/sweetalert/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Custome Js -->
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        let url = "<?= url('') ?>";
        let token = "<?= Illuminate\Support\Facades\Session::token() ?>";
        let auth_user = <?= json_encode(Illuminate\Support\Facades\Auth::user()) ?>;
    </script>
    @stack('script')
</body>

</html>