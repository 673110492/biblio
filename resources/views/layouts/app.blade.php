<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets1/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- jQuery and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Fonts and icons -->
    <script src="{{ asset('assets1/js/plugin/webfont/webfont.min.js') }}"></script>


    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets1/css/demo.css') }}" />

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="" alt="navbar brand" class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>

            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">

                        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="{{ url('dashboard') }}" aria-expanded="false">
                                <i class="fas fa-home"></i> {{-- Icône accueil --}}
                                <p>Accueil</p>
                            </a>
                        </li>

                        <li class="nav-section">
                            <span class="sidebar-mini-icon"><i class="fas fa-book"></i></span>
                            <h4 class="text-section">Bibliothèque</h4>
                        </li>

                        <li class="nav-item {{ request()->is('cours*') ? 'active' : '' }}">
                            <a href="{{ url('cours') }}">
                                <i class="fas fa-chalkboard"></i> {{-- Tableau / cours --}}
                                <p>Cours</p>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('matieres*') ? 'active' : '' }}">
                            <a href="{{ url('matieres') }}">
                                <i class="fas fa-book-open"></i> {{-- Livre ouvert --}}
                                <p>Matières</p>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('epreuves*') ? 'active' : '' }}">
                            <a href="{{ url('epreuves') }}">
                                <i class="fas fa-file-alt"></i> {{-- Document / épreuves --}}
                                <p>Épreuves</p>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('niveaux*') ? 'active' : '' }}">
                            <a href="{{ url('niveaux') }}">
                                <i class="fas fa-layer-group"></i> {{-- Groupement / niveaux --}}
                                <p>Niveaux</p>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('filieres*') ? 'active' : '' }}">
                            <a href="{{ url('filieres') }}">
                                <i class="fas fa-sitemap"></i> {{-- Organigramme / filières --}}
                                <p>Filières</p>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('admin/faxes*') ? 'active' : '' }}">
                            <a href="{{ url('admin/faxes') }}">
                                <i class="fas fa-file-signature"></i> {{-- Signature / sujets corrigés --}}
                                <p>Sujets corrigés</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>





        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets1/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">


                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                    aria-labelledby="messageDropdown">
                                    <li>
                                        <div class="dropdown-title d-flex justify-content-between align-items-center">
                                            Messages
                                            <a href="#" class="small">Mark all as read</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets1/img/jm_denis.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jimmy Denis</span>
                                                        <span class="block"> How are you ? </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets1/img/chadengle.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Chad</span>
                                                        <span class="block"> Ok, Thanks ! </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets1/img/mlane.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jhon Doe</span>
                                                        <span class="block">
                                                            Ready for the meeting today...
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets1/img/talha.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Talha</span>
                                                        <span class="block"> Hi, Apa Kabar ? </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all messages<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets1/img/profile.jpg') }}"
                                            alt="image profile"
                                            class="object-cover w-full h-full rounded-full avatar-img" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="flex items-center p-4 space-x-4 user-box">
                                                <div
                                                    class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-full avatar-lg">
                                                    <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets1/img/profile.jpg') }}"
                                                        alt="image profile"
                                                        class="object-cover w-full h-full rounded-full avatar-img" />
                                                </div>
                                                <div class="u-text">
                                                    <h4 class="font-semibold text-gray-900">{{ Auth::user()->name }}
                                                    </h4>
                                                    <p class="text-sm text-gray-600 text-muted">
                                                        {{ Auth::user()->email }}</p>
                                                    <a href="{{ url('profile') }}"
                                                        class="inline-block mt-1 btn btn-xs btn-secondary btn-sm">Voir
                                                        profil</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>

                                            <div class="dropdown-divider"></div>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="block px-4 py-2 text-sm text-gray-700 cursor-pointer dropdown-item hover:bg-gray-100"
                                                    href="#"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    Déconnexion
                                                </a>
                                            </form>
                                        </li>
                                    </div>
                                </ul>


                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="pt-2 pb-4 d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h3 class="mb-3 fw-bold">Dashboard</h3>


                        </div>
                    </div>




                    @yield('content')


                </div>
            </div>


        </div>


    </div>
    <script src="{{ asset('assets1/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets1/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets1/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/jsvectormap/world.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets1/js/kaiadmin.min.js') }}"></script>
    <script src="{{ asset('assets1/js/setting-demo.js') }}"></script>
    <script src="{{ asset('assets1/js/demo.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets1/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Datatables -->
    <script src="{{ asset('assets1/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets1/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets1/js/setting-demo2.js') }}"></script>




    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>

</body>

</html>
