@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Lokasi</h3>
                        <a class="btn btn-sm btn-outline-success float-right" href="{{ url('addlokasi') }}">
                            ADD DATA
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover table-sm text-center">
                            <thead>
                                <tr>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->lokasi }}</td>
                                        <td>{{ $item->deskripsi }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-warning"
                                                href="{{ url("editlokasi/{$item->id}") }}">Edit</a> || <a
                                                class="btn btn-sm btn-outline-danger"
                                                href="{{ url("deletelokasi/{$item->id}") }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@include('partials.footer')
