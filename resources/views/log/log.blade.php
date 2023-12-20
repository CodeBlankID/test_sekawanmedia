@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Log Activity</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link text-log active" id="vert-tabs-home-tab" data-toggle="pill"
                                        href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home"
                                        aria-selected="true"><i class="fa-solid fa-clock-rotate-left"></i> Users</a>
                                    <a class="nav-link text-log" id="vert-tabs-profile-tab" data-toggle="pill"
                                        href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                        aria-selected="false"><i class="fa-solid fa-clock-rotate-left"></i> Jabatan</a>
                                    <a class="nav-link text-log" id="vert-tabs-messages-tab" data-toggle="pill"
                                        href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                        aria-selected="false"><i class="fa-solid fa-clock-rotate-left"></i> Lokasi</a>
                                    <a class="nav-link text-log" id="vert-tabs-settings-tab" data-toggle="pill"
                                        href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                        aria-selected="false"><i class="fa-solid fa-clock-rotate-left"></i>
                                        Kendaraan</a>
                                    <a class="nav-link text-log" id="vert-tabs-booking-tab" data-toggle="pill"
                                        href="#vert-tabs-booking" role="tab" aria-controls="vert-tabs-booking"
                                        aria-selected="false"><i class="fa-solid fa-clock-rotate-left"></i>
                                        Booking</a>
                                    <a class="nav-link text-log" id="vert-tabs-maintenance-tab" data-toggle="pill"
                                        href="#vert-tabs-maintenance" role="tab"
                                        aria-controls="vert-tabs-maintenance" aria-selected="false"><i
                                            class="fa-solid fa-clock-rotate-left"></i>
                                        Maintenance</a>
                                </div>
                            </div>
                            <div class="col-7 col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel"
                                        aria-labelledby="vert-tabs-home-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-secondary card-tabs">
                                                    <div class="card-header p-0 pt-1">
                                                        <ul class="nav nav-tabs" id="custom-tabs-two-tab"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="custom-tabs-two-home-tab"
                                                                    data-toggle="pill" href="#custom-tabs-two-home"
                                                                    role="tab" aria-controls="custom-tabs-two-home"
                                                                    aria-selected="true">Read Data Users</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="custom-tabs-two-profile-tab"
                                                                    data-toggle="pill" href="#custom-tabs-two-profile"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-two-profile"
                                                                    aria-selected="false">Add Data Users</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link " id="custom-tabs-two-messages-tab"
                                                                    data-toggle="pill" href="#custom-tabs-two-messages"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-two-messages"
                                                                    aria-selected="false">Edit Data Users</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="custom-tabs-two-settings-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-two-settings" role="tab"
                                                                    aria-controls="custom-tabs-two-settings"
                                                                    aria-selected="false">Delete Data Users</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="custom-tabs-two-tabContent">
                                                            <div class="tab-pane fade  active show"
                                                                id="custom-tabs-two-home" role="tabpanel"
                                                                aria-labelledby="custom-tabs-two-home-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($users['read']))
                                                                            @foreach ($users['read'] as $usersItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $usersItem['user_id'] }}</td>
                                                                                    <td>{{ $usersItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $usersItem['menu'] }}</td>
                                                                                    <td>{{ $usersItem['event'] }}</td>
                                                                                    <td>{{ $usersItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="custom-tabs-two-profile"
                                                                role="tabpanel"
                                                                aria-labelledby="custom-tabs-two-profile-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($users['add']))
                                                                            @foreach ($users['add'] as $usersItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $usersItem['user_id'] }}</td>
                                                                                    <td>{{ $usersItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $usersItem['menu'] }}</td>
                                                                                    <td>{{ $usersItem['event'] }}</td>
                                                                                    <td>{{ $usersItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="custom-tabs-two-messages"
                                                                role="tabpanel"
                                                                aria-labelledby="custom-tabs-two-messages-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($users['edit']))
                                                                            @foreach ($users['edit'] as $usersItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $usersItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $usersItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $usersItem['menu'] }}</td>
                                                                                    <td>{{ $usersItem['event'] }}</td>
                                                                                    <td>{{ $usersItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="custom-tabs-two-settings"
                                                                role="tabpanel"
                                                                aria-labelledby="custom-tabs-two-settings-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($users['delete']))
                                                                            @foreach ($users['delete'] as $usersItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $usersItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $usersItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $usersItem['menu'] }}</td>
                                                                                    <td>{{ $usersItem['event'] }}</td>
                                                                                    <td>{{ $usersItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                        aria-labelledby="vert-tabs-profile-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-secondary card-tabs">
                                                    <div class="card-header p-0 pt-1">
                                                        <ul class="nav nav-tabs" id="custom-tabs-jabatan-tab"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active"
                                                                    id="custom-tabs-jabatan-home-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-jabatan-home" role="tab"
                                                                    aria-controls="custom-tabs-jabatan-home"
                                                                    aria-selected="true">Read Data Jabatan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-jabatan-profile-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-jabatan-profile" role="tab"
                                                                    aria-controls="custom-tabs-jabatan-profile"
                                                                    aria-selected="false">Add Data Jabatan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link "
                                                                    id="custom-tabs-jabatan-messages-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-jabatan-messages"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-jabatan-messages"
                                                                    aria-selected="false">Edit Data Jabatan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-jabatan-settings-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-jabatan-settings"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-jabatan-settings"
                                                                    aria-selected="false">Delete Data Jabatan</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="custom-tabs-jabatan-tabContent">
                                                            <div class="tab-pane fade  active show"
                                                                id="custom-tabs-jabatan-home" role="tabpanel"
                                                                aria-labelledby="custom-tabs-jabatan-home-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($jabatan['read']))
                                                                            @foreach ($jabatan['read'] as $jabatanItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $jabatanItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['menu'] }}</td>
                                                                                    <td>{{ $jabatanItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-jabatan-profile" role="tabpanel"
                                                                aria-labelledby="custom-tabs-jabatan-profile-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($jabatan['add']))
                                                                            @foreach ($jabatan['add'] as $jabatanItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $jabatanItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['menu'] }}</td>
                                                                                    <td>{{ $jabatanItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-jabatan-messages" role="tabpanel"
                                                                aria-labelledby="custom-tabs-jabatan-messages-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($jabatan['edit']))
                                                                            @foreach ($jabatan['edit'] as $jabatanItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $jabatanItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['menu'] }}</td>
                                                                                    <td>{{ $jabatanItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-jabatan-settings" role="tabpanel"
                                                                aria-labelledby="custom-tabs-jabatan-settings-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($jabatan['delete']))
                                                                            @foreach ($jabatan['delete'] as $jabatanItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $jabatanItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['menu'] }}</td>
                                                                                    <td>{{ $jabatanItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $jabatanItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                        aria-labelledby="vert-tabs-messages-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-secondary card-tabs">
                                                    <div class="card-header p-0 pt-1">
                                                        <ul class="nav nav-tabs" id="custom-tabs-lokasi-tab"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active"
                                                                    id="custom-tabs-lokasi-home-tab"
                                                                    data-toggle="pill" href="#custom-tabs-lokasi-home"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-lokasi-home"
                                                                    aria-selected="true">Read Data Lokasi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-lokasi-profile-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-lokasi-profile" role="tab"
                                                                    aria-controls="custom-tabs-lokasi-profile"
                                                                    aria-selected="false">Add Data Lokasi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link "
                                                                    id="custom-tabs-lokasi-messages-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-lokasi-messages" role="tab"
                                                                    aria-controls="custom-tabs-lokasi-messages"
                                                                    aria-selected="false">Edit Data Lokasi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-lokasi-settings-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-lokasi-settings" role="tab"
                                                                    aria-controls="custom-tabs-lokasi-settings"
                                                                    aria-selected="false">Delete Data Lokasi</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="custom-tabs-lokasi-tabContent">
                                                            <div class="tab-pane fade  active show"
                                                                id="custom-tabs-lokasi-home" role="tabpanel"
                                                                aria-labelledby="custom-tabs-lokasi-home-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($lokasi['read']))
                                                                            @foreach ($lokasi['read'] as $lokasiItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $lokasiItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['menu'] }}</td>
                                                                                    <td>{{ $lokasiItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="custom-tabs-lokasi-profile"
                                                                role="tabpanel"
                                                                aria-labelledby="custom-tabs-lokasi-profile-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($lokasi['add']))
                                                                            @foreach ($lokasi['add'] as $lokasiItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $lokasiItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['menu'] }}</td>
                                                                                    <td>{{ $lokasiItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-lokasi-messages" role="tabpanel"
                                                                aria-labelledby="custom-tabs-lokasi-messages-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($lokasi['edit']))
                                                                            @foreach ($lokasi['edit'] as $lokasiItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $lokasiItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['menu'] }}</td>
                                                                                    <td>{{ $lokasiItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-lokasi-settings" role="tabpanel"
                                                                aria-labelledby="custom-tabs-lokasi-settings-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($lokasi['delete']))
                                                                            @foreach ($lokasi['delete'] as $lokasiItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $lokasiItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['menu'] }}</td>
                                                                                    <td>{{ $lokasiItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $lokasiItem['time'] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                        aria-labelledby="vert-tabs-settings-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-secondary card-tabs">
                                                    <div class="card-header p-0 pt-1">
                                                        <ul class="nav nav-tabs" id="custom-tabs-kendaraan-tab"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active"
                                                                    id="custom-tabs-kendaraan-home-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-kendaraan-home" role="tab"
                                                                    aria-controls="custom-tabs-kendaraan-home"
                                                                    aria-selected="true">Read Data Kendaraan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-kendaraan-profile-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-kendaraan-profile"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-kendaraan-profile"
                                                                    aria-selected="false">Add Data Kendaraan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link "
                                                                    id="custom-tabs-kendaraan-messages-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-kendaraan-messages"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-kendaraan-messages"
                                                                    aria-selected="false">Edit Data Kendaraan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-kendaraan-settings-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-kendaraan-settings"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-kendaraan-settings"
                                                                    aria-selected="false">Delete Data Kendaraan</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content"
                                                            id="custom-tabs-kendaraan-tabContent">
                                                            <div class="tab-pane fade  active show"
                                                                id="custom-tabs-kendaraan-home" role="tabpanel"
                                                                aria-labelledby="custom-tabs-kendaraan-home-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($kendaraan['read']))
                                                                            @foreach ($kendaraan['read'] as $kendaraanItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $kendaraanItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-kendaraan-profile" role="tabpanel"
                                                                aria-labelledby="custom-tabs-kendaraan-profile-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($kendaraan['add']))
                                                                            @foreach ($kendaraan['add'] as $kendaraanItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $kendaraanItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-kendaraan-messages" role="tabpanel"
                                                                aria-labelledby="custom-tabs-kendaraan-messages-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($kendaraan['edit']))
                                                                            @foreach ($kendaraan['edit'] as $kendaraanItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $kendaraanItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-kendaraan-settings" role="tabpanel"
                                                                aria-labelledby="custom-tabs-kendaraan-settings-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($kendaraan['delete']))
                                                                            @foreach ($kendaraan['delete'] as $kendaraanItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $kendaraanItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $kendaraanItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-booking" role="tabpanel"
                                        aria-labelledby="vert-tabs-booking-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-secondary card-tabs">
                                                    <div class="card-header p-0 pt-1">
                                                        <ul class="nav nav-tabs" id="custom-tabs-booking-tab"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active"
                                                                    id="custom-tabs-booking-home-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-booking-home" role="tab"
                                                                    aria-controls="custom-tabs-booking-home"
                                                                    aria-selected="true">Read Data Booking</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-booking-profile-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-booking-profile" role="tab"
                                                                    aria-controls="custom-tabs-booking-profile"
                                                                    aria-selected="false">Add Data Booking</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link "
                                                                    id="custom-tabs-booking-messages-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-booking-messages"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-booking-messages"
                                                                    aria-selected="false">Edit Data Booking</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-booking-settings-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-booking-settings"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-booking-settings"
                                                                    aria-selected="false">Delete Data Booking</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="custom-tabs-booking-tabContent">
                                                            <div class="tab-pane fade  active show"
                                                                id="custom-tabs-booking-home" role="tabpanel"
                                                                aria-labelledby="custom-tabs-booking-home-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($booking['read']))
                                                                            @foreach ($booking['read'] as $bookingItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $bookingItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-booking-profile" role="tabpanel"
                                                                aria-labelledby="custom-tabs-booking-profile-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($booking['add']))
                                                                            @foreach ($booking['add'] as $bookingItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $bookingItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-booking-messages" role="tabpanel"
                                                                aria-labelledby="custom-tabs-booking-messages-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($booking['edit']))
                                                                            @foreach ($booking['edit'] as $bookingItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $bookingItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-booking-settings" role="tabpanel"
                                                                aria-labelledby="custom-tabs-booking-settings-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($booking['delete']))
                                                                            @foreach ($booking['delete'] as $bookingItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $bookingItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $bookingItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-maintenance" role="tabpanel"
                                        aria-labelledby="vert-tabs-maintenance-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-secondary card-tabs">
                                                    <div class="card-header p-0 pt-1">
                                                        <ul class="nav nav-tabs" id="custom-tabs-maintenance-tab"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active"
                                                                    id="custom-tabs-maintenance-home-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-maintenance-home"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-maintenance-home"
                                                                    aria-selected="true">Read Data Maintenance</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-maintenance-profile-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-maintenance-profile"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-maintenance-profile"
                                                                    aria-selected="false">Add Data Maintenance</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link "
                                                                    id="custom-tabs-maintenance-messages-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-maintenance-messages"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-maintenance-messages"
                                                                    aria-selected="false">Edit Data Maintenance</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    id="custom-tabs-maintenance-settings-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-maintenance-settings"
                                                                    role="tab"
                                                                    aria-controls="custom-tabs-maintenance-settings"
                                                                    aria-selected="false">Delete Data Maintenance</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content"
                                                            id="custom-tabs-maintenance-tabContent">
                                                            <div class="tab-pane fade  active show"
                                                                id="custom-tabs-maintenance-home" role="tabpanel"
                                                                aria-labelledby="custom-tabs-maintenance-home-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($maintenance['read']))
                                                                            @foreach ($maintenance['read'] as $maintenanceItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $maintenanceItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-maintenance-profile" role="tabpanel"
                                                                aria-labelledby="custom-tabs-maintenance-profile-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($maintenance['add']))
                                                                            @foreach ($maintenance['add'] as $maintenanceItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $maintenanceItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-maintenance-messages" role="tabpanel"
                                                                aria-labelledby="custom-tabs-maintenance-messages-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($maintenance['edit']))
                                                                            @foreach ($maintenance['edit'] as $maintenanceItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $maintenanceItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                id="custom-tabs-maintenance-settings" role="tabpanel"
                                                                aria-labelledby="custom-tabs-maintenance-settings-tab">
                                                                <table id="example2"
                                                                    class="table table-bordered  table-hover table-sm text-center">
                                                                    <thead class="bg-secondary">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID User</th>
                                                                            <th>User</th>
                                                                            <th>Menu</th>
                                                                            <th>Event</th>
                                                                            <th>Time</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if (isset($maintenance['delete']))
                                                                            @foreach ($maintenance['delete'] as $maintenanceItem)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $maintenanceItem['user_id'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['User_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['menu'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['event'] }}
                                                                                    </td>
                                                                                    <td>{{ $maintenanceItem['time'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.footer')
