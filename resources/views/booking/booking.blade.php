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
                        <h3 class="card-title">Data Booking Kendaraan</h3>
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
                                            <select class="form-control filter_status" id="filter_status"
                                                data-name="status">
                                                <option value=""
                                                    {{ empty(Request::query('status')) ? 'selected' : '' }}>
                                                    All
                                                </option>
                                                <option value="requested"
                                                    {{ !empty(Request::query('status')) && Request::query('status') == 'requested' ? 'selected' : '' }}>
                                                    Requested
                                                </option>
                                                <option value="rejected"
                                                    {{ !empty(Request::query('status')) && Request::query('status') == 'rejected' ? 'selected' : '' }}>
                                                    Rejeted
                                                </option>
                                                <option value="approved"
                                                    {{ !empty(Request::query('status')) && Request::query('status') == 'approved' ? 'selected' : '' }}>
                                                    Approved
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
                                            href="{{ url($exportUri) }}"><i
                                                class="fa-solid
                                            fa-file-arrow-down"></i>
                                            Export
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group">
                                            <select class="form-control filter_status" id="filter_vehicle"
                                                data-name="vehicle">
                                                <option value=""
                                                    {{ empty(Request::query('vehicle')) ? 'selected' : '' }}>
                                                    All
                                                </option>
                                                @foreach ($filter_vehicle as $filter_vih)
                                                    <option value="{{ $filter_vih->id }}"
                                                        {{ !empty(Request::query('vehicle')) && Request::query('vehicle') == $filter_vih->id ? 'selected' : '' }}>
                                                        {{ $filter_vih->nama }}
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
                                            href="{{ url($exportUri) }}"><i
                                                class="fa-solid
                                            fa-file-arrow-down"></i>
                                            Export
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group">
                                            <select class="form-control filter_status" id="filter_requested"
                                                data-name="requested">
                                                <option value=""
                                                    {{ empty(Request::query('requested')) ? 'selected' : '' }}>
                                                    All
                                                </option>
                                                @foreach ($filter_request_date as $month)
                                                    <option value="{{ $month }}"
                                                        {{ !empty(Request::query('requested')) && Request::query('requested') == $month ? 'selected' : '' }}>
                                                        {{ $month }}
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
                                            href="{{ url($exportUri) }}"><i
                                                class="fa-solid
                                            fa-file-arrow-down"></i>
                                            Export
                                        </a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-group">
                                            <select class="form-control filter_status" id="filter_year"
                                                data-name="year">
                                                <option value=""
                                                    {{ empty(Request::query('year')) ? 'selected' : '' }}>
                                                    All
                                                </option>
                                                @foreach ($filter_request_year as $year)
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
                                    <th>Driver</th>
                                    <th>Tanggal Request</th>
                                    <th>Lama Penggunaan</th>
                                    <th>Deskripsi</th>
                                    <th>Nama Approval</th>
                                    <th>Requested By</th>
                                    <th>Booking Status</th>
                                    <th>Update Progress</th>
                                    <th>Operation</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($databooking as $item)
                                    <tr>
                                        <td>{{ $item->kendaraan_name }}</td>
                                        <td>{{ $item->nomor_kendaraan }}</td>
                                        <td>{{ $item->driver }}
                                        </td>
                                        <td>{{ $item->requested_date }}
                                        </td>
                                        <td>{{ $item->durasi }} Hari
                                        </td>
                                        <td>{{ $item->deskripsi }}
                                        </td>
                                        <td>{{ $item->approval_user }}
                                        </td>
                                        <td>{{ $item->requested_by }}
                                        </td>
                                        <td>
                                            @switch($item->booking_steps)
                                                @case('requested')
                                                    <a class="btn btn-block btn-sm bg-warning" href="#">
                                                        {{ strtoupper($item->booking_steps) }}
                                                    </a>
                                                @break

                                                @case('mechanical check')
                                                    <a class="btn btn-block btn-sm  bg-primary" href="#">
                                                        {{ strtoupper($item->booking_steps) }}
                                                    </a>
                                                @break

                                                @case('approved')
                                                    <a class="btn btn-block btn-sm  bg-success" href="#">
                                                        {{ strtoupper($item->booking_steps) }}
                                                    </a>
                                                @break

                                                @case('rejected')
                                                    <a class="btn btn-block btn-sm  bg-danger" href="#">
                                                        {{ strtoupper($item->booking_steps) }}
                                                    </a>
                                                @break

                                                @case('done')
                                                    <a class="btn btn-block btn-sm  bg-info" href="#">
                                                        {{ strtoupper($item->booking_steps) }}
                                                    </a>
                                                @break

                                                @default
                                                    <a class="btn btn-app bg-default" href="#">
                                                        {{ strtoupper($item->booking_steps) }}
                                                    </a>
                                                @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">Select Progress</button>
                                                <button type="button"
                                                    class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <a class="dropdown-item {{ !empty($item->requested_date) ? 'disabled' : '' }}"
                                                        href="{{ url('updateprogressbooking/requested/' . $item->id) }}"><i
                                                            class="fa-solid fa-clock"></i> Requested</a>
                                                    <a class="dropdown-item {{ !empty($item->mechanical_check_date) ? 'disabled' : '' }}"
                                                        href="{{ url('updateprogressbooking/mechanical-check/' . $item->id) }}"><i
                                                            class="fa-solid fa-gear"></i> Mechanical
                                                        Check</a>
                                                    <a class="dropdown-item {{ !empty($item->booking_status_date) ? 'disabled' : '' }}"
                                                        href="{{ url('updateprogressbooking/approved/' . $item->id) }}"><i
                                                            class="fa-solid fa-circle-check"></i> Approved</a>
                                                    <a class="dropdown-item {{ !empty($item->booking_status_date) ? 'disabled' : '' }}"
                                                        href="{{ url('updateprogressbooking/rejected/' . $item->id) }}"><i
                                                            class="fa-solid fa-circle-xmark"></i> Rejected</a>
                                                    {{-- <div class="dropdown-divider"></div> --}}
                                                    <a class="dropdown-item {{ !empty($item->done_date) || $item->booking_steps == 'rejected' ? 'disabled' : '' }}"
                                                        href="{{ url('updateprogressbooking/done/' . $item->id) }}"><i
                                                            class="fa-solid fa-circle-info"></i> Done</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-danger"
                                                href="{{ url('deletebooking/' . $item->id) }}"><i
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
