@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kendaraan</h3>
                        <a class="btn btn-sm btn-outline-success float-right" href="{{ url('addkendaraan') }}">
                            <i class="fa-solid fa-plus"></i> ADD DATA
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered  table-hover table-sm text-center">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>Nama Kendaraan</th>
                                    <th>Kategori Kendaraan</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nomor Kendaraan</th>
                                    <th>Status kendaraan</th>
                                    <th>Lokasi kendaraan</th>
                                    <th>Jadwal Servis</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->kategori }}
                                        </td>
                                        <td>{{ $item->jenis }}
                                        </td>
                                        <td>{{ $item->nomor }}
                                        </td>
                                        <td>
                                            @switch($item->status)
                                                @case('available')
                                                    <a class="btn btn-block btn-sm bg-success" href="#">
                                                        {{ strtoupper($item->status) }}
                                                    </a>
                                                @break

                                                @case('maintenance')
                                                    <a class="btn btn-block btn-sm  bg-warning" href="#">
                                                        {{ strtoupper($item->status) }}
                                                    </a>
                                                @break

                                                @case('booked')
                                                    <a class="btn btn-block btn-sm  bg-danger" href="#">
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
                                        <td>{{ $item->lokasi }}
                                        </td>
                                        <td>
                                            @switch($item->jadwal_servis)
                                                @case(
                                                    \Carbon\Carbon::parse($item->jadwal_servis)->format('Y-m-d') <
                                                        \Carbon\Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d'))
                                                    <a class="btn btn-block btn-sm btn-danger" href="#">
                                                        {{ $item->jadwal_servis }}
                                                    </a>
                                                @break

                                                @case(
                                                    \Carbon\Carbon::parse($item->jadwal_servis)->format('Y-m-d') ==
                                                        \Carbon\Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d'))
                                                    <a class="btn btn-block btn-sm bg-warning" href="#">
                                                        {{ $item->jadwal_servis }}
                                                    </a>
                                                @break

                                                @default
                                                    <a class="btn btn-block btn-sm btn-default" href="#">
                                                        {{ $item->jadwal_servis }}
                                                    </a>
                                                @break
                                            @endswitch
                                        </td>
                                        <td>{{ $item->deskripsi }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-warning"
                                                href="{{ url("editkendaraan/{$item->id}") }}"><i
                                                    class="fa-solid fa-pen-to-square"></i> Edit</a> <a
                                                class="btn btn-sm btn-outline-danger"
                                                href="{{ url("deletekendaraan/{$item->id}") }}"><i
                                                    class="fa-solid fa-trash"></i> Delete</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm {{ $item->status == 'maintenance' ? 'btn-outline-light disabled' : 'btn-outline-success' }}"
                                                href="{{ url("requestbooking/{$item->id}") }}"><i
                                                    class="fa-solid fa-ticket"></i> Booking</a> <a
                                                class="btn btn-sm {{ $item->status == 'maintenance' ? 'btn-outline-light disabled' : 'btn-outline-info' }} "
                                                href="{{ url("requestmaintenance/{$item->id}") }}"><i
                                                    class="fa-solid fa-wrench"></i> Maintenance</a>
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
