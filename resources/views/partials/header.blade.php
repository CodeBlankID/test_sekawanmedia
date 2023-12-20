<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css">
    <style>
        .sidebar-bg-colo-custom {
            background: #a73737;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #7a2828, #a73737);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #401919, #6b2020);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        .nav-link {
            color: white !important;
        }

        .nav-link.active {
            color: black !important;
        }

        .nav-item:hover {
            background-color: rgba(247, 247, 247, 0.138) !important;
        }

        .text-log {
            color: black !important;
        }

        .text-log.active {
            background-color: rgba(0, 0, 0, 0.088) !important;
        }

        .nav-item :hover {
            background-color: rgba(75, 74, 74, 0.384) !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars">
                        </i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class=" btn btn-block btn-outline-danger btn-sm" href="{{ url('logout') }}" role="button"><i
                            class="fa-solid fa-power-off"></i>&nbsp;LOGOUT</a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-bg-colo-custom text-white elevation-4">
            <a href="{{ url('dashboard') }}" class="brand-link text-white">
                <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">ADMINISTRATOR</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header  "><a class="text-white" href="{{ url('dashboard') }}"> DASHBOARD</a></li>
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
                                <i class="nav-icon fa-solid fa-user-tie"></i>
                                <p>
                                    Jabatan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('lokasi') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-location-dot"></i>
                                <p>
                                    Lokasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('kendaraan') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-car"></i>
                                <p>
                                    Kendaraan
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">TRANSAKSI</li>
                        <li class="nav-item">
                            <a href="{{ url('booking') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-share-from-square"></i>
                                <p>
                                    Booking
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('maintenance') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-gear"></i>
                                <p>
                                    Maintenance
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('log') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-clipboard-check"></i>
                                <p>
                                    Log Activity
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
            </section>
