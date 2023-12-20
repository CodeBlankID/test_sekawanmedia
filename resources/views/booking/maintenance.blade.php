@include('partials.header')
@php
    $exportUri = '';
    if (!empty(Request::keys())) {
        $exportUri = Request::getRequestUri() . '&export=1';
    } else {
        $exportUri = Request::getRequestUri() . '?export=1';
    }
@endphp
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Maintenance Kendaraan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-default">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">
                                            <i class="fa-solid fa-filter"></i>
                                            Filter By Status
                                        </h3>
                                        <a class="btn btn-outline-success btn-sm d-inline float-right"
                                            href="{{ url($exportUri) }}"><i class="fa-solid fa-file-arrow-down"></i>
                                            Export
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group">
                                            <select class="form-control maintenance_filter" id="filter_status"
                                                data-name="status">
                                                <option value=""
                                                    {{ empty(Request::query('status')) ? 'selected' : '' }}>
                                                    All
                                                </option>
                                                <option value="pending"
                                                    {{ !empty(Request::query('status')) && Request::query('status') == 'pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option value="on-progress"
                                                    {{ !empty(Request::query('status')) && Request::query('status') == 'on-progress' ? 'selected' : '' }}>
                                                    On Progress
                                                </option>
                                                <option value="done"
                                                    {{ !empty(Request::query('status')) && Request::query('status') == 'done' ? 'selected' : '' }}>
                                                    Done</a>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-default">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">
                                            <i class="fa-solid fa-filter"></i>
                                            Filter By Vehicle
                                        </h3>
                                        <a class="btn btn-outline-success btn-sm d-inline float-right"
                                            href="{{ url($exportUri) }}"><i class="fa-solid fa-file-arrow-down"></i>
                                            Export
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group">
                                            <select class="form-control maintenance_filter" id="filter_vehicle"
                                                data-name="vehicle">
                                                <option value=""
                                                    {{ empty(Request::query('vehicle')) ? 'selected' : '' }}>
                                                    All
                                                </option>
                                                @foreach ($filter_vehicle as $vehicle_filter)
                                                    <option value="{{ $vehicle_filter->id }}"
                                                        {{ !empty(Request::query('vehicle')) && Request::query('vehicle') == $vehicle_filter->id ? 'selected' : '' }}>
                                                        {{ $vehicle_filter->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-default">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">
                                            <i class="fa-solid fa-filter"></i>
                                            Filter By Month
                                        </h3>
                                        <a class="btn btn-outline-success btn-sm d-inline float-right"
                                            href="{{ url($exportUri) }}"><i class="fa-solid fa-file-arrow-down"></i>
                                            Export
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group">
                                            <select class="form-control maintenance_filter" id="filter_requested"
                                                data-name="requested">
                                                <option value=""
                                                    {{ empty(Request::query('requested')) ? 'selected' : '' }}>
                                                    All
                                                </option>
                                                @foreach ($filter_maintenance_date as $date_filter)
                                                    <option value="{{ $date_filter }}"
                                                        {{ !empty(Request::query('requested')) && Request::query('requested') == $date_filter ? 'selected' : '' }}>
                                                        {{ $date_filter }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-default">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">
                                            <i class="fa-solid fa-filter"></i>
                                            Filter By Year
                                        </h3>
                                        <a class="btn btn-outline-success btn-sm d-inline float-right"
                                            href="{{ url($exportUri) }}"><i class="fa-solid fa-file-arrow-down"></i>
                                            Export
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group">
                                            <select class="form-control maintenance_filter" id="filter_year"
                                                data-name="year">
                                                <option value=""
                                                    {{ empty(Request::query('year')) ? 'selected' : '' }}>
                                                    All
                                                </option>
                                                @foreach ($filter_maintenance_year as $year)
                                                    <option value="{{ $year }}"
                                                        {{ !empty(Request::query('year')) && Request::query('year') == $year ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover table-sm text-center">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>Nama Kendaraan</th>
                                    <th>Nomor Kendaraan</th>
                                    <th>Jadwal Service</th>
                                    <th>Tanggal Perbaikan</th>
                                    <th>Deskripsi</th>
                                    <th>Maintenance Status</th>
                                    <th>Update Status</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datamaintenance as $item)
                                    <tr>
                                        <td>{{ $item->kendaraan_name }}</td>
                                        <td>{{ $item->nomor_kendaraan }}</td>
                                        <td>{{ $item->jadwal_servis }}</td>
                                        <td>{{ $item->maintenance_date }}</td>
                                        <td>{{ $item->deskripsi }}
                                        </td>
                                        <td>
                                            @switch($item->status)
                                                @case('pending')
                                                    <a class="btn btn-block btn-sm bg-warning" href="#">
                                                        {{ strtoupper($item->status) }}
                                                    </a>
                                                @break

                                                @case('on progress')
                                                    <a class="btn btn-block btn-sm  bg-info" href="#">
                                                        {{ strtoupper($item->status) }}
                                                    </a>
                                                @break

                                                @case('done')
                                                    <a class="btn btn-block btn-sm  bg-success" href="#">
                                                        {{ strtoupper($item->status) }}
                                                    </a>
                                                @break

                                                @default
                                                    <a class="btn btn-app bg-default" href="#">
                                                        {{ strtoupper($item->status) }}
                                                    </a>
                                                @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn  btn-default">Select
                                                    Status</button>
                                                <button type="button"
                                                    class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ url('updatestatusmaintenance/pending/' . $item->id) }}"><i
                                                            class="fa-solid fa-clock"></i> Pending</a>
                                                    <a class="dropdown-item"
                                                        href="{{ url('updatestatusmaintenance/on-progress/' . $item->id) }}"><i
                                                            class="fa-solid fa-gear"></i> On Progress
                                                        Check</a>
                                                    <a class="dropdown-item"
                                                        href="{{ url('updatestatusmaintenance/done/' . $item->id) }}"><i
                                                            class="fa-solid fa-circle-check"></i> Done</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-danger"
                                                href="{{ url('deletemaintenance/' . $item->id) }}"><i
                                                    class="fa-solid fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.footer')
