<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{ Storage::url('logo_unri.svg') }}">

    <!-- App css -->
    <link href="{{ url('backend/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend/css/theme.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ url('backend/images/users/avatar-3.jpg') }}" alt="Header Avatar">
                            <span
                                class="d-none d-sm-inline-block ml-1">{{ \Illuminate\Support\Facades\Auth::user()->name }}
                            </span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span>Log Out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div class="navbar-brand-box">
                    <a href="{{ route('home') }}" class="">
                        <h3 style="color: white; margin-top: 20px">PENGAJUAN CUTI</h3>
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                            <a href="{{ route('home') }}" class="waves-effect"><i
                                    class='bx bx-home-smile'></i><span>Dashboard</span></a>
                        </li>

                        @if (Auth::user()->id != 1)
                            <li>
                                <a href="{{ route('pengajuan.index') }}" class=" waves-effect"><i
                                        class="bx bx-book"></i><span>Pengajuan</span></a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('validasi.index') }}" class=" waves-effect"><i
                                        class="bx bx-list-ol"></i><span>Validasi</span></a>
                            </li>

                            <li>
                                <a href="{{ route('user.index') }}" class=" waves-effect"><i
                                        class="bx bx-user"></i><span>User</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="{{ url('backend/js/jquery.min.js') }}"></script>
    <script src="{{ url('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('backend/js/metismenu.min.js') }}"></script>
    <script src="{{ url('backend/js/waves.js') }}"></script>
    <script src="{{ url('backend/js/simplebar.min.js') }}"></script>

    <script src="{{ url('backend/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('backend/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('backend/js/theme.js') }}"></script>

    <script>
        $(function() {
            $("#dataTable").DataTable({
                "responsive": true,
                "language": {
                    "paginate": {
                        "previous": "<i class='mdi mdi-chevron-left'>",
                        "next": "<i class='mdi mdi-chevron-right'>"
                    }
                },
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                }
            });

            $("#dataTable-histori").DataTable({
                "responsive": true,
                "language": {
                    "paginate": {
                        "previous": "<i class='mdi mdi-chevron-left'>",
                        "next": "<i class='mdi mdi-chevron-right'>"
                    }
                },
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                }
            });
        })
    </script>

</body>

</html>
