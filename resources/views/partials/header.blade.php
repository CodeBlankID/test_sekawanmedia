<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css"
        integrity="sha256-rhU0oslUDWrWDxTY4JxI2a2OdRtG7YSf3v5zcRbcySE=" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css"
        integrity="sha512-pYQcc5kgavar0ah58/O8hw/6Tbo3mWlmQTmvoi1i96cBz7jQYS9as5J+Nfy32rAHY6CgR9ExwnFMcBdGVcKM7g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class=" btn btn-block btn-outline-danger btn-sm" href="{{ url('logout') }}" role="button"><i
                            class="fa-solid fa-power-off"></i>&nbsp;LOGOUT</a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('dashboard') }}" class="brand-link">
                <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">ADMINISTRATOR</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header "><a class="" href="{{ url('dashboard') }}"> DASHBOARD</a></li>
                        <li class="nav-header">ACCOUNT</li>
                        <li class="nav-item">
                            <a href="{{ url('users') }}" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">MASTER DATA</li>
                        <li class="nav-item">
                            <a href="{{ url('jabatan') }}" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Jabatan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('lokasi') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Lokasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('kendaraan') }}" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Kendaraan
                                </p>
                            </a>

                        </li>
                        <li class="nav-header">TRANSAKSI</li>
                        <li class="nav-item">
                            <a href="{{ url('booking') }}" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Booking
                                </p>
                            </a>

                        </li>
                        <li class="nav-header">LAPORAN</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    Report
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    Log Actifity
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
            </section>
